<h3 class="menu-title">Admin panel</h3><!-- /.menu-title -->
<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Website</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('get.schools')}}"></a></li>
        <li><i class="fa fa-id-badge"></i><a href="{{route('get.users')}}">Users</a></li>
        <li><i class="fa fa-bars"></i><a href="{{route('get.subscriptions')}}">Subscritions</a></li>
    </ul>
</li>
<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Student</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('get.schools')}}">Home</a></li>
        <li><i class="fa fa-id-badge"></i><a href="{{route('get.users')}}">Users</a></li>
        <li><i class="fa fa-bars"></i><a href="{{route('get.subscriptions')}}">Subscritions</a></li>
    </ul>
</li>
<h3 class="menu-title">Authentication</h3><!-- /.menu-title -->
<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Admin pages</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
    </ul>
</li>