<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')

    <style type="text/css">

    lable{
        display: inline-block;
        width: 200px;
        font-size: 15px;
        font-weight: bold;
    }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                <h1 style="text-align: center; font-size:25px;">Send Email to {{$order->email}}</h1>

            <form action="{{url('send_user_eamil',$order->id)}}" method="POST">

                @csrf

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Email Greeting</lable>
                <input style="color: black" type="text" name="greeting">
            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Email FirstLine</lable>
                <input style="color: black" type="text" name="firstline" value="">
            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Email Body</lable>
                <input style="color: black" type="text" name="body">
            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Email Button name</lable>
                <input style="color: black" type="text" name="button">
            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Email Url</lable>
                <input style="color: black" type="text" name="url">
            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Email Last Line</lable>
                <input style="color: black" type="text" name="lastline">
            </div>

            <div style="padding-left: 35%; padding-top:30px;">


                <input  type="submit" value="Send Email" class="btn btn-primary">
            </div>
            <form>


            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
