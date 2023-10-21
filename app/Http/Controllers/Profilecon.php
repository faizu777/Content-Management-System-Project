<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userlogin;
use App\Models\contentmodel;
class Profilecon extends Controller
{
     //Function for User Detail Data View 
   function Userview($user)
   {

$userdata=Userlogin::where('uname',$user)->get();
$content=contentmodel::where('username','Like',$user)->get();
$data=compact('userdata','content');

return view('Userprofilepage')->with($data);
   }

   function UpdateContent( $id ,Request $request)
   {
      $contentsave= contentmodel::find($id);

if($request['newimage']!="")
{
   request()->validate([
      'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg,JPG',
  ]);
// Get the uploaded file
$file = $request->file('newimage');

// Store the file in the storage folder (e.g., storage/app/public)
$path = $file->store('/public/thumnail');

// You can also generate a public URL for the file
$url = Storage::url($path);

 $thumnailpicname=substr($path,16);
 $contentsave->title=$request['newtitle'];
  $contentsave->image=$thumnailpicname;
  $contentsave->content=$request['newdes'];

  $contentsave->save();


}
else{
 
 $contentsave->title=$request['newtitle'];
 
  $contentsave->content=$request['newdes'];
  
  $contentsave->save();
}
return back();
   }
     //Function for  User Data Update 
function UpdateUser($id ,Request $request)
{
   print_r($request->all());
   $user=Userlogin::find($id);
   $search=$request['pnewname'];
   $content4=contentmodel::where('username',$search)->get();
   foreach($content4 as $con)
   {
  $con->username=$request['pnewname'];
  $con->save();
  
}
  
  
   if($request['pnewimage']!="")
   {
   request()->validate([
      'pnewimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
  ]);
// Get the uploaded file
$file = $request->file('pnewimage');

// Store the file in the storage folder (e.g., storage/app/public)
$path = $file->store('/public/upload');
echo $path;
// You can also generate a public URL for the file
$url = Storage::url($path);

 $picname=substr($path,14);

$user->image=$picname;
$user->uname=$request['pnewname'];
 $user->upass=$request['pnewpass'];

 $user->save();
}
else{
   $user->uname=$request['pnewname'];
   $user->upass=$request['pnewpass'];
   $user->save();
}
return redirect('Userprofile/'.$request['pnewname']);

}
   //Function for Delete User Data 
function DeleteContent($id)
{
   $content=contentmodel::find($id);
   if(!is_null($content))
   {
      $content=contentmodel::find($id)->delete();
   }
else{

}
return back();

}

}
