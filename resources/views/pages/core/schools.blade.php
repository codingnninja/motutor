@extends('layouts.app')
   @section('content')
     @component('components.search')
     @endcomponent    

     @component('components.showcase' , ['items'=> $items])
     @endcomponent
   @endsection

