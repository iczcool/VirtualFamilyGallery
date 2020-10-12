@extends('includes.app')

@section('content')

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <a href="/gallery" class=""><i class='bx bx-photo-album'></i>&nbsp;&nbsp;Albums</a>
          </div>
        </div>
        

        <div class="row">
          <div class="col-lg-8">
            <form action="{{ action('AlbumController@update', $album->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-6 form-group">
                <input type="text" name="title" value="{{$album->title}}" />
              </div>
              <!-- <div class="col-md-6 form-group">
                <input type="text" name="description" value="{{ $album->description }}" />
              </div> -->
              <div class="form-group">
                <textarea class="form-control" name="description" value="{{$album->description}}" rows="5"></textarea>
              </div>
              <div class="col-md-6 form-group">
                <input type="file" name="cover" value="{{$album->cover}}" />
              </div>
              <div class="col-md-12 form-group">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>




        </div>
    </section><!-- End Gallery Section -->
<!-- </div> -->
@endsection