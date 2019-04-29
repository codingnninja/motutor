@extends('layouts.admin')
   @section('leftpanel')
        @include('pages.core.admin.components.leftpanel')
   @endsection
   @section('content')
   	   @parent 
        @include('components.flash_messages') 
   	   <div class="col-md-12">
  <form method="POST" action="{{route('update')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
    @csrf
    <center class="pt-5">
      <img src="{{url('images/photo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
      <h3 class="media-heading">{{$user->name}}</h3>
      <h5 class="media-heading">{{$user->email}}</h5>
      <small>{{$user->type}}</small><br>
      <input class="mt-3" type="file" method="POST">
    </center>
  <hr>
      <div class="row justify-content-center pr-4 pl-4">
      <div class="form-group col-md-4">
          <label for="inputAge">Age</label>
          <input type="text" class="form-control{{$errors->has('age') ? 'is-invalid' : ''}}" name="age" value="{{$profile->age}}">

          @if ($errors->has('age'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('age') }}</strong>
              </span>
          @endif
        </div>  
        <div class="form-group col-md-4">
          <label for="">Phone</label>
          <input type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{$profile->phone}}" required>

          @if ($errors->has('phone'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control{{$errors->has('address') ? 'is-invalid' : ''}}" name="address" value="{{$profile->address}}">

          @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">City</label>
          <input type="text" class="form-control{{$errors->has('city') ? 'is-invalid' : ''}}" name="city" value="{{$profile->city}}">

          @if ($errors->has('city'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('city') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State (Region)</label>
          <input type="text" class="form-control{{$errors->has('state') ? 'is-invalid' : ''}}" name="state" value="{{$profile->state}}">

          @if ($errors->has('state'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('state') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputCountry">Country</label>
          <input type="text" class="form-control{{$errors->has('country') ? 'is-invalid' : ''}}" name="country" value="{{$profile->country}}">

          @if($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('country') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="inputGender">Gender</label>
          <select class="form-control{{ $errors->has('gender') ? 'is-invalid' : ''}}" name="gender" required>
            <option value="0" {{$profile->gender == 0 ? 'selected' : '' }}> Female </option>
            <option value="1" {{$profile->gender == 1 ? 'selected' : '' }}> Male </option>
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
            <input type="text" class="form-control{{$errors->has('parents_guidians_name') ? 'is-invalid' : ''}}" name="parents_guidians_name" value="{{$profile->parents_guidians_name}}">

            @if($errors->has('parents_guidians_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('parents_guidians_name') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="parents_guidians_phone">Parent/Guidian Phone</label>
            <input type="text" class="form-control{{$errors->has('parents_guidians_phone') ? 'is-invalid' : ''}}" name="parents_guidians_phone" value="{{$profile->parents_guidians_phone}}">

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
                        <option value="{{ $class->class_id }}" {{$profile->class_id == $class->class_id ? 'selected' : ''}}> {{ $class->name }} </option>
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
              <select class="form-control" name="">
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
              <label for="doctors_number">Doctor's phone</label>
              <input type="text" class="form-control{{$errors->has('doctors_number') ? 'is-invalid' : ''}}" name="doctors_number" value="{{$profile->doctors_number}}">

              @if($errors->has('doctors_number'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('doctors_number') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group col-md-4">
              <label for="inputHealthDescription">
                  Ailment (If any)
              </label>
              <textarea class="form-control{{ $errors->has('health_information') ? 'is-invalid' : ''}}" name="health_information" required>{{ $profile->health_information}}</textarea>
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
                  @foreach($user->subjects as $userSubject)
                  @if($subject->subject_id == $userSubject->subject_id)
                      <div class="form-check form-check-inline">                        
                          <input type="checkbox" class="form-check-input" name="subjects[]" value="{{$subject->subject_id}}" {{$subject->name == $userSubject->name ? "checked" : ""}}>
                          <label class="form-check-label" for="defaultInline{{$key + 1}}">{{$subject->name}}</label>
                      </div>
                  @endif
                  @endforeach
              @endforeach
          </div>
        @endif
        <input type="hidden" name="profile_id" value="{{ $profile->profile_id }}"/>
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
      <div class="col-md-12"></div>
        <button type="submit" class="btn btn-success rounded mb-4 mt-4"> Update  </button>
      </div>
    </div>
  </form>
</div>
@endsection