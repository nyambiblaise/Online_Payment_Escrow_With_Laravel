
     @if(!request()->routeIs('home'))
         <section class="hero-section bg_img" data-background="{{getFile(config('location.logo.path').'banner.jpg')}}" style="background-image: url({{getFile(config('location.logo.path').'banner.jpg')}});">
             <div class="container">
                 <div class="hero-content">
                     <h2 class="hero-title">@yield('title')</h2>
                 </div>
             </div>
         </section>
     @endif
