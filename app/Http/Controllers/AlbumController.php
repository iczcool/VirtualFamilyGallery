<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
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
    public function create()
    {
        return view('createalbum');
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
        'title' => 'required', 'description' => 'required', 'cover' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->hasFile('cover')) {
              //get filename with the extention
              $filenameWithExt = $request->file('cover')->getClientOriginalName();
              //get just file
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              //get just ext
              $extension = $request->file('cover')->getClientOriginalExtension();
              //file to store
              $filenameToStore = $filename.'_'.time().'.'.$extension;
              //upload image
              $path = $request->file('cover')->storeAs('public/assets/img/images', $filenameToStore);                  
        }else{
              $filenameToStore = 'noimage.jpg';
        }

        $album = new Album;   
        $album->title = $request->input('title');
        $album->description = $request->input('description');
        $album->cover = $filenameToStore;
        $album->save();
        return redirect('/albums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        $albums = Album::all(); 
        return view('albums', compact('albums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);  
        return view('edit_album', compact('album'));
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
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

            //create album
            $album = Album::find($id);
            //get album cover path from storage
            $imagePath = "app/public/assets/img/images/".$album->cover;
            //delete the album cover from storage
            unlink(storage_path($imagePath));

            //get filename with the extention
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            //get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover')->getClientOriginalExtension();
            //file to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover')->storeAs('public/assets/img/images', $filenameToStore);                  
            

            $album->title = $request->input('title');
            $album->description = $request->input('description');
            $album->cover = $filenameToStore;
            $album->save();
            return redirect('/albums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $path = "app/public/assets/img/images/".$album->cover;
        unlink(storage_path($path));
        $album->delete();
        return redirect('/albums'); 
    }


    //open an album
    public function open_album($id){
        $album = Album::with('photos')->where('id', '=', $id)->firstOrFail();
        return view ('albums.open_album', ['photos' => $album->photos, 'album_id' => $id]);

        // $this->id = $id;
        // return view('albums.open_album', compact('id'));
    }
}
