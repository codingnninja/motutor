@extends('layouts.admin')
@section('leftpanel')
    @include('pages.core.admin.components.leftpanel')
@endsection
@section('content')
    <div class="col-sm-12">
    @include('components.flash_messages') 
      <div class="panel panel-default panel-table">
        <div class="panel-heading  bg bg-white py-2 pl-2 pr-2">
          <div class="row">
            <div class="col col-xs-6 ">
              <h5 class="panel-title">Subjects</h5>
            </div>
            <div class="col text-right">
              <a href="{{route('register')}}">
                <button type="button" class="btn btn-sm btn-primary btn-create">
                  Create new
                </button>
              </a>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-list">
              <thead>
                  <tr>
                      <td>ID</td>
                      <th>Name</th>
                      <th>Teacher</th>
                      <th>Actions</th>
                  </tr>               
              </thead>
            <tbody>
              @foreach($subjects as $key => $subject)
              <tr>
                {{-- this is id is not the real subject id. Use $subject->id instead --}}
                  <td class="hidden-xs">{{ $key + 1 }}</td>
                  <td>{{ $subject->name }}</td>
                <td> 
                    @if($subject->teacher == auth()->user()->id)
                      {{'You'}}
                    @endif
                </td>
                {{-- <td>{{ $subject->status }}</td> --}} 
                  <td>
                      <a title="view this" class="btn btn-default btn-sm " href="{{route('topics', $subject->subject_id)}}"> 
                        <i class="fa fa-plus text-primary"> Add topics</i> 
                      </a>
                  </td>
              </tr>
            @endforeach
            </tbody>
          </table>
  
        </div>
        <div class="panel-footer">
          <div class="row">
            //pagination
          </div>
        </div>
      </div>

    </div>
@endsection

