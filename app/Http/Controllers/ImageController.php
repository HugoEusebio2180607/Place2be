<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Photo;

class ImageController extends Controller
{
    public function addImage(){
        return view('dashboards.photos.add_image');
    }

    
    public function storeImage(Request $request){
        $data= new Photo();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('photos.view_image');
       
    }

    public function viewImage(){
        $imageData= Photo::all();
        return view('dashboards.photos.view_image', compact('imageData'));
    }
}
