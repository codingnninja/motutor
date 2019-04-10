@extends('layouts.app')
   @section('content') 
       @component('components.forms.contactinput')
          @slot('action')
             <small style="font-size: 18px;">Thanks for donating. We want to thank you in person, so fill the form bellow. Cheers!</small>
          @endslot
       @endcomponent  
   @endsection