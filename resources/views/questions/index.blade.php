@extends('layouts.app')

@section('css_section')
    <link rel="stylesheet" type="text/css" href={{url("assets/plugins/datatables/dataTables.bootstrap4.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{url("assets/plugins/datatables/buttons.bootstrap4.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{url("assets/plugins/datatables/responsive.bootstrap4.min.css")}}>
@stop

@section('js_section')
    <script src={{url("assets/plugins/datatables/jquery.dataTables.min.js")}}></script>
    <script src={{url("assets/plugins/datatables/dataTables.bootstrap4.min.js")}}></script>
    <script src={{url("assets/js/datatables.init.js")}}></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-end">
                    <a href="{{route('questions.create',request()->type)}}" class="btn btn-danger" style="margin-right: 10px;">新增</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        @if(request()->type == 1)
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >题目</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >选项A</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >选项B</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >选项C</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >选项D</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >正确选项</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >解析</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >创建者</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >学科</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >创建时间</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" width="100px">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($questions as $question)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$question->id}}</td>
                                                    <td>{{$question->title}}</td>
                                                    <td>{{$question->option_a}}</td>
                                                    <td>{{$question->option_b}}</td>
                                                    <td>{{$question->option_c}}</td>
                                                    <td>{{$question->option_d}}</td>
                                                    <td>{{$question->answer}}</td>
                                                    <td>{{$question->analysis}}</td>
                                                    <td>{{$question->user->name}}</td>
                                                    <td>{{$question->subject->name}}</td>
                                                    <td>{{$question->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('questions.edit',[$question->id, request()->type])}}" class="btn btn-success pull-left">编辑</a>
                                                        <form action="{{route('questions.destroy', $question->id)}}" id="deleteQuestions" method="post">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <button type="submit" class="btn btn-danger" style="margin-left: 5px;">删除</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        @else
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >题目</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >正确选项</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >解析</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >创建者</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >学科</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >创建时间</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($questions as $question)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$question->id}}</td>
                                                    <td>{{$question->title}}</td>
                                                    <td>{{$question->answer}}</td>
                                                    <td>{{$question->analysis}}</td>
                                                    <td>{{$question->user->name}}</td>
                                                    <td>{{$question->subject->name}}</td>
                                                    <td>{{$question->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('questions.edit',[$question->id, request()->type])}}" class="btn btn-success pull-left">编辑</a>

                                                        <form action="{{route('questions.destroy', $question->id)}}" id="deleteQuestions" method="post">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="type" value="{{request()->type}}">
                                                            <button type="submit" class="btn btn-danger" style="margin-left: 5px;">删除</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        @endif

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop