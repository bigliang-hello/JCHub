@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                @if($subject->id)
                    <h4 class="card-title">编辑学科</h4>
                @else
                    <h4 class="card-title">新增学科</h4>
                @endif

            </div>
            @include('common.error')
            <div class="card-body">
                @if($subject->id)
                    <form class="forms-sample" action="{{route('subjects.update',$subject->id)}}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                        @else
                            <form class="forms-sample" action="{{route('subjects.store')}}" method="POST" accept-charset="UTF-8">
                                @endif
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="name">名称</label>
                                    <input type="text" class="form-control" id="name" placeholder="名称" value="{{old('name',$subject->name)}}" name="name">
                                </div>
                                <button type="submit" class="btn btn-common mr-3">保存</button>
                                <a href="{{route('subjects.index')}}" class="btn btn-light">取消</a>
                            </form>
            </div>
        </div>
    </div>

@endsection