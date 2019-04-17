@extends('layouts.admin')
@section('leftpanel')
    @include('pages.core.admin.components.leftpanel')
@endsection
@section('content')
    <div class="col-sm-12">

      <div class="panel panel-default panel-table">
        <div class="panel-heading  bg bg-white py-2 pl-2 pr-2">
          <div class="row">
            <div class="col col-xs-6 ">
              <h5 class="panel-title">A list of schools</h5>
            </div>
            <div class="col text-right">
              <a href="{{route('create.program')}}">
                <button type="button" class="btn btn-sm btn-primary btn-create">
                  Create new school
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
                      <th></i>Description</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>               
              </thead>
            <tbody>
              @foreach($schools as $school)
              <tr>
                <td class="hidden-xs">{{ $school->school_id }}</td>
                <td>{{ $school->title }}</td>
                <td>{{ $school->description }}</td>
                <td>{{ $school->status }}</td>
                <td>
                    <a title="view this user" class="btn btn-default btn-sm " href="{{url('admin/school/'.$school->school_id) }}"> 
                      <i class="fa fa-eye text-primary"></i> 
                    </a>
                    <a title="edit this user" class="btn btn-default btn-sm" href="{{url('admin/school/edit/'.$school->school_id) }}"> 
                      <i class="fa fa-edit"></i> 
                    </a>
                    <a title="delete this user" class="btn btn-default btn-sm " href="{{url('admin/delete/school/'.$school->school_id) }}"> 
                      <i class="fa fa-trash text-danger"></i> 
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

