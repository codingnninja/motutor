@extends('layouts.admin')
   @section('content')
   	   @parent
        @include('components.flash_messages')  
   	   <div class="col-md-12">
  <form method="POST" action="{{route('store')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
    @csrf
    <center class="pt-5">
      <img src="{{url('images/photo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
      <h3 class="media-heading">{{$user->name}}</h3>
      <h5 class="media-heading">{{$user->email}}</h5>
      <small>{{$user->type}}</small><br>
      <input class="mt-3" type="file" method="POST" name="avatar">
    </center>
  <hr>
      <div class="row justify-content-center pr-4 pl-4">
      <div class="form-group col-md-4">
          <label for="inputAge">Date of Birth</label>
          <input type="date" class="form-control{{$errors->has('age') ? 'is-invalid' : ''}} datepicker" name="age" value="">

          @if ($errors->has('age'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('age') }}</strong>
              </span>
          @endif
        </div>  
        <div class="form-group col-md-4">
          <label for="">Phone</label>
          <input type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="" required>

          @if ($errors->has('phone'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control{{$errors->has('address') ? 'is-invalid' : ''}}" name="address" value="">

          @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">City</label>
          <input type="text" class="form-control{{$errors->has('city') ? 'is-invalid' : ''}}" name="city" value="">

          @if ($errors->has('city'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('city') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State (Region)</label>
          <input type="text" class="form-control{{$errors->has('state') ? 'is-invalid' : ''}}" name="state" value="">

          @if ($errors->has('state'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('state') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputCountry">Country</label>
          <input type="text" class="form-control{{$errors->has('country') ? 'is-invalid' : ''}}" name="country" value="">

          @if($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('country') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputGender">Gender</label>
          <select class="form-control{{ $errors->has('gender') ? 'is-invalid' : ''}}" name="gender" required>
            <option value="0" selected> Female </option>
            <option value="1"> Male </option>
          </select>
          @if($errors->has('gender'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('gender') }}</strong>
              </span>
          @endif
        </div>
        @if($user->type === 'student')
          <div class="form-group col-md-4">
            <label for="parents_guidians_name">Parent/Guidian name</label>
            <input type="text" class="form-control{{$errors->has('parents_guidians_name') ? 'is-invalid' : ''}}" name="parents_guidians_name" value="">

            @if($errors->has('parents_guidians_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('parents_guidians_name') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="parents_guidians_phone">Parent/Guidian Phone</label>
            <input type="text" class="form-control{{$errors->has('parents_guidians_phone') ? 'is-invalid' : ''}}" name="parents_guidians_phone" value="">

            @if($errors->has('parents_guidians_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('parents_guidians_phone') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="inputClass">Choose class</label>         
                <select class="form-control{{ $errors->has('class') ? 'is-invalid' : ''}}" name="class_id" required>
                      <option value="" selected disabled> Choose a class</option>
                      @foreach($classes as $class)
                        <option value="{{ $class->class_id }}"> {{ $class->name }} </option>
                      @endforeach
                </select>
            @if($errors->has('class'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('class') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group col-md-4">
              <label for="inputHealthDescription">
                  Blood group
              </label>
              <select class="form-control" name="blood_group">
                  <option value="1">A Positive</option>
                  <option value="2">A Negative</option>
                  <option value="3">A Unknown</option>
                  <option value="4">B Positive</option>
                  <option value="5">B Negative</option>
                  <option value="6">B Unknown</option>
                  <option value="7">AB Positive</option>
                  <option value="8">AB Negative</option>
                  <option value="9">AB Unknown</option>
                  <option value="10">O Positive</option>
                  <option value="11">O Negative</option>
                  <option value="12">O Unknown</option>
                  <option value="13">Unknown</option>
              </select>
              @if($errors->has('health_information'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('health_information') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group col-md-4">
              <label for="doctor_number">Doctor's phone</label>
              <input type="text" class="form-control{{$errors->has('doctor_number') ? 'is-invalid' : ''}}" name="doctor_phone" value="">

              @if($errors->has('doctor_number'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('doctor_number') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group col-md-4">
              <label for="inputHealthDescription">
                  Ailment (If any)
              </label>
              <textarea class="form-control{{ $errors->has('health_information') ? 'is-invalid' : ''}}" name="health_information" required></textarea>
                @if($errors->has('health_information'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('health_information')}}</strong>
                    </span>
                @endif
          </div>
          <div class="col-md-8">
          <hr>
          <h5>Select subjects</h5><br>
              @foreach($subjects as $key => $subject)
                 <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="subjects[]" value="{{$subject->subject_id}}">
                    <label class="form-check-label" for="defaultInline{{$key + 1}}">{{$subject->name}}</label>
                  </div>
              @endforeach
          </div>
        @endif
        <input type="hidden" name="user_id" value="{{ $user->id }}"/>
      <div class="col-md-12"></div>
        <button type="submit" class="btn btn-success rounded mb-4 mt-4"> Create </button>
      </div>
    </div>
  </form>
</div>
@endsection