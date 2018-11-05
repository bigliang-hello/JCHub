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
                    <a href="{{route('subjects.create')}}" class="btn btn-danger" style="margin-right: 10px;">新增</a>
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
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >名称</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subjects as $subject)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$subject->id}}</td>
                                                <td>{{$subject->name}}</td>
                                                <td>
                                                    <a href="{{route('subjects.edit',$subject->id)}}" class="btn btn-success pull-left">编辑</a>
                                                    <form action="{{route('subjects.destroy', $subject->id)}}" id="deleteSubjects" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="_method" value="DELETE">

                                                        <button type="submit" class="btn btn-danger" style="margin-left: 5px;">删除</button>
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