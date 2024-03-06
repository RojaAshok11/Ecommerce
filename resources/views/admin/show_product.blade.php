<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center{
            margin: auto;
            width: 80%;
            border:2px solid white;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size{
            width: 100px;
            height: 100px;;
        }
        .th_color{
        background: skyblue;
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

                <h2 class="font_size">All Products</h2>

                <table class="center p-3">
                    <tr class="th_color p-3">
                    <th class="p-3">Product title</th>
                    <th class="p-3">Description</th>
                    <th class="p-3">Quantity</th>
                    <th class="p-3">Catagory</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Discount Price</th>
                    <th class="p-3">Product Image</th>
                    <th class="p-3">Delete</th>
                    <th class="p-3">Edit</th>
                    <tr>
                        @foreach($product as $product)
                        <tr>
                            <td class="p-3">{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->catagory}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>
                                <img class="img_size mt-3 mb-3" src="/product/{{$product->image}}">
                            </td>
                            <td>
                                <a class="btn btn-danger m-2" onclick="return confirm('Are you sure to delete this')"
                                href="{{url('delete_product',$product->id)}}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-success p-2" href="{{url('update_product',$product->id)}}">Edit</a>
                            </td>

                            <tr>
                                @endforeach

                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
