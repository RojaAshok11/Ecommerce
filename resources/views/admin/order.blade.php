<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
    .title_beg{
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding: 40px;
    }
    .table_deg{
        border:2px solid white;
        width: 100%;
        margin: auto;
        padding-top: 50px;
        text-align: center;
    }
    .bg_color{
        background: skyblue;
    }
    .img_size{
        width: 200px;
        height: 200px;
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
                @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
            </div>

                @endif

                <h1 class="title_beg">All Order</h1>

                <div style="padding-left:400px; auto; padding-bottom:30px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input style="color: black;" type="text" name="search" placeholder="Search For Something">

                    <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>
                <table class="table_deg">
                    <tr class="bg_color">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Print PDF</th>
                        <th>Send Email</th>
                    </tr>



                    @forelse($order as $order)

                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>${{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td><img class="img_size"src="{{ asset('product/'.$order->image)}}"></td>
                        <td>
                        @if($order->delivery_status=='processing')
                            <a href="{{url('Delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered !!')"class="btn btn-primary">Delivered</a>

                            @else
                            <p style="color:green">Delivered</p>
                            {{-- <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a> --}}

                            {{-- <a href="{{url('Delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered !!')"class="btn btn-primary">Delivered</a> --}}


                            @endif

                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>

                        <td>
                            {{-- <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a> --}}
                        </td>

                    </tr>

                    @empty
                        <tr>
                            <td colspan="16">No Data Found</td>
                        </tr>




                    @endforelse

                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
