@extends('layouts.app')

@section('content')

    <div class="row">
          <div class="col-lg-8">
            <form action="/create_photo" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-6 form-group">
                <input type="text" name="title" placeholder="Photo title"/>
              </div>
              <div class="col-md-6 form-group">
                <input type="file" name="path" />
              </div>
              <div class="col-md-6 form-group">
                <input type="text" name="description" placeholder="Photo description"/>
              </div>

              <div class="col-md-6 form-group">
                <input type="hidden" name="album_id" value="{{$album_id}}" />
              </div>

              <div class="col-md-12 form-group">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
      </div>
@endsection