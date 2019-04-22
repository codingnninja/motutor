@extends('layouts.admin')
   @section('content')
   	   @parent 
<div class="col-md-12">
  <form method="POST" action="{{route('store.school')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
    @csrf
      <h1 class="h3 mb-3 font-weight-normal text-center">Create!</h1>
      <hr>
      <center>
        <img src="{{url('images/photo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a><br>
        <input class="mt-3" type="file" method="POST">
      </center>
      <hr>
      <div class="row justify-content-center pr-4 pl-4">
       @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <div class="form-group col-md-4">
          <label for="meTitle">Title</label>
          <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required autofocus>
          @if ($errors->has('title'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="">phones</label>
          <input type="phone" class="form-control{{ $errors->has('phones') ? ' is-invalid' : '' }}" name="phones" value="{{ old('phones') }}" required>

          @if ($errors->has('phones'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phones') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group col-md-4">
          <label for="inputInstructors"> instructors </label>
          <input type="text" class="form-control{{ $errors->has('instructors') ? ' is-invalid' : '' }}" name="instructors" value="{{old('instructors')}}" required>

          @if ($errors->has('instructors'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('instructors') }}</strong>
              </span>
          @endif
        </div>
      
        <div class="form-group col-md-4">
          <label for="inputEmail">Emails</label>
          <input type="text" class="form-control{{$errors->has('emails') ? ' is-invalid' : ''}}" name="emails" placeholder="" value="{{old('emails')}}" required>

          @if ($errors->has('emails'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('emails') }}</strong>
              </span>
          @endif
        </div>

      <div class="form-group col-md-4">
        <label for="inputTags">Tags</label>
        <input type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid': ''}}" name="tags" placeholder="" value="{{ old('tags') }}" required>

        @if ($errors->has('tags'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tags') }}</strong>
              </span>
          @endif
      </div>
     
      <div class="form-group col-md-4">
        <label for="inputStatus"> status</label>
        <select class="form-control{{ $errors->has('status') ? 'is-invalid' : ''}}" name="status" required>
	          <option value="1" selected> Published </option>
	          <option value="2"> Drafted </option>
	          <option value="3"> Activated </option>
	          <option value="4"> Deactivated </option>
        </select>

          @if ($errors->has('status'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('status') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group col-md-4">
        <label for="inputWhatYouGet">You get?</label>
        <input type="text" class="form-control{{ $errors->has('what_you_get') ? 'is-invalid': ''}}" name="what_you_get" placeholder="" value="{{ old('what_you_get') }}">

          @if ($errors->has('what_you_get'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('what_you_get') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group col-md-4">
        <label for="inputWhyChoosing">Why us?</label>
        <input type="text" class="form-control{{ $errors->has('why_choosing')}}" name="why_choosing" value="{{ old('why_choosing') }}" required>

          @if ($errors->has('why_choosing'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('why_choosing') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group col-md-4">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control{{$errors->has('address') ? 'is-invalid' : ''}}" name="address" value="{{ old('address') }}">

          @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group col-md-4">
        <label for="inputMedia">Media urls</label>
        <input type="text" class="form-control{{ $errors->has('media') ? 'is-invalid' : ''}}" name="media" value="{{ old('media') }}">

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
        <textarea class="form-control{{ $errors->has('description') ? 'is-invalid' : ''}}" name="description" required> {{ old('description') }}</textarea>

          @if ($errors->has('description'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
      </div>
      <input type="hidden" name="user_id" value="{{ auth::user()->id}}">
      <div class="form-group"></div>
        <button type="submit" class="btn btn-success form-control"> Create </button>
      </div>
    </div>
  </form>
</div> 
   @endsection