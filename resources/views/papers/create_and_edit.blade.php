@extends('layouts.app')

@section('css_section')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">
@stop

@section('js_section')
    <!-- Latest compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

    <!-- Latest compiled and minified Locales -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script>

    <script>

        $('#modal_table').bootstrapTable({
            {{--url:"{!! route('papers.questions',1) !!}",--}}
            url:"{{ url('papers/questions/type') }}/1",
            method: 'GET',

//            singleSelect : true,
            pageSize : 10,
            pageNumber : 1,
            pagination: true,
            pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
            sidePagination: "client",
            clickToSelect: true,
//            maintainSelected: true,
            columns : [
             //只需要加入下面这个checbox，就会在第一列显示选择框
                {
                    checkbox: true,
                     width : '5%'
                },
                {
                    field : 'id',
                    title : 'ID',
                    width : '10%',
                    sortable:true
                },
                {
                    field : 'title',
                    title : '题目',
                    width : '85%'
                }
　　　　　　　　
          ]
        });
        
        function modalSureClick(type) {
            var data = $("#modal_table").bootstrapTable("getAllSelections");
            var htmlStr = '';
            data.map(function(dic,index){
                htmlStr += "<div id='question_"+ dic['id'] +"'>"+
                "<input type='hidden' name='questions_type"+type+"[]' value='"+ dic['id'] +"'/>"+
                    "<p class='text-muted'>" + dic['title'] +"<a onclick='deleteQuestion("+ dic['id'] +")' class='btn btn-light btn-sm'>删除</a></p>"+
                    "</div>";
            });
            $("#type"+type+"_div").html(htmlStr);
        }
        
        function deleteQuestion(id) {
            $('#question_'+id).remove();
        }

        function refreshTable(type) {

            $('#modal_table').bootstrapTable('refresh', {
                silent: false,
                url:"{!! url('papers/questions/type') !!}/"+type
            });

            $('#modal_sure').attr("onclick","modalSureClick("+type+")");
        }
        
        function checkForm() {
            if ($('#title').val().length == 0){
                $('#title').removeClass("is-valid");
                $('#title').addClass("is-invalid");
                return false;
            }else if ($('#type1_div').children().length > 0 && $('#type_1_per_score').val().length == 0){
                $('#type_1_per_score').removeClass("is-valid");
                $('#type_1_per_score').addClass("is-invalid");
                return false;
            } else if ($('#type2_div').children().length > 0 && $('#type_2_per_score').val().length == 0){
                $('#type_2_per_score').removeClass("is-valid");
                $('#type_2_per_score').addClass("is-invalid");
                return false;
            }else if ($('#type3_div').children().length > 0 && $('#type_3_per_score').val().length == 0){
                $('#type_3_per_score').removeClass("is-valid");
                $('#type_3_per_score').addClass("is-invalid");
                return false;
            }else if ($('#type4_div').children().length > 0 && $('#type_4_per_score').val().length == 0){
                $('#type_4_per_score').removeClass("is-valid");
                $('#type_4_per_score').addClass("is-invalid");
                return false;
            }

            return true;
        }
        
    </script>
