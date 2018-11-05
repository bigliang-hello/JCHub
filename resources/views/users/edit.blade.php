@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">编辑个人信息</h4>
            </div>
            @include('common.error')
            <div class="card-body">
                <form class="forms-sample" action="{{route('users.update',$user->id)}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="exampleInputName1">昵称</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{old('name',$user->name)}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="sex">性别</label>
                        <select class="form-control" id="sex" name="sex">
                            @if($user->sex === '男')
                                <option value="男" selected="selected">男</option>
                                <option value="女">女</option>
                            @else
                                <option value="男">男</option>
                                <option value="女" selected="selected">女</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group">
                        <label>头像</label>
                        @if($user->avatar)
                            <br/>
                            <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="120" />
                            <br/>
                            <br/>
                        @endif
                        <div class="custom-file">
                            <input type="file" name="avatar">
                        </div>

                    </div>
                    <div class="form-group m-b-20">
                        <label for="exampleTextarea1">简介</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="introduction">{{old('introduction',$user->introduction)}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-common mr-3">保存</button>
                    <button class="btn btn-light">取消</button>
                </form>
            </div>
        </div>
    </div>

@endsection