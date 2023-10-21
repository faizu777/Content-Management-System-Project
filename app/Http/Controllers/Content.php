<?php

namespace App\Http\Controllers;
use App\Models\contentmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Content extends Controller
{
    function savecontent(Request $request)
    {
        print_r($request->all());
        request()->validate([
            'imagecon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,JPG',
        ]);
      // Get the uploaded file
      $file = $request->file('imagecon');
   
      // Store the file in the storage folder (e.g., storage/app/public)
      $path = $file->store('/public/thumnail');
  
      // You can also generate a public URL for the file
      $url = Storage::url($path);
   
       $thumnailpicname=substr($path,16);
       echo $thumnailpicname;
       $contentsave=new contentmodel;
       $contentsave->title=$request['title'];
        $contentsave->image=$thumnailpicname;
        $contentsave->content=$request['content'];
        $contentsave->username=$request['username'];
        $contentsave->save();
        return back();
      
    }
   //Function for  Remove Session data
public function Removesession(Request $request)
 {
$request->session()->forget('userid');

 }

    
}
