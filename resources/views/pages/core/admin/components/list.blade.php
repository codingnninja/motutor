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
              <h5 class="panel-title">Students</h5>
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
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>               
              </thead>
            <tbody>
              @foreach($students as $key => $student)
              <tr>
              {{-- this is id is not the real student id. Use $student->id instead --}}
                <td class="hidden-xs">{{ $key + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ 'active' }}</td>
               {{-- <td>{{ $student->status }}</td> --}} 
                <td>
                    <a title="view this" class="btn btn-default btn-sm " href="{{url('profile/'.$student->id) }}"> 
                      <i class="fa fa-eye text-primary"></i> 
                    </a>
                    <a title="edit this" class="btn btn-default btn-sm" href="{{url('profile/edit/'.$student->id) }}"> 
                      <i class="fa fa-edit"></i> 
                    </a>
                    <a title="delete this" class="btn btn-default btn-sm " href="{{url('admin/delete/student/'.$student->id) }}"> 
                      <i class="fa fa-trash text-danger"></i> 
                    </a>
                    <span class="menu-item-has-children dropdown btn btn-default btn-sm">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop text-success"></i></a>
                      <ul class="sub-menu children dropdown-menu p-3">
                          <li class="mb-3 pl-1"><i class="fa fa-puzzle-piece"></i><a href="{{route('get.students')}}"> Check result</a></li>
                          <li class="mb-3 pl-1"><i class="fa fa-id-badge"></i><a href="{{route('get.staff')}}"> Check comments</a></li>
                          <li class="mb-3 pl-1"><i class="fa fa-bars"></i><a href="{{route('get.parents')}}"> Check class</a></li>
                          <li class="mb-3 pl-1"><i class="fa fa-bars"></i><a href="{{route('get.parents')}}"> Check Attendance</a></li>
                      </ul>
                    </span>
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

