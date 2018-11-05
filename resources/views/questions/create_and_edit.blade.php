@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                @if($question->id)
                    <h4 class="card-title">编辑题目</h4>
                @else
                    <h4 class="card-title">新增题目</h4>
                @endif

            </div>
            @include('common.error')
            <div class="card-body">
                @if($question->id)
                    <form class="forms-sample" action="{{route('questions.update',$question->id)}}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                            <form class="forms-sample" action="{{route('questions.store')}}" method="POST" accept-charset="UTF-8">
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="type" value="{{ request()->type }}">
                    <div class="form-group">
                        <label for="exampleInputName1">题目</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="题目" value="{{old('title',$question->title)}}" name="title">
                    </div>
                @if(request()->type == 1)
                                    <div class="form-group">
                                        <label for="option_a">选项A</label>
                                        <input type="text" class="form-control" id="option_a" placeholder="选项A" value="{{old('option_a',$question->option_a)}}" name="option_a">
                                    </div>
                                    <div class="form-group">
                                        <label for="option_b">选项B</label>
                                        <input type="text" class="form-control" id="option_b" placeholder="选项B" value="{{old('option_b',$question->option_b)}}" name="option_b">
                                    </div>
                                    <div class="form-group">
                                        <label for="option_c">选项C</label>
                                        <input type="text" class="form-control" id="option_c" placeholder="选项C" value="{{old('option_c',$question->option_c)}}" name="option_c">
                                    </div>
                                    <div class="form-group">
                                        <label for="option_d">选项D</label>
                                        <input type="text" class="form-control" id="option_d" placeholder="选项D" value="{{old('option_d',$question->option_d)}}" name="option_d">
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">正确选项</label>
                                        <select class="form-control" id="answer" name="answer">
                                            <option value="A" @if($question->answer == 'A')selected @endif>A</option>
                                            <option value="B" @if($question->answer == 'B')selected @endif>B</option>
                                            <option value="C" @if($question->answer == 'C')selected @endif>C</option>
                                            <option value="D" @if($question->answer == 'D')selected @endif>D</option>
                                        </select>
                                    </div>
                 @elseif(request()->type == 2)
                                    <div class="form-group">
                                        <label for="answer">答案</label>
                                        <select class="form-control" id="answer" name="answer">
                                            <option value="true" @if($question->answer == 'true')selected @endif>正确</option>
                                            <option value="false" @if($question->answer == 'false')selected @endif>错误</option>
                                        </select>
                                    </div>
                 @else
                                    <div class="form-group m-b-20">
                                        <label for="answer">答案</label>
                                        <textarea class="form-control" id="answer" rows="4" name="answer" placeholder="答案">{{old('answer',$question->answer)}}</textarea>
                                    </div>
                 @endif
                                <div class="form-group">
                                    <label for="subject_id">学科</label>
                                    <select class="form-control" id="subject_id" name="subject_id">
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}" @if($question->subject_id == $subject->id)selected @endif>{{$subject->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                    <div class="form-group m-b-20">
                        <label for="analysis">解析</label>
                        <textarea class="form-control" id="analysis" rows="4" name="analysis" placeholder="解析(选填)">{{old('analysis',$question->analysis)}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-common mr-3">保存</button>
                    <a href="{{route('questions.index',request()->type)}}" class="btn btn-light">取消</a>
                </form>
            </div>
        </div>
    </div>

@endsection