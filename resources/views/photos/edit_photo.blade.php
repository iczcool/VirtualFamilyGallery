@extends('layouts.app')

@section('content')

    <div class="row">
          <div class="col-lg-8">
            <form action="/edit_photo', $photo->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-6 form-group">
                <input type="text" name="title" value="{{$photo->title}}" />
              </div>
              <div class="col-md-6 form-group">
                <input type="file" name="path" value="{{$photo->path}}" />
              </div>

              <div class="form-group">
                <textarea class="form-control" name="description" value="{{$photo->description}}" rows="5"></textarea>
              </div>

              <div class="col-md-6 form-group">
                <input type="hidden" name="album_id" value="{{$photo->album_id}}" />
              </div>

              <div class="col-md-12 form-group">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
      </div>
@endsection