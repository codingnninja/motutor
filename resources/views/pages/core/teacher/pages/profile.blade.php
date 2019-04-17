@extends('layouts.admin')
    @section('leftpanel')
        @include('pages.core.teacher.components.leftpanel')
    @endsection
    @section('content')
        <div class="col-md-12 bg-white">
            <div class="">
                    <div class="profile-body pt-5">
                        <center>
                            <img src="{{url('images/photo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
                            <h3 class="media-heading">{{auth()->user()->name}}</h3>
                            <h5 class="media-heading">{{auth()->user()->email}}</h5>
                            <small>USA</small>  
                        </center>
                        <hr>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Member: </strong><br>
                                <span class="label label-warning">{{auth()->user()->type}}</span>
                            </p>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Teaches: </strong><br>
                                <span class="label label-warning">HTML5/CSS</span>
                            </p>
                            <br>
                        </div>

                        <div class="col-md-4">
                            <p class="text-left"><strong>Manages: </strong><br>
                                Primary Five
                            </p>
                            <br>
                        </div>

                        <div class="col-md-4">
                            <p class="text-left"><strong>Bio: </strong><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                            <br>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <div>
                        <a href ="{{route('edit')}}" class="btn btn-default">Update profile
                        </a>
                        </div>
                    </div>
                    <br>
                </div>
        </div>
    @endsection