@extends('layouts.admin')
   @section('leftpanel')
        @include('pages.core.admin.components.leftpanel')
   @endsection
   @section('content')
   	   @parent
       @include('components.flash_messages') 
   	   <div class="col-md-12">
        <form method="POST" action="{{route('store.class')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
            @csrf
            <center class="pt-5">
                <img src="{{url('images/group.png')}}" name="aboutme" width="120" height="120" border="0" class="rounded-circle"></a>
            </center>
            <hr>
            <div class="col-md-12">
                @if(count($classes))
                    @foreach($classes as $key => $class)
                        <div class="col-md-4">
                            <p class="text-left"><strong>{{$key + 1}}: </strong>
                                <span class="label label-warning">{{ $class->name }}</span>
                            </p>
                        </div>
                    @endforeach
                @endif               
            </div><br><br><br><br>
            <div class="row justify-content-center pr-4 pl-4">
                <div class="form-group col-md-4">
                    <label for="inputAge">Class name</label>

                    <input type="text" class="form-control{{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="" autocomplete="off">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>  
        
                <div class="form-group col-md-4">
                    <label for="inputGender">Choose class teacher </label>                   
                        <select class="form-control{{ $errors->has('teacher') ? 'is-invalid' : ''}}" name="teacher_id" required>
                             <option value="" selected disabled> Choose a teacher</option>
                             @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}"> {{ $teacher->name }} </option>
                             @endforeach
                        </select>
                    @if($errors->has('teacher'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('teacher') }}</strong>
                        </span>
                    @endif
                </div>
                <a href="#" class="text-success">Add teacher</a><br>

            <div class="col-md-12"></div>
                <button type="submit" class="btn btn-success rounded"> Create class  </button>
            </div>
            </div>
        </form>
</div>
@endsection