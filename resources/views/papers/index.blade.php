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
                <div class="card-header border-bottom d-flex justify-content-between">
                    <h4 class="card-title">试卷列表</h4>
                    <a href="{{route('papers.create')}}" class="btn btn-danger" style="margin-right: 10px;">新增</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">

                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >试卷名称</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >学科</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >满分</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >创建人</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >创建时间</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" width="180px">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($papers as $paper)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$paper->id}}</td>
                                                    <td>{{$paper->title}}</td>
                                                    <td>{{$paper->subject->name}}</td>
                                                    <td>{{$paper->total_score}}</td>
                                                    <td>{{$paper->user->name}}</td>
                                                    <td>{{$paper->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('papers.show',$paper->id)}}" class="btn btn-primary pull-left ml-2">预览</a>
                                                        <a href="{{route('papers.edit',$paper->id)}}" class="btn btn-success pull-left ml-2">编辑</a>
                                                        <form action="{{route('questions.destroy', $paper->id)}}" id="deleteQuestions" method="post">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <button type="submit" class="btn btn-danger ml-2">删除</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
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