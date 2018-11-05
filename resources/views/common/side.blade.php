<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu">
            <li class="side-nav-header">
                <span>Navigation</span>
            </li>

            <li class="nav-item dropdown {{strpos(request()->getPathInfo(),'users')?'open':''}}">
                <a href="{{route('users.index')}}">
                    <span class="icon-holder">
                        <i class="lni-users"></i>
                    </span>
                    <span class="title">用户管理</span>
                </a>

            </li>
            <li class="nav-item dropdown {{strpos(request()->getPathInfo(),'roles')?'open':''}}">
                <a href="{{route('roles.index')}}">
                    <span class="icon-holder">
                        <i class="lni-user"></i>
                    </span>
                    <span class="title">角色管理</span>

                </a>
            </li>
            <li class="nav-item dropdown {{strpos(request()->getPathInfo(),'subjects')?'open':''}}">
                <a href="{{route('subjects.index')}}">
                    <span class="icon-holder">
                     <i class="lni-layers"></i>
                    </span>
                    <span class="title">学科管理</span>

                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        <i class="lni-files"></i>
                    </span>
                    <span class="title">试卷管理</span>

                </a>
            </li>
            <li class="nav-item dropdown {{strpos(request()->getPathInfo(),'questions')?'open':''}}">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        <i class="lni-ruler-pencil"></i>
                    </span>
                    <span class="title">试题管理</span>
                    <span class="arrow">
                        <i class="lni-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu sub-down">
                    <li class="{{(strpos(request()->getPathInfo(),'questions') && strpos(request()->getPathInfo(),'type/1'))?'active':''}}">
                        <a href="{{route('questions.index','1')}}" >选择题</a>
                    </li>
                    <li class="{{(strpos(request()->getPathInfo(),'questions') && strpos(request()->getPathInfo(),'type/2'))?'active':''}}">
                        <a href="{{route('questions.index','2')}}">判断题</a>
                    </li>
                    <li class="{{(strpos(request()->getPathInfo(),'questions') && strpos(request()->getPathInfo(),'type/3'))?'active':''}}">
                        <a href="{{route('questions.index','3')}}">填空题</a>
                    </li>
                    <li class="{{(strpos(request()->getPathInfo(),'questions') && strpos(request()->getPathInfo(),'type/4'))?'active':''}}">
                        <a href="{{route('questions.index','4')}}">问答题</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        <i class="lni-pencil-alt"></i>
                    </span>
                    <span class="title">阅卷管理</span>

                </a>
            </li>

        </ul>
    </div>
</div>