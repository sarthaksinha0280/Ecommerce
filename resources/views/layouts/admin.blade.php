
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>admin page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" >

<script src="{{asset('js/jquery.min.js')}}"></script>

<link rel="stylesheet" href="{{asset('css/dashboard.css')}}" >

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>


  <body style="background-color: #f2f2f7">
  
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{route('allproducts')}}">Ecommerce</a>  
  
  <ul class="navbar-nav px-1">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#"> Home</a>
    </li>
  </ul>

  <ul class="navbar-nav px-1">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{route('adminDisplayProducts')}}">Dashboard</a>
    </li>
  </ul>

  <ul class="navbar-nav px-1">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Setting</a>
    </li>
  </ul>

  <ul class="navbar-nav px-1">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Profile</a>
    </li>
  </ul>

  <ul class="navbar-nav px-1">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Help</a>
    </li>
  </ul>

</nav>

<div class="container-fluid">
  <div class="row">

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        
        <ul class="nav flex-column mb-2">
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Overview
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('adminCreateProductForm')}}">
              <span data-feather="file-text"></span>
              Insert
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Edit
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Users
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Analytics
            </a>
          </li>

        
        </ul>
      
      </div>
    </nav>




    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">AdminPanel</h1>
      </div>
       
       <div>
        @yield('body') 
       </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>  
    </main>
  </div>



</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script></body>

</html>
