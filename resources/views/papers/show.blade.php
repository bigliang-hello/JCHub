@extends('layouts.pre_app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">{{$paper->title}}</h2>
            <p class="text-center">总分：{{$paper->total_score}}分 时间：60分钟</p>
            <form action="{{route('papers.submit')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="paper_id" value="{{$paper->id}}">
                @if($questions_type1)
                    <div class="mt-4">
                    <h5>选择题(每题：{{$paper->type_1_per_score}}分)</h5>
                    @foreach($questions_type1 as $index=>$question)
                        <div class="mt-4">
                            <p class="card-text">{{$index+1}}.{{$question->title}}</p>
                            <div class="custom-control custom-radio radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="select[{{$question->id}}]" id="question_{{$question->id}}_1" value="A">
                                <label class="custom-control-label" for="question_{{$question->id}}_1">{{$question->option_a}}</label>
                            </div>
                            <div class="custom-control custom-radio radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="select[{{$question->id}}]" id="question_{{$question->id}}_2" value="B">
                                <label class="custom-control-label" for="question_{{$question->id}}_2">{{$question->option_b}}</label>
                            </div>
                            <div class="custom-control custom-radio radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="select[{{$question->id}}]" id="question_{{$question->id}}_3" value="C">
                                <label class="custom-control-label" for="question_{{$question->id}}_3">{{$question->option_c}}</label>
                            </div>
                            <div class="custom-control custom-radio radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="select[{{$question->id}}]" id="question_{{$question->id}}_4" value="D">
                                <label class="custom-control-label" for="question_{{$question->id}}_4">{{$question->option_d}}</label>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @endif

                    @if($questions_type2)
                        <div class="mt-4">
                            <h5>判断题(每题：{{$paper->type_2_per_score}}分)</h5>
                            @foreach($questions_type2 as $question)
                                <div class="mt-4">
                                    <p class="card-text">{{$index+1}}.{{$question->title}}</p>
                                    <div class="custom-control custom-radio radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="judge[{{$question->id}}]" id="question_{{$question->id}}_1" value="true">
                                        <label class="custom-control-label" for="question_{{$question->id}}_1">正确</label>
                                    </div>
                                    <div class="custom-control custom-radio radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="judge[{{$question->id}}]" id="question_{{$question->id}}_2" value="false">
                                        <label class="custom-control-label" for="question_{{$question->id}}_2">错误</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($questions_type3)
                        <div class="mt-4">
                            <h5>填空题(每题：{{$paper->type_3_per_score}}分)</h5>
                            @foreach($questions_type3 as $question)
                                <div class="mt-4">
                                    <p class="card-text">{{$index+1}}.{{$question->title}}</p>
                                    <input type="text" name="blank[{{$question->id}}]" class="form-control" id="question_{{$question->id}}" placeholder="">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($questions_type4)
                        <div class="mt-4">
                            <h5>问答题(每题：{{$paper->type_4_per_score}}分)</h5>
                            @foreach($questions_type4 as $question)
                                <div class="mt-4">
                                    <p class="card-text">{{$index+1}}.{{$question->title}}</p>
                                    <textarea type="text" name="essay[{{$question->id}}]" class="form-control" rows="4" id="question_{{$question->id}}" placeholder=""></textarea>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="row mt-4">
                        <button type="submit" class="btn btn-danger m-auto">提交试卷</button>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection