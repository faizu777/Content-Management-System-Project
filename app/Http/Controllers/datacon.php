<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Userlogin;
use App\Models\contentmodel;
class datacon extends Controller
{
    function Signup(Request $request)
    {
echo"<pre>";
print_r($request->all());

$request->validate([
    'uname'=>'required',
    'password'=>'required'
]);
 request()->validate([
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
     ]);
   // Get the uploaded file
   $file = $request->file('image');

   // Store the file in the storage folder (e.g., storage/app/public)
   $path = $file->store('/public/upload');
echo $path;
   // You can also generate a public URL for the file
   $url = Storage::url($path);

    $picname=substr($path,14);
   $user=new Userlogin;
   $user->image=$picname;
   $user->uname=$request['uname'];
    $user->upass=$request['password'];
   
$user->save();

  return redirect('/'.$user->id);
    }
    function Login(Request $request)
    {
print_r($request->all());
$request->validate([
    'uname'=>'required',
    'password'=>'required'
]);
$username=$request['uname'];
$userpass=$request['password'];
$userid=UserLogin::where('uname','=',$username)->first();
$userpassword=UserLogin::where('upass','=',$userpass)->first();
if (!is_null($userpassword)&&!is_null($userid)) {
    # code...
// Set Session when  first time login 
    if(!$request->session()->has('userid'))
    {
      

        $sesobj=$userid->id;
        $request->session()->put('userid',$sesobj);

    }elseif($request->session()->has('userid'))
   {// Set Session when  Next  time login 
    $request->session()->forget('userid');
    $sesobj=$userid->id;
    $request->session()->put('userid',$sesobj);

   }
    return redirect('/'.$userid->id)->withError('myer','hasgjds');
} else {
   
   
    $request->validate([
        'uname'=>'file',
        'password'=>'required'
    ]);
   
}


    }
    //Function for Guest User on Home Page
public function Guest(Request $request)
{
       // Set Session when session not set 
    if ($request->session()->has('userid')) {

        $sess=session()->get('userid');
       return redirect('/'.$sess);
      
    }
    else{
    $search=$request['search']??"";
    if ($search!="") {
        $viewcontent=contentmodel::where('title','Like',"%$search%")->get();
    }
    else{
        $viewcontent=contentmodel::all();
    }
    $id=34;
$user=Userlogin::find($id);
$errordata="";
$data=compact('user','viewcontent','search','errordata');

return view('Home')->with($data);
}

}
  //Function for All and Selected Data View 
    public function View($id,Request $request)
    {
       
        $search=$request['search']??"";
        if ($search!="") {
                
            $viewcontent=contentmodel::where('title','Like',"%$search%")->get();
        }
        else{
            $viewcontent=contentmodel::all();
        }
       
$user=Userlogin::find($id);
$errordata="";
$data=compact('user','viewcontent','search','errordata');

 return view('Home')->with($data);

    }
  // Demo Function 
    public function profile($id)
    {
        $id=22;
        $user=Userlogin::find($id);
        $viewcontent=contentmodel::all();
        $data=compact('user','viewcontent');
         
        return view('Home')->with($data);

    }
  //Function for Delete 
    public function delete()
{//student find
   $id=1;
 $student=Userlogin::find($id);
if (!is_null($student)) {
    // student exist then delete student
    $student=Userlogin::find($id)->delete();
  
}
}


}