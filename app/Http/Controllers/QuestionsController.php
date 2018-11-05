<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
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
        $questions = Question::where('type',$type)->get();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question, $type)
    {
        if ($type == 1 || $type == 2 || $type == 3 || $type == 4)
        {
            return view('questions.create_and_edit', compact('question'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, $type)
    {
        return view('questions.create_and_edit', compact('question','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('questions.index',$request->type)->with('message','题目更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index',$request->type)->with('message','删除题目成功');
    }
}
