@extends('layouts.app')
   @section('content')
<div class="row justify-content-center">
	<div class="col-md-9 card mt-3 ml-2 mr-2 box-shadow">
	    <div class="card-body"> 
	       <div class="content mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">success</span> You have registered successfully! Check out some useful learning recources 
                  	<a href="">
                  		HERE
                  	</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
	         </div> 
	    </div>
	</div>
</div>

         @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
   @endsection