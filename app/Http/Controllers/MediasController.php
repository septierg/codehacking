<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class MediasController extends Controller
{
    //
    public function index(){

        $photos= Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    public function store(Request $request){

           //return $input=$request->all();

        if($file= $request->file('file')){

            $name= time() .$file->getClientOriginalName();

            $file->move('images', $name);
            $photo = Photo::create(['file' =>$name]);
            $input['file'] = $photo->id;
        }

        return redirect('/admin/media');
    }

    public function destroy($id){
         $photo= Photo::findorFail($id);

        //finding relation with photo, unlink them
        unlink(public_path().$photo->file);
        $photo->delete();
        return redirect('/admin/media');


    }

}
