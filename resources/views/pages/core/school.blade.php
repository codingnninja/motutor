@extends('layouts.app')
   @section('content')
     <div class="jumbotron text-center tagline">
        <div class="container" style="background: rgba(0,0,0,0.2)">
            <h1 class="jumbotron-heading text-white">
                {{$school->title}}
            </h1>
            <p class="text-white center-block" style="padding: 20px;">
                {{$school->description}}
            </p>
            <p>
                <a href="{{url('register/'.$school->slug)}}" class="btn btn-success my-2 col-md-6">
                Register now >>
                </a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 card mt-3 ml-2 mr-2 box-shadow">
                <div class="card-body">
                    <h6 class="card-title">Full Description <i class="fa fa-check-circle text-success"></i></h6>
                    <small class="text-success">
                      @foreach($school->tags as $tag) 
                        {{$tag->tag."*"}}
                      @endforeach 
                    </small>
                    <hr class="featurette-divider">
                    <p class="card-text">{{$school->description}}</p>
                </div>
            </div>

            <div class="col-md-9 card mt-3 ml-2 mr-2 box-shadow">
                <div class="card-body">
                    <h6 class="card-title"> Aims of the post </h6>
                    <i class="fa fa-star text-success"></i>
                    <p class="card-text">{{$school->why_choosing}}</p>
                </div>
            </div>

            <div class="col-md-9 card mt-3 ml-2 mr-2 box-shadow">
                <div class="card-body">
                    <h6 class="card-title">Contacts</h6>
                    <i class="fa fa-map-marker text-success"></i>
                    <p class="card-text">{{$school->address}}</p>

                      <i class="fa fa-phone text-success"></i>
                    <p class="card-text">{{$school->phones}}</p>

                      <i class="fa fa-envelope-o text-success"></i>
                    <p class="card-text">{{$school->emails}}</p>
                </div>
            </div>

            <div class="col-md-9 card mt-3 ml-2 mr-2 box-shadow">
                <div class="card-body">
                    <h6 class="card-title">Instructor(s)</h6>
                    <i class="fa fa-check-circle text-success"></i>
                    <p class="card-text">{{$school->instructors}}</p>
                </div>
            </div>

            <hr class="featurette-divider">
            <div class="col-md-12 card mt-3 box-shadow">
                <div class="card-body">
                    <h6 class="card-title">
                        Resouces you will get?
                    </h6>
                    <hr class="featurette-divider">
                    <p class="card-text">{{$school->what_you_get}}</p>
                </div>
            </div>
            <hr class="featurette-divider">
                <div class="col-md-9 card mt-3 box-shadow">
                    <div class="card-body">
                        <a href="{{url('register/'.$school->slug)}}" class="btn btn-success my-2 col-md-12">
                            Register now >
                        </a>
                    </div>
                </div>
            </div>
        </div>
   @endsection