@extends('layouts.admin')
@section('leftpanel')
    @include('pages.core.admin.components.leftpanel')
@endsection
@section('content')
@include('components.flash_messages')
<div class="col-sm-12">
    <div class="panel panel-default panel-table">
        <form method="POST" action="{{route('store')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
                @csrf
                <div class="row justify-content-center pr-4 pl-4">
                <div class="row justify-content-center pr-4 pl-4">
                    <div class="form-group col-md-4">
                        <label for="inputSubject">Selected subject</label>         
                            <select class="form-control{{ $errors->has('subject') ? 'is-invalid' : ''}}" name="subject_id" required disabled>
                                @foreach($subjects as $key => $subject)
                                    <option value="{{ $subject->subject_id }}"> {{ $subject->name }} </option>
                                @endforeach
                            </select>
                        @if($errors->has('subject'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputClass">Choose a class</label>         
                            <select class="form-control{{ $errors->has('class') ? 'is-invalid' : ''}}" name="class_id" required>
                                @foreach($classes as $key => $class)
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
                        <label for="inputTerm">
                            Terms
                        </label>
                        <select class="form-control" name="term">
                            <option value="1">First term </option>
                            <option value="2">Second term</option>
                            <option value="3">Third term</option>
                        </select>
                        @if($errors->has('term'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('term') }}</strong>
                            </span>
                        @endif
                    </div>  
                    <div class="form-group col-md-6">
                    <label for="inputTopic">First topic</label>
                    <input type="text" class="form-control{{ $errors->has('topic') ? ' is-invalid' : '' }}" name="topic" value="" required>

                    @if ($errors->has('topic'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('topic') }}</strong>
                        </span>
                    @endif
                    </div>
                    <input type="hidden" name="user_id" value=""/>
                    <div class="col-md-12"></div><br>
                    <button type="submit" class="btn btn-success rounded mb-4 mt-4"> Create </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

