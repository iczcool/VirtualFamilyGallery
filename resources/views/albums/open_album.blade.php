@extends('layouts.app')
<style>
  /**,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  body {
    min-height: 100vh;
    background-color: #fafafa;
  }*/
  .container {
    /*max-width: 100rem;
    margin: 0 auto;
    padding: 0 2rem 2rem;*/
  }
  .gallery {
    display: flex;
    flex-wrap: wrap;
    /* Compensate for excess margin on outer gallery flex items */
    margin: -1rem -1rem;
  }

  .item {
    /* Minimum width of 24rem and grow to fit available space */
    flex: 1 0 24rem;
    /* Margin value should be half of grid-gap value as margins on flex items don't collapse */
    margin: 1rem;
    /*box-shadow: 0.3rem 0.4rem 0.4rem rgba(0, 0, 0, 0.4);*/
    overflow: hidden;
  }

  .gallery-image {
    display: block;
    width: 100%;
    /*height: 100%;*/
    object-fit: cover;
    transition: transform 400ms ease-out;
  }

  .gallery-image:hover {
    transform: scale(1.15);
  }

  /*

  The following rule will only run if your browser supports CSS grid.

  Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling. 

  */

  @supports (display: grid) {
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(24rem, 1fr));
      grid-gap: 2rem;
    }

    .gallery,
    .item {
      margin: 0;
    }
  }

  /*============= Modal ============*/
  body {font-family: Arial, Helvetica, sans-serif;}

  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  /*#myImg:hover {opacity: 0.7;}*/

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 200; /* Sit on top */
    padding: 40px 0; /* Location of the box */
    left: 0;
    top: 0;
    width: 100vw; /* Full width */
    height: 100vh; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (image) */
  .modal-content {
    margin: auto;
    display: block;
    max-width: 29vw;
    max-width: 400px;
  }

  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  /* Add Animation */
  .modal-content, #caption {  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
    position: absolute;
    top: 40px;
    right: 40px;
    color: #f1f1f1;
    color: #ffffff;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    z-index: 100;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
</style>
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Album Photos</h1>
      @if(Auth::check())
        <a href="/create_photo/{{$album_id}}">Add photo to album</a><br><br>
      @endif
    </div>
    @foreach($photos as $photo)
      <div class="col-lg-4 col-md-6 gallery-item">


        <div class="item">
          <img src="/storage/assets/img/album-images/{{$photo->path}}" class="gallery-image" alt="">
          <!-- <img id="myImg" src="/storage/assets/img/album-images/{{$photo->path}}" class="gallery-image" alt="Snow" style="width:100%;max-width:300px;"> -->
        </div>

        @if(Auth::check())
          <div style="margin-top: 8px">
            <a href="/edit_photo/{{$photo->id}}"><i class="bx bxs-edit bx-sm"></i></a>
            <a href="/delete_photo/{{$photo->id}}"><i class='bx bxs-trash-alt bx-sm'></i></a>
          </div>
        @endif
      </div>
    @endforeach
  </div>
</div>
@endsection