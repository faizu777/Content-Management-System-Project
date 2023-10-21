<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{url('/')}}/css/Home.css">
  <script src="{{url('/')}}/js/Home.js"></script>
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

  <title>Home</title>


</head>

<body>
  <!--Start of CMS Body-->
  <div class="main">
    <!-- Start of Navbar-->
    <div class="container">
      <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Content Management System</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>
            <div class="button mx-3" id="btn">
              <button id="createbtn" onclick="my()">Create New Content</button>
            </div>
            <form class="form-inline my-2 my-lg-0" action="">
              <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search"
                value="{{$search}}">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
      </div>
    </div>
    <!-- End of Navbar-->
    <!-- Start of  Content Area-->
    <div class="cmsbody">
      <center>

        @foreach ($viewcontent as $item)
        <br>
        <br>
        Title:<Label>{{$item->title}}</Label>
        <br><br>
        <img src="{{asset('/storage/thumnail/'.$item->image)}}" alt="">

        <br>
        <br>
        <Label>{{$item->content}}</Label>
        @endforeach
      </center>
    </div>
    <!-- End of  Content Area-->
    <!-- Start of Profile Card-->
    <div class="profile">
      <center>


        <span> Profile :</span>
        <br>

        <img src="{{asset('/storage/upload/'.$user->image)}}" alt="">
        <br>
        <br>
        User Name:<Label>{{$user->uname}}</Label>
        <br>


        <button id="signoutbtn" onclick="Signout()">Signout</button>
        <br>
        @if ($user->uname=="GuestUser")

        @else
        <a href="{{url('/')}}/Userprofile/{{$user->uname}}"> goto profile</a>
        @endif

      </center>
      <!-- End of Profile Card-->
      <br>
      <!-- Start of Add Content Card-->
      <div class="mcard">

        <form method="POST" enctype="multipart/form-data" action="{{url('/')}}/newcontent">
          @csrf
          <Label id="closebtn" onclick="closeBtn()">Close</Label>
          <center>
            New Content
          </center>
          <br>

          User Name:
          <input type="text" name="username" value="{{$user->uname}}">
          <br>
          <br>
          Enter Title:
          <input type="text" name="title" placeholder="Enter tittle" required>
          <br>
          <br>
          Thumnail image:
          <br>
          <br>
          <input type="file" id="img" name="imagecon" required>
          <br>
          <br>
          Enter Content:
          <input type="text" name="content" id="content" placeholder="Enter Description" required>
          <br>
          <br>
          <input type="submit" id="submitbtn">
        </form>
      </div>
    </div>
    <!-- End of Add Content Card-->
    <!-- Cover-->
    <div class="cover">
      <!-- Start of  Card -->
      <div class="mycard">
        <div class="card-inner">
          <!-- Start of Signup  Card Face-->
          <div class="card-face card-front">
            <Label id="closebtn" onclick="closecover()">Close</Label>
            <form method="POST" action="{{url('/')}}/save" enctype="multipart/form-data">
              @csrf
              <center>
                <label>SignUp</label>
                <br>
                <img src="{{url('/')}}/storage/blank.png" alt="image" id="selectedImage">
                <br>
                <br>
                <span>Profile Image</span>
                <input type="file" name="image" required id="imageInput" required>
                <br>
                <br>
                User Name:
                <input type="text" name="uname" required>
                <br>
                @error('uname')
                <div class="text-danger">
                  <span>Enter UserName </span>
                </div>
                @enderror
                <br>
                <br>
                User password:
                <input type="password" name="password" required id="password2"> <span></span>
                <br>
                @error('password')
                <div class="text-danger">
                  <span>Enter password </span>
                </div>
                @enderror
                <br>
                <input type="submit" id="submit1">
                <br>
                <br>
                <Label onclick="Rotate()">Goto Login</Label>
              </center>
            </form>
            <button id="visiblebtn2" onclick="Visiblepasswordsign()">show</button>
          </div>
          <!-- End of Singup Card Face  -->
          <!-- Start of LOGIN  Card Face-->
          <div class="card-face card-back">
            <Label id="closebtn" onclick="closecover()">Close</Label>
            <form method="POST" action="{{url('/')}}/login" enctype="multipart/form-data">
              @csrf
              <center>
                <label>Login</label>
                <br>
                <br>
                User Name:
                <input type="text" name="uname" value="{{old('uname')}}">
                <br>
                @error('uname')
                <div class="text-danger">
                  <span>User Id and password is wrong</span>
                </div>
                @enderror
                <br>
                <br>
                User password
                <input type="password" name="password" required id="password1"><span></span>
                <br>
                <br>
                <br>
                <input type="submit" id="submit2">
                <br>
                <br>
                <Label onclick="Rotate()">Goto SignUp</Label>
                <br>
              </center>
            </form>
            <button id="visiblebtn1" onclick="Visiblepasswordlogin()">show</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- End of LOGIN Card Face-->

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


  <!--End of CMS Body-->
</body>

</html>