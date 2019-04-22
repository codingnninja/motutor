<h3 class="menu-title">{{auth()->user()->type}} panel</h3><!-- /.menu-title -->
<li class="">
    <a href="{{route('profile', auth()->user()->id)}}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Profile</a>
</li>
@if(auth()->user()->type === 'teacher')
    <li class="">
        <a href="" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Students</a>
    </li>
@endif
@if(auth()->user()->type === 'admin')
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Users</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('get.students')}}">Students</a></li>
            <li><i class="fa fa-id-badge"></i><a href="{{route('get.staff')}}">Staff</a></li>
            <li><i class="fa fa-bars"></i><a href="{{route('get.parents')}}">Parent</a></li>
        </ul>
    </li>
@endif
<li class="">
    <a href="{{route('subjects')}}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Subjects</a>
</li>
<li class="">
    <a href="{{route('classes')}}" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Classes</a>
</li>
@if(auth()->user()->type === 'admin')
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Website</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('get.students')}}">Home</a></li>
            <li><i class="fa fa-bars"></i><a href="{{route('get.students')}}">Gallary</a></li>
            <li><i class="fa fa-id-badge"></i><a href="{{route('get.students')}}">About Us</a></li>
            <li><i class="fa fa-bars"></i><a href="{{route('get.subscriptions')}}">Contact Us</a></li> 
        </ul>
    </li>
    <li class="">
        <a href="#" class="" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-laptop"></i>Events</a>
    </li>
@endif
<h3 class="menu-title">Authentication</h3><!-- /.menu-title -->
<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Admin pages</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
    </ul>
</li>
