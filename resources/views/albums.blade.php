@extends('layouts.app')

@section('content')

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            @if(Auth::check())
              <a href="/createalbum" class=""><i class='bx bx-add-to-queue'></i>&nbsp;&nbsp;Add Album</a>
            @endif
            <ul id="gallery-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-home">Home</li>
              <li data-filter=".filter-beach">Beach</li>
              <li data-filter=".filter-vacation">Vacation</li>
            </ul>
          </div>
        </div>

        <div class="row gallery-container">
          @if(count($albums) > 0)
            @foreach($albums as $album)  
              <div class="col-lg-4 col-md-6 gallery-item filter-vacation">
                <div class="gallery-wrap">
                  <!-- <img src="assets/img/gallery/vacation-2.jpg" class="img-fluid" alt=""> --> 
                  <img src="/storage/assets/img/images/{{$album->cover}}" class="img-fluid" alt="">          
                  <div class="gallery-info">
                    <p></p>
                    <div class="gallery-links">
                      <a href="/albums/open_album/{{$album->id}}" data-gall="galleryGallery" title="{{$album->description}}"><i class='bx bx-images bx-md'></i></i></a>
                    </div>
                  </div>
                  <div style="color: #fff; text-align: center;">
                    <h4>{{$album->title}}</h4>
                    <p>22 Photos</p>
                  </div>
                </div>
                @if(Auth::check())
                  <div style="margin-top: 8px">
                    <a href="/edit_album/{{$album->id}}"><i class="bx bxs-edit bx-sm"></i></a>
                    <a href="/delete/{{$album->id}}"><i class='bx bxs-trash-alt bx-sm'></i></a>
                  </div>
                @endif
              </div>

            @endforeach
          @elseif(count($albums) <= 0)
            <h2>No Albums to show</h2>
          @endif
        </div>        
      </div>
    </section><!-- End Gallery Section -->
<!-- </div> -->
@endsection