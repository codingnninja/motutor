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
              <h5 class="panel-title">Class you manage.</h5>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-list">
              <thead>
                  <tr>
                      <td>ID</td>
                      <th>Name</th>
                      <th>Manager</th>
                      <th>Actions</th>
                  </tr>               
              </thead>
            <tbody>
              @foreach($classes as $key => $class)
              <tr>
              {{-- this is id is not the real class id. Use $class->id instead --}}
                <td class="hidden-xs">{{ $key + 1 }}</td>
                <td>{{ $class->name }}</td>
               <td> 
                  @if($class->teacher_id == auth()->user()->id)
                     {{'You'}}
                  @endif
               </td>
               {{-- <td>{{ $class->status }}</td> --}} 
                <td>
                    <a title="view this" class="btn btn-default btn-sm " href="{{url('teacher/class/students'.$class->id) }}"> 
                      <i class="fa fa-eye text-primary">  View students</i> 
                    </a>
                  </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
@endsection

