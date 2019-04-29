@extends('layouts.admin')
   @section('leftpanel')
        @include('pages.core.admin.components.leftpanel')
   @endsection
   @section('content')
   	   @parent
       @include('components.flash_messages') 
   	   <div class="col-md-12">
        <form method="POST" action="{{route('store.subject')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
            @csrf
            <center class="pt-5">
                <img src="{{url('images/photo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
            </center>
            <hr>
            <div class="col-md-12">
                @if(count($subjects))
                    @foreach($subjects as $key => $subject)
                        <div class="col-md-4">
                            <p class="text-left"><strong>{{$key + 1}}: </strong>
                                <span class="label label-warning">{{ $subject->name }}   :    {{$subject->teacher}}</span>
                            </p>
                        </div>
                    @endforeach
                @endif               
            </div><br><br><br><br>
            <div class="row justify-content-center pr-4 pl-4">
                <div class="form-group col-md-4">
                    <label for="inputAge">Subject name</label>
                    <input type="text" class="form-control{{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="" autocomplete="off">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>  
        
                <div class="form-group col-md-4">
                    <label for="inputGender">Choose teacher</label>
                    
                        <select class="form-control{{ $errors->has('gender') ? 'is-invalid' : ''}}" name="teacher" required>
                             <option value="" selected disabled> Choose a teacher</option>
                             @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}"> {{ $teacher->name }} </option>
                             @endforeach
                        </select>
                    @if($errors->has('gender'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
                <a href="#">Add teachers</a>
            <div class="col-md-12"></div>
                <button type="submit" class="btn btn-success rounded"> Add subject  </button>
            </div>
            </div>
        </form>
</div>
@endsection