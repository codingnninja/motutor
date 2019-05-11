@extends('layouts.admin')
@section('leftpanel')
    @include('pages.core.admin.components.leftpanel')
@endsection
@section('content')
@include('components.flash_messages')
    <div class="col-sm-12 bg-white">
      <div class="panel panel-default panel-table">
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
                      <td>Number</td>
                      <th>Subject name</th>
                      <th>Subject status</th>
                      <th>Actions</th>
                  </tr>               
              </thead>
            <tbody>
            @foreach($items as $key => $item)
              {{-- this is id is not the real class id. Use $item->id instead --}}
                <td class="hidden-xs">{{ $key + 1 }}</td>
                <td>{{$item->author->name}}</td>
               <td> 
                    active
               </td>
               {{-- <td>{{ $item->status }}</td> --}} 
                <td>
                    <a title="view this" class="btn btn-default btn-sm " href="{{url('teacher/classes/score/'.$item->author->id)}}"> 
                      <i class="fa fa-plus text-success"> Record scores</i> 
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

