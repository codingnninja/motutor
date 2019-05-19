@extends('layouts.admin')
@section('leftpanel')
    @include('pages.core.admin.components.leftpanel')
@endsection
@section('content')
@include('components.flash_messages')
<div class="col-sm-12">
    <div class="panel panel-default panel-table">
        <form method="POST" action="{{route('add.topic')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
                @csrf
                <div class="row justify-content-center pr-4 pl-4">
                <div class="row justify-content-center pr-4 pl-4">
                    <div class="form-group col-md-4">
                        <label for="inputSubject">Selected subject</label>         
                            <select class="form-control{{ $errors->has('subject') ? 'is-invalid' : ''}}" name="subject_id" required>
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
                    <div class="panel panel-default panel-table col-md-12">
                            <div class="panel-heading  bg bg-white py-2 pl-2 pr-2">
                                <div class="row">
                                    <div class="col col-xs-6 ">
                                    <h5 class="panel-title"><small></small> <span class="text-primary" style="text-transform:capitalize"></span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <th>Topic</th>
                                        <th>Grade</th>
                                    </tr>               
                                </thead>
                                <tbody>
                                @foreach($subjects as $key => $subject)
                                <tr>
                                    {{-- this is id is not the real class id. Use $subject->subject_id instead --}}
                                        <td class="hidden-xs">{{ $key + 1 }}</td>
                                        <td>{{$subject->topic}}</td>
                                    {{-- <td>{{ $subject->status }}</td> --}} 
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="users[]" value="">
                                                <label class="form-check-label" for="defaultInline">Outstanding</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="users[]" value="">
                                                <label class="form-check-label" for="defaultInline">Expected</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="users[]" value="">
                                                <label class="form-check-label" for="defaultInline">Satisfactory</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="users[]" value="">
                                                <label class="form-check-label" for="defaultInline">Improving</label>
                                            </div>
                                        </td>
                                </tr>  
                                @endforeach 
                                </tbody>
                            </table>
                        </div>
                    <div class="col-md-12"></div><br>
                    <button type="submit" class="btn btn-success rounded mb-4 mt-4"> Create </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

