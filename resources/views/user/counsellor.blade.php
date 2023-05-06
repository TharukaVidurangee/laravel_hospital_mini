<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Counsellors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      
      @foreach($counsellor as $counsellors)

      <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height="350 px" src="counsellorphoto/{{$counsellors->photo}}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>

            <div class="body">
              <p class="text-xl mb-0">{{$counsellors->name}}</p>
              <span class="text-sm text-grey">{{$counsellors->visitinghr}}</span>
            </div>
        </div>   
      </div>


      @endforeach
    </div>
  </div>
</div>
        


  