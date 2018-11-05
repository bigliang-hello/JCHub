<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create(Subject $subject)
    {
        return view('subjects.create_and_edit', compact('subject'));
    }

    public function update(Request $request,Subject $subject)
    {
        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('message','更新学科成功');
    }

    public function store(Request $request, Subject $subject)
    {
        $subject->fill($request->all());
        $subject->save();
        return redirect()->route('subjects.index')->with('message','添加学科成功');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.create_and_edit', compact('subject'));
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('message','删除学科成功');
    }
}