@stop

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                @if($paper->id)
                    <h4 class="card-title">编辑试卷</h4>
                @else
                    <h4 class="card-title">添加试卷</h4>
                @endif

            </div>
            @include('common.error')
            <div class="card-body">
                @if($paper->id)
                    <form class="forms-sample" action="{{route('papers.update',$paper->id)}}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                        @else
                            <form class="forms-sample" action="{{route('papers.store')}}" method="POST" accept-charset="UTF-8" onsubmit="return checkForm()">
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                @endif
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="title">试卷名称</label>
                                    <input type="text" class="form-control" id="title" placeholder="题目" value="{{old('title',$paper->title)}}" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="subject_id">学科</label>
                                    <select class="form-control" id="subject_id" name="subject_id">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}" @if($paper->subject_id == $subject->id)selected @endif>{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type_1_per_score_id">选择题</label>
                                    <div class="form-inline" id="type_1_per_score_id">
                                        <button type="button" class="btn btn-danger mr-sm-5" data-toggle="modal" data-target="#myModal" onclick="refreshTable(1)">添加题目</button>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">每题</div>
                                            </div>
                                            <input type="text" class="form-control" id="type_1_per_score" placeholder="分值（整数）" value="{{old('score',$paper->type_1_per_score)}}" name="type_1_per_score">
                                            <div class="input-group-append">
                                                <div class="input-group-text">分</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="type1_div" style="margin-top: 1rem;">
                                        @foreach($questions_type1 as $question)
                                            <div id="question_{{$question->id}}">
                                                <input type="hidden" name="questions_type1[]" value="{{$question->id}}">
                                                <p class="text-muted">{{$question->title}}<a onclick="deleteQuestion({{$question->id}})" class="btn btn-light btn-sm">删除</a></p>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type_1_per_score_id">判断题</label>
                                    <div class="form-inline" id="type_1_per_score_id">
                                        <button type="button" class="btn btn-danger mr-sm-5" data-toggle="modal" data-target="#myModal" onclick="refreshTable(2)">添加题目</button>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">每题</div>
                                            </div>
                                            <input type="text" class="form-control" id="type_2_per_score" placeholder="分值（整数）" value="{{old('score',$paper->type_2_per_score)}}" name="type_2_per_score">
                                            <div class="input-group-append">
                                                <div class="input-group-text">分</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="type2_div" style="margin-top: 1rem;">
                                        @foreach($questions_type2 as $question)
                                            <div id="question_{{$question->id}}">
                                                <input type="hidden" name="questions_type2[]" value="{{$question->id}}">
                                                <p class="text-muted">{{$question->title}}<a onclick="deleteQuestion({{$question->id}})" class="btn btn-light btn-sm">删除</a></p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type_1_per_score_id">填空题</label>
                                    <div class="form-inline" id="type_1_per_score_id">
                                        <button type="button" class="btn btn-danger mr-sm-5" data-toggle="modal" data-target="#myModal" onclick="refreshTable(3)">添加题目</button>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">每题</div>
                                            </div>
                                            <input type="text" class="form-control" id="type_3_per_score" placeholder="分值（整数）" value="{{old('score',$paper->type_3_per_score)}}" name="type_3_per_score">
                                            <div class="input-group-append">
                                                <div class="input-group-text">分</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="type3_div" style="margin-top: 1rem;">

                                        @foreach($questions_type3 as $question)
                                            <div id="question_{{$question->id}}">
                                                <input type="hidden" name="questions_type3[]" value="{{$question->id}}">
                                                <p class="text-muted">{{$question->title}}<a onclick="deleteQuestion({{$question->id}})" class="btn btn-light btn-sm">删除</a></p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type_1_per_score_id">问答题</label>
                                    <div class="form-inline" id="type_1_per_score_id">
                                        <button type="button" class="btn btn-danger mr-sm-5" data-toggle="modal" data-target="#myModal" onclick="refreshTable(4)">添加题目</button>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">每题</div>
                                            </div>
                                            <input type="text" class="form-control" id="type_4_per_score" placeholder="分值（整数）" value="{{old('score',$paper->type_4_per_score)}}" name="type_4_per_score">
                                            <div class="input-group-append">
                                                <div class="input-group-text">分</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="type4_div" style="margin-top: 1rem;">
                                        @foreach($questions_type4 as $question)
                                            <div id="question_{{$question->id}}">
                                                <input type="hidden" name="questions_type4[]" value="{{$question->id}}">
                                                <p class="text-muted">{{$question->title}}<a onclick="deleteQuestion({{$question->id}})" class="btn btn-light btn-sm">删除</a></p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-common mr-3">保存</button>
                                <a href="{{route('papers.index')}}" class="btn btn-light">取消</a>
                            </form>
            </div>
        </div>
    </div>

    <!-- 模态框 -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- 模态框头部 -->
                <div class="modal-header">
                    <h4 class="modal-title">问题列表</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- 模态框主体 -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="modal_table">

                            </table>
                        </div>
                    </div>
                </div>

                <!-- 模态框底部 -->
                <div class="modal-footer">
                    <button type="button" id="modal_sure" class="btn btn-danger" data-dismiss="modal">确定</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                </div>

            </div>
        </div>
    </div>

@endsection