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

            <form action="{{url('email_info',$order->id)}}" method="POST">

                @csrf

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Name:</lable>
                <td> <input type="text" id="name" name="name"></td>


            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Email:</lable>
                <td>{{$order->email}}</td>

            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Address:</lable>
                <td>{{$order->address}}</td>

            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Phone:</lable>
                <td>{{$order->phone}}</td>

            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Product Title:</lable>
                <td>{{$order->product_title}}</td>

            </div>

            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Quantity:</lable>
                <td>{{$order->quantity}}</td>

            </div>
            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Price:</lable>
                <td>${{$order->price}}</td>

            </div>
            <div style="padding-left: 35%; padding-top:30px;">
                <lable>Payment Status:</lable>
                <td>{{$order->payment_status}}</td>

            </div>


            <div style="padding-left: 35%; padding-top:30px;">


                <input  type="submit" value="confirm" class="btn btn-primary">
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
