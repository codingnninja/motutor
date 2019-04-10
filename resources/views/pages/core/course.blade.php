@extends('layouts.app')
   @section('content')
     @component('components.tagline')
     @endcomponent
      <iframe src="http://deadsimplechat.com/+INaDu" frameborder="0" width="800px" height="600px"></iframe>
     @component('components.showcase', ['items'=>[]])
     @endcomponent
   @endsection