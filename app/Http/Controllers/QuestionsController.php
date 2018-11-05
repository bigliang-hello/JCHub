<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionsController extends Controller
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
    public function index($type)
    {
        $questions = Question::with('user','subject')->where('type',$type)->get();
        return view('questions.index', compact('questions'));
    }

    public function create(Question $question, $type)
    {
        if ($type == 1 || $type == 2 || $type == 3 || $type == 4)
        {
            $subjects = Subject::all();
            return view('questions.create_and_edit', compact('question', 'subjects'));
        }else{
            return null;
        }
    }

    public function store(QuestionRequest $request, Question $question)
    {
        $question->fill($request->all());
        $question->save();
        return redirect()->route('questions.index',$request->type)->with('message','题目添加成功');
    }

    public function show($id)
    {

    }

    public function edit(Question $question, $type)
    {
        $subjects = Subject::all();
        return view('questions.create_and_edit', compact('question','type', 'subjects'));
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('questions.index',$request->type)->with('message','题目更新成功');
    }

    public function destroy(Request $request,Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index',$request->type)->with('message','删除题目成功');
    }
}
