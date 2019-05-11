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
                    <div class="form-group col-md-4">
                        <label for="inputClass">Choose a subject;</label>         
                            <select class="form-control{{ $errors->has('class') ? 'is-invalid' : ''}}" name="class_id" required>
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
                        <select class="form-control" name="blood_group">
                            <option value="1">First term </option>
                            <option value="2">Second term</option>
                            <option value="3">Third term</option>
                        </select>
                        @if($errors->has('health_information'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('health_information') }}</strong>
                            </span>
                        @endif
                    </div>  
                    <div class="form-group col-md-4">
                    <label for="">C.A. Test score</label>
                    <input type="number" class="form-control{{ $errors->has('catest') ? ' is-invalid' : '' }}" name="cat_score" value="" required>

                    @if ($errors->has('catest'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('catest') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCnscore">Complete Note score</label>
                        <input type="number" class="form-control{{ $errors->has('cnscore') ? ' is-invalid' : '' }}" name="cn_score" value="" required>

                        @if ($errors->has('cnscore'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cnscore') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputHomework">Homework score</label>
                        <input type="number" class="form-control{{ $errors->has('homework') ? ' is-invalid' : '' }}" name="homework_score" value="" required>

                        @if ($errors->has('homework'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('homework') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputExamination">Examination score</label>
                    <input type="text" class="form-control{{$errors->has('examination') ? 'is-invalid' : ''}}" name="exam_score" value="">

                    @if ($errors->has('examination'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('examination') }}</strong>
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
                                        <td>{{$subject->name}}</td>
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
                    <input type="hidden" name="user_id" value=""/>
                    <div class="col-md-12"></div><br>
                    <button type="submit" class="btn btn-success rounded mb-4 mt-4"> Create </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

