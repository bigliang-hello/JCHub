@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="profile-bg">
                <div class="user-profile">
                    <figure class="profile-wall-img">
                        <img class="img-fluid" src="{{url('assets/img/profile/user-bg.jpg')}}" alt="User Wall">
                    </figure>
                    <div class="profile-body">
                        <figure class="profile-user-avatar">
                            <img src="{{Auth::user()->avatar}}" style="width: 120px; height: 120px;" alt="User Wall">
                        </figure>
                        <h3 class="profile-user-name">{{Auth::user()->name}}</h3>
                        <small class="profile-user-address">California, United States</small>
                        <div class="profile-user-description">
                            <p>{{Auth::user()->introduction}}</p>
                        </div>
                        <div class="m-t-5">
                            <a href="{{route('users.edit', Auth::id())}}" class="btn btn-common">编辑信息</a>
                        </div>
                    </div>
                    <div class="row border-top m-t-20">
                        <div class="col-4 border-right d-flex flex-column justify-content-center align-items-center py-4">
                            <h3>274</h3>
                            <small>Comments</small>
                        </div>
                        <div class="col-4 border-right d-flex flex-column justify-content-center align-items-center py-4">
                            <h3>2,483</h3>
                            <small>Followers</small>
                        </div>
                        <div class="col-4 border-right d-flex flex-column justify-content-center align-items-center py-4">
                            <h3>146</h3>
                            <small>Following</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop