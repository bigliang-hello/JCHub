<div class="header navbar">
    <div class="header-container">
        <div class="nav-logo">
            <a href="">
                <b><img src={{url("assets/img/logo.png")}} alt=""></b>
                <span class="logo">
                    <img src={{url("assets/img/logo-text.png")}} alt="">
                </span>
            </a>
        </div>
        <ul class="nav-left">
            <li>
                <a class="sidenav-fold-toggler" href="javascript:void(0);">
                    <i class="lni-menu"></i>
                </a>
                <a class="sidenav-expand-toggler" href="javascript:void(0);">
                    <i class="lni-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">

            <li class="massages dropdown dropdown-animated scale-left">
                <span class="counter">3</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="lni-envelope"></i>
                </a>
                <ul class="dropdown-menu dropdown-lg">
                    <li>
                        <div class="dropdown-item align-self-center">
                            <h5><span class="badge badge-primary float-right">745</span>Messages</h5>
                        </div>
                    </li>
                    <li>
                        <ul class="list-media">
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <img src="assets/img/users/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                        Amanda Robertson
                                        </span>
                                        <span class="sub-title">Dummy text of the printing and typesetting industry.</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <img src="assets/img/users/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                        Danny Donovan
                                        </span>
                                        <span class="sub-title">It is a long established fact that a reader will</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <img src={{url("assets/img/users/avatar-3.jpg")}} alt="">
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                         Frank Handrics
                                        </span>
                                        <span class="sub-title">You have 87 unread messages</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="check-all text-center">
                        <span>
                        <a href="#" class="text-gray">View All</a>
                        </span>
                    </li>
                </ul>
            </li>

            <li class="user-profile dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src={{Auth::user()->avatar}} alt="">
                </a>
                <ul class="dropdown-menu dropdown-md">
                    <li>
                        <ul class="list-media">
                            <li class="list-item avatar-info">
                                <div class="media-img">
                                    <img src={{Auth::user()->avatar}} alt="">
                                </div>
                                <div class="info">
                                    <span class="title text-semibold">{{Auth::user()->name}}</span>
                                    <span class="sub-title">{{Auth::user()->introduction}}</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>

                    <li>
                        <a href="{{route('users.show', Auth::id())}}">
                            <i class="lni-user"></i>
                            <span>个人中心</span>
                        </a>
                    </li>

                    <li>
                        <a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="lni-lock"></i>
                            <span>退出登录</span>
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="post">@csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>