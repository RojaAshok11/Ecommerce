<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
      integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <style type="text/css">
    .center{
        margin: auto;
        width: 50%;
        text-align: center;
        padding: 30px;
    }
    table,th,td{

        border: 1px solid black;
    }
    .th_deg{
        font-size: 20px;
        padding: 5px;
        background: skyblue;
    }
    .img_deg{
        height: 200px;
        width: 200px;
    }
    .total_deg{
        font-size: 20px;
        padding: 40px;
    }
    .head_deg{
        font-size: 25px;
        padding-bottom: 15px;
    }
    </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         @if(session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
             {{session()->get('message')}}
         </div>

             @endif
         <form action="{{ route('confirm') }}" method="post">
            @csrf


        <div style="padding-left: 35%; padding-right:35%; ">
            <lable>Name:</lable>
            <td> <input type="text" id="name" name="name" required></td>


        </div>

        <div style="padding-left: 35%; padding-right:35%; ">
            <lable>Email:</lable>
            <td> <input type="email" id="email" name="email" required></td>

        </div>
        <div style="padding-left: 35%; padding-right:35%;">
            <lable>Phone:</lable>
            <td><input type="tel" id="phone" name="phone" required></td>

        </div>

        <div style="padding-left: 35%; padding-right:35%; ">
            <lable>Address:</lable>
            <td> <textarea id="address" name="address" rows="1" cols="30" required></textarea></td>

        </div>

        <div style="padding-left: 35%; padding-right:35%; ">
            <lable>Quantity:</lable>
            <td><input type="number" id="quantity" name="quantity" min="1" value="1" required></td>

        </div>


        <div style="padding-left: 35%; padding-right:35%; ">

            {{-- <a href="{{url('cash_order')}}" class="btn btn-success">Confirm</a> --}}
            <input  type="submit" value="confirm" class="btn btn-primary">
        </div>
        <form>
            
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
