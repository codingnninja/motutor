@extends('layouts.admin')
@section('leftpanel')
    @include('pages.core.admin.components.leftpanel')
@endsection
@section('content')
@include('components.flash_messages')
<div class="col-sm-12">
    <div class="panel panel-default panel-table">
        <form method="POST" action="{{route('test')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
                @csrf
                <div class="row justify-content-center pr-4 pl-4">
                    <div class="form-group col-md-4">
                        <label for="inputSubject">Choose a subject;</label>         
                            <select class="form-control{{ $errors->has('class') ? 'is-invalid' : ''}}" name="subject_id" required>
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
                        <label for="inputHealthDescription">
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
                    <div class="form-group col-md-4">
                    <label for="inputTestScore">C.A. Test score</label>
                    <input type="number" class="form-control{{ $errors->has('test_score') ? ' is-invalid' : '' }}" name="test_score" value="" required>

                    @if ($errors->has('test_score'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('test_score') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputWelcomeTestScore">Welcome test score</label>
                        <input type="number" class="form-control{{ $errors->has('welcome_test_score') ? ' is-invalid' : '' }}" name="welcome_test_score" value="" required>

                        @if ($errors->has('welcome_test_score'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('welcome_test_score') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNoteScore">Complete Note score</label>
                        <input type="number" class="form-control{{ $errors->has('note_score') ? ' is-invalid' : '' }}" name="note_score" value="" required>

                        @if ($errors->has('note_score'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('note_score') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputHomeworkScore">Homework score</label>
                        <input type="number" class="form-control{{ $errors->has('homework_score') ? ' is-invalid' : '' }}" name="homework_score" value="" required>

                        @if ($errors->has('homework_score'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('homework_score') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputClassworkScore">Class work score</label>
                        <input type="number" class="form-control{{ $errors->has('classwork_score') ? ' is-invalid' : '' }}" name="classwork_score" value="" required>

                        @if ($errors->has('classwork_score'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('classwork_score') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputExamScore">Examination score</label>
                    <input type="text" class="form-control{{$errors->has('exam_score') ? 'is-invalid' : ''}}" name="exam" value="">

                    @if ($errors->has('exam_score'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('exam_score') }}</strong>
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
                                @foreach($topics as $key => $topic)
                                <tr>
                                    {{-- this is id is not the real class id. Use $topic->topic_id instead --}}
                                        <td class="hidden-xs">{{ $key + 1 }}</td>
                                        <td>{{$topic->topic}}</td>
                                    {{-- <td>{{ $topic->status }}</td> --}} 
                                        <td>
                                            <select class="form-control" name="topics[]">
                                                <option value="{{$topic->topic}}:1">Outstanding</option>
                                                <option value="{{$topic->topic}}:2">Expected</option>
                                                <option value="{{$topic->topic}}:3">Satisfactory</option>
                                                <option value="{{$topic->topic}}:4">Improving</option>
                                            </select>
                                        </td>
                                </tr>  
                                @endforeach 
                                </tbody>
                            </table>
                        </div>
                    <div class="form-group col-md-8">
                        <label for="inputComment">
                            Comment
                        </label>
                        <textarea class="form-control{{ $errors->has('comment') ? 'is-invalid' : ''}}" name="comment" required></textarea>
                            @if($errors->has('comment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('comment')}}</strong>
                                </span>
                            @endif
                    </div>
                    <input type="hidden" name="student_id" value="{{$user->id}}"/>
                    <div class="col-md-12"></div><br>
                    <button type="submit" class="btn btn-success rounded mb-4 mt-4"> Create </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

