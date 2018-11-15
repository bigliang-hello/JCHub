<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaperRequest;
use App\Models\Answer;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Score;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PapersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = Paper::with('user','subject')->get();
        return view('papers.index', compact('papers'));
    }


    public function create(Paper $paper)
    {
        $subjects = Subject::all();
        $questions_type1 = [];
        $questions_type2 = [];
        $questions_type3 = [];
        $questions_type4 = [];
        return view('papers.create_and_edit', compact('paper', 'subjects', 'questions_type1', 'questions_type2', 'questions_type3', 'questions_type4'));
    }

    public function questions($type)
    {
        return Question::where('type', $type)->get();
    }

    public function store(PaperRequest $request, Paper $paper)
    {

        $paper->fill($request->all());

        $paper->save();

        //计算满分
        $total_score = 0;
        if ($request->questions_type1){
            $total_score += count($request->questions_type1) * $paper->type_1_per_score;
            foreach ($request->questions_type1 as $value){
                $paper->questions()->attach($value);
            }
        }
        if ($request->questions_type2){
            $total_score += count($request->questions_type2) * $paper->type_2_per_score;
            foreach ($request->questions_type2 as $value){
                $paper->questions()->attach($value);
            }
        }

        if ($request->questions_type3){
            $total_score += count($request->questions_type3) * $paper->type_3_per_score;
            foreach ($request->questions_type3 as $value){
                $paper->questions()->attach($value);
            }
        }
        if ($request->questions_type4){
            $total_score += count($request->questions_type4) * $paper->type_4_per_score;
            foreach ($request->questions_type4 as $value){
                $paper->questions()->attach($value);
            }
        }
        $paper->total_score = $total_score;
        $paper->update();

        return redirect()->route('papers.index')->with('message','添加试卷成功');
    }

    public function show(Paper $paper)
    {
        $questions_type1 = $paper->questions()->where('type',1)->get();
        $questions_type2 = $paper->questions()->where('type',2)->get();
        $questions_type3= $paper->questions()->where('type',3)->get();
        $questions_type4 = $paper->questions()->where('type',4)->get();
        return view('papers.show', compact('paper' , 'questions_type1', 'questions_type2', 'questions_type3', 'questions_type4', 'paper'));
    }


    public function edit(Paper $paper)
    {
        $subjects = Subject::all();
        $questions_type1 = $paper->questions()->where('type',1)->get();
        $questions_type2 = $paper->questions()->where('type',2)->get();
        $questions_type3= $paper->questions()->where('type',3)->get();
        $questions_type4 = $paper->questions()->where('type',4)->get();
        return view('papers.create_and_edit', compact('paper', 'subjects', 'questions_type1', 'questions_type2', 'questions_type3', 'questions_type4'));
    }


    public function update(Request $request, Paper $paper)
    {
        $paper->questions()->detach();//清空中间表
        $total_score = 0;
        $ids = [];
        if ($request->questions_type1){
            $ids =array_merge($ids, $request->questions_type1);
            $total_score += count($request->questions_type1) * $paper->type_1_per_score;
        }

        if ($request->questions_type2){
            $ids =array_merge($ids, $request->questions_type2);
            $total_score += count($request->questions_type2) * $paper->type_2_per_score;
        }

        if ($request->questions_type3){
            $ids =array_merge($ids, $request->questions_type3);
            $total_score += count($request->questions_type3) * $paper->type_3_per_score;
        }

        if ($request->questions_type4){
            $ids =array_merge($ids, $request->questions_type4);
            $total_score += count($request->questions_type4) * $paper->type_4_per_score;
        }
        //添加中间表数据
        foreach ($ids as $id){
            $paper->questions()->attach($id);
        }
        $paper->total_score = $total_score;
        $paper->fill($request->all())->update();

        return redirect()->route('papers.index')->with('message','更新试卷成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function submit(Request $request)
    {
        $paper = Paper::find($request->paper_id);
        //保存scores表
        $score = new Score();
        $score->user_id = Auth::id();
        $score->paper_id = $paper->id;
        $score->save();
        //保存amswer表

        $total = 0;
        $total += $this->countScore($request->select, $score, $paper->type_1_per_score);
        $total += $this->countScore($request->judge, $score, $paper->type_2_per_score);
        $total += $this->countScore($request->blank, $score, $paper->type_3_per_score);

        $score->score = $total;
        $score->update();
    }

    public function countScore($array, $score, $per_score)
    {
        if(is_array($array)){
            $answerObject = new Answer();
            $total = 0;
            foreach ($array as $id=>$answer){
                $question = Question::find($id);
                if ($answer == $question->answer){
                    $total += $per_score;
                }

                $answerObject->score_id = $score->id;
                $answerObject->question_id = $id;
                $answerObject->answer = $answer;
                $answerObject->save();
            }
            return $total;
        }
        return 0;
    }
}
