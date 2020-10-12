<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        $this->album_id = $album_id;
        return view('photos.create_photo', compact('album_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required', 'description' => 'required', 'path' => 'required|image|mimes:jpeg,png,jpg,gif'
            ]);

            //if ($request->hasFile('path')) {
                  //get filename with the extention
                  $filenameWithExt = $request->file('path')->getClientOriginalName();
                  //get just file
                  $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                  //get just ext
                  $extension = $request->file('path')->getClientOriginalExtension();
                  //file to store
                  $filenameToStore = $filename.'_'.time().'.'.$extension;
                  //upload image
                  $path = $request->file('path')->storeAs('public/assets/img/album-images', $filenameToStore);                  
            // }else{
            //       $filenameToStore = 'noimage.jpg';
            // }

            $photo = new Photo; 
            $album_id = $request->input('album_id');

            $photo->title = $request->input('title');
            $photo->description = $request->input('description');
            $photo->album_id = $request->input('album_id');
            $photo->path = $filenameToStore;
            $photo->save();
            return redirect('/albums/open_album/'.$album_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show_photo', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);  
        return view('photos.edit_photo', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required', 
            'description' => 'required', 
            'path' => 'required|image|mimes:jpeg,png,jpg,gif',
            'album_id' => 'required'
        ]);

            //create photo
            $photo = Photo::find($id);
            $imagePath = "app/public/assets/img/album-images/".$photo->path;
            unlink(storage_path($imagePath));

            //if ($request->hasFile('path')) {
                  //get filename with the extention
                  $filenameWithExt = $request->file('path')->getClientOriginalName();
                  //get just file
                  $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                  //get just ext
                  $extension = $request->file('path')->getClientOriginalExtension();
                  //file to store
                  $filenameToStore = $filename.'_'.time().'.'.$extension;
                  //upload image
                  $path = $request->file('path')->storeAs('public/assets/img/album-images', $filenameToStore);                  
            // }else{
            //       $filenameToStore = 'noimage.jpg';
            // }

            
            $album_id = $request->input('album_id');
            $photo->title = $request->input('title');
            $photo->description = $request->input('description');
            $photo->path = $filenameToStore;
            $photo->album_id = $album_id;
            $photo->save();
            return redirect('/albums/open_album/'.$album_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $album_id = $photo->album_id;
        $path = "app/public/assets/img/album-images/".$photo->path;
        unlink(storage_path($path));
        $photo->delete();
        return redirect('/albums/open_album/'.$album_id);
    }
}
