@extends('layouts.app')
   @section('content') 
       @component('components.forms.contactinput', ['slug'=>$slug])
          @slot('action')
             Register!
          @endslot
       @endcomponent  
   @endsection