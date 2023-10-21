<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login page</title>
  <link rel="stylesheet" href="{{url('/')}}/css/login.css">

  <script async src="{{url('/')}}/js/login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="main">
      <!--Start of Main Body-->
    <div class="container">
        <!--Start of Navbar-->
      <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Content Management System</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                <a class="nav-link" href=" {{url('/')}}">Home </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>


          </div>
        </nav>
      </div>
    </div>
  <!--End of Navbar-->
    <div class="profile">
        <!--Start of User Profile-->
      @foreach($userdata as $user)
     

<form action="{{url('/')}}/updateprofile/{{$user->id}}" method="POST">
  @csrf
  <center>
    <br>
        <br>
        <img src="{{asset('/storage/upload/'.$user->image)}}" alt="">
        <br>
        UserName:
        <input type="text" value="{{$user->uname}}" name="pnewname">
        <br>
        <br>
        Update Image:
        <input type="file" name="pnewimage">
        <br>
        <br>
        Password:
        <input type="password" name="pnewpass" value="{{$user->upass}}">
        <br>
        <br>
        <input type="Submit" name="" value="Update" id="updatebtn">
      </center>
      @endforeach
    </form>
    </div>
      <!--End of User profile-->
       <!-- User Do not Insert any content-->
    @if (count($content)==0)
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<br>
{! <h2>You Do not Have Content</h2>
  
  
  
  !}
        @else

    @endif
 <!--Start of Content Card-->
    @foreach($content as $item)
    <div class="content">
    
      <div class="cards">
        <a href="{{url('/')}}/Delete/{{$item->id}}"><button value="Delete" name="delete" id="delet"  > Delete</button></a>
        <form action="{{url('/')}}/updatecontent/{{$item->id}}" method="POST">
        <center>
          @csrf
          
          <br>
          Title:
          <input type="text" name="newtitle" value="{{$item->title}}">
          <br>
          <img src="{{asset('/storage/thumnail/'.$item->image)}}" alt="">
          <br>
          NewImage:
          <input type="file" name="newimage">
          <br>
          <br>
          Description:
          <textarea name="newdes" id="des" cols="30" rows="10">
        {{$item->content}}
      </textarea>

          <br>
          <br>
          <input type="submit" value="Update" id="update">
        </center>
      </form>
      </div>

    </div>
    @endforeach
  </div>
   <!--End of Content Card-->
    <!-- Footer -->

  <footer class="bg-dark text-center text-white fixed-bottom" id="footer">
    <!-- Grid container -->
    <div class="container p-2 pb-0">
      <!-- Section: Form -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Sign up for our newsletter</strong>
              </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 col-8">
              <!-- Email input -->
              <div class="form-outline form-white mb-1">
                <input type="email" id="form5Example2" class="form-control" />
                <label class="form-label" for="form5Example2">Email address</label>
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4">
                Subscribe
              </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>
      </section>
      <!-- Section: Form -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-white" href="#">Faizu8803</a>
    </div>
    <!-- Copyright -->
  </footer>


  <!-- End of Footer -->
     <!--End of Main Body-->

</body>

</html>