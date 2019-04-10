@extends('layouts.admin')
   @section('content')
   	   @parent 
       @component('components.forms.create_program')
          @slot('action')
             Create a program!
          @endslot
       @endcomponent  
   @endsection