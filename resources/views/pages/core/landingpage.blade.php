@extends('layouts.app')
   @section('content')
     @component('components.tagline')
     @endcomponent

     @component('components.featurette')
     @endcomponent  

      @component('components.showcase' , ['items'=> $items])
      @endcomponent
      <section id="partner">
         <div class="container">
            <div class="center wow fadeInDown">
            <h3>Supported by:</h3>
             <p>Meet our supporters!</p>
            </div>
            <div class="partners">
            <ul>
               <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
            </ul>
            </div>
         </div>
         <!--/.container-->
      </section>
      <!--/#partner-->

      <section id="conatcat-info">
         <div class="container">
            <div class="row">
            <div class="col-sm-8">
               <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                  <div class="pull-left">
                  <i class="fa fa-phone"></i>
                  </div>
                  <div class="media-body">
                  <h2>Have a question or need a custom quote?</h2>
                  <p>Our customer care representtives are awaiting your enquiries, complaints or requests: Call +2349057073306</p>
                  </div>
               </div>
            </div>
            </div>
         </div>
         <!--/.container-->
      </section>
      <!--/#conatcat-info-->
      
      <!-- <div class="about">
         <div class="container">
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>about us</h2>
            <img src="images/6.jpg" class="img-responsive" />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
               pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            </p>
            </div>
         </div>
      </div> -->

   @endsection