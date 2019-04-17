@extends('layouts.admin')
   @section('content')
   	   @parent 
   	   <div class="col-md-12">
  <form method="POST" action="{{route('update.school')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
    @csrf
      <h4 class="h3 mb-3 font-weight-normal text-center">Edit school !</h4>
      <hr>
      <div class="row justify-content-center">
      
        <div class="form-group col-md-4">
          <label for="meTitle"> Title</label>
          <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $school->title }}" required autofocus>
          @if ($errors->has('title'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="">Phones</label>
          <input type="phone" class="form-control{{ $errors->has('phones') ? ' is-invalid' : '' }}" name="phones" value="{{ $school->phones }}" required>

          @if ($errors->has('phones'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group col-md-4">
          <label for="inputInstructors"> Instructors </label>
          <input type="text" class="form-control{{ $errors->has('instructors') ? ' is-invalid' : '' }}" name="instructors" value="{{ $school->instructors}}" required>

          @if ($errors->has('instructors'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('instructors') }}</strong>
              </span>
          @endif
        </div>
      
        <div class="form-group col-md-4">
          <label for="inputEmail">Emails</label>
          <input type="text" class="form-control{{$errors->has('emails') ? ' is-invalid' : ''}}" name="emails" value="{{ $school->emails }}" required>

          @if ($errors->has('emails'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('emails') }}</strong>
              </span>
          @endif
        </div>

      <div class="form-group col-md-4">
        <label for="inputTags">Tags</label>
        <input type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid': ''}}" name="tags" value="{{ $tags }}" required>
        
        @if ($errors->has('tags'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tags') }}</strong>
              </span>
          @endif
      </div>
     
      <div class="form-group col-md-4">
        <label for="inputStatus"> status</label>
        <select class="form-control{{ $errors->has('status') ? 'is-invalid' : ''}}" name="status" required>
        @if(count($statuses) < 1)
	          <option value="0" selected> Published </option>
	          <option value="1"> Drafted </option>
	          <option value="2"> Activated </option>
	          <option value="3"> Deactivated </option>
	      @else
          @foreach($statuses as $status)
          <option value="{{ $status->status_id }}" {{$status->slug == $school->slug ? 'selected' : '' }}>{{ $status->status }}</option>
          @endforeach
        @endif
        </select>

          @if ($errors->has('status'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('status') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group col-md-4">
        <label for="inputWhatYouGet">You get?</label>
        <input type="text" class="form-control{{ $errors->has('what_you_get') ? 'is-invalid': ''}}" name="what_you_get" placeholder="video, pdf" value="{{ $school->what_you_get }}">

          @if ($errors->has('what_you_get'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('what_you_get') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group col-md-4">
        <label for="inputWhyChoosing">Why us?</label>
        <input type="text" class="form-control{{ $errors->has('why_choosing')}}" name="why_choosing" value="{{ $school->why_choosing }}" required>

          @if ($errors->has('why_choosing'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('why_choosing') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group col-md-4">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control{{$errors->has('address') ? 'is-invalid' : ''}}" name="address" value="{{ $school->address }}">

          @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group col-md-4">
        <label for="inputMedia">Media urls</label>
        <input type="text" class="form-control{{ $errors->has('media') ? 'is-invalid' : ''}}" name="media" value="{{ $school->media }}">

          @if ($errors->has('media'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('media') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group col-md-4">
        <label for="inputDescription">
           description
        </label>
        <textarea class="form-control{{ $errors->has('description') ? 'is-invalid' : ''}}" name="description" required> {{ $school->description }}</textarea>

          @if ($errors->has('description'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
      </div>
      
      <input type="hidden" name="user_id" value="{{ $school->user_id }}" />
      <input type="hidden" name="school_id" value="{{ $school->school_id }}" />
      <div class="col-md-12"></div>
        <button type="submit" class="btn btn-success rounded"> Create </button>
      </div>
    </div>
  </form>
</div>
@endsection