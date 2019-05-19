@extends('layouts.admin')
@section('leftpanel')
    @include('pages.core.admin.components.leftpanel')
@endsection
@section('content')
@include('components.flash_messages')
<div class="col-sm-12">
    <div class="panel panel-default panel-table">
        <form method="POST" action="{{route('store.comment')}}" enctype="multipart/form-data" class="form-contact school-creation-form form-control">
            @csrf
            <div class="row justify-content-center pr-4 pl-4">
                <div class="form-group col-md-8"><br>
                    <center>
                        <img src="{{url('images/photo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
                        <h3 class="media-heading">{{$student->name}}</h3>
                        <h5 class="media-heading">{{$student->email}}</h5>
                        <small>{{ $student->type }}</small>  
                    </center>
                    <hr>
                    <label for="inputComment">
                        Comment about {{$student->name}}
                    </label>
                    <textarea class="form-control{{ $errors->has('comment') ? 'is-invalid' : ''}}" name="comment" required></textarea>
                        @if($errors->has('comment'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('comment')}}</strong>
                            </span>
                        @endif
                </div>
                <input type="hidden" name="student_id" value="{{$student->id}}"/>
                <div class="col-md-12"></div>
                <button type="submit" class="btn btn-success rounded mb-4 mt-4"> Create </button>
            </div>
        </form>
    </div>
</div>
@endsection

