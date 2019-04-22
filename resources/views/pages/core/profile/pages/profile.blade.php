@extends('layouts.admin')
    @section('leftpanel')
        @include('pages.core.admin.components.leftpanel')
    @endsection
    @section('content')
    @include('components.flash_messages')
        <div class="col-md-12 bg-white">
            <div class="ml-3">
                    <div class="profile-body pt-5">
                        <center>
                            <img src="{{url('images/photo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
                            <h3 class="media-heading">{{$user->name}}</h3>
                            <h5 class="media-heading">{{$user->email}}</h5>
                            <small>{{ $profile->country }}</small>  
                        </center>
                        <hr>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Phone: </strong>
                                <span class="label label-warning">{{ $profile->phone }}</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Gender: </strong>
                                <span class="label label-warning">
                                    {{ $gender }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Age: </strong>
                                {{ $profile->age }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Address: </strong>
                                {{ $profile->address }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>City: </strong>
                                {{ $profile->city }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>State: </strong>
                                {{ $profile->state }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Country: </strong>
                                {{ $profile->country }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left"><strong>Member Type: </strong>
                                {{ auth()->user()->type }}
                            </p>
                        </div>
                    </div>
                    <div class="profile-footer">
                    @if(!$profile->profile_id)
                        <a href ="{{route('create')}}" class="btn btn-primary">Create profile
                        </a> 
                    @else
                        <a href ="{{route('edit', request()->route()->id)}}" class="btn btn-primary">Edit profile
                        </a>                      
                    @endif
                    </div>
                    <br>
                </div>
        </div>
    @endsection