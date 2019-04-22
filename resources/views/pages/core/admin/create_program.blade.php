@extends('layouts.admin')
   @section('content')
   	   @parent 
       @component('components.forms.create_program')
          @slot('action')
             Create student!
          @endslot
       @endcomponent  
   @endsection