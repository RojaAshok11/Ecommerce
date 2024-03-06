<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/bublic">
    @include('admin.css')
    <style type="text/css">
        .div-center {
            text-align: center;
            padding-top: 20px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
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
                <div class="div-center">
                    <h1 class="font_size">Add Product</h1>
                    <form   action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                        {{-- @csrf --}}

                        <div class="pb-2">
                            <label>Product Title</label>
                            <input type="text" style="color: black"  class="text-black p-2" name="title" placeholder="Write product title"
                                required="" value="{{$product->title}}">

                        </div>
                        <div class="pb-3">
                            <label>Product Description:</label>
                            <input type="text" style="color: black" class="text_color p-2" name="description"
                                placeholder="Write product Description"  required="" value="{{$product->description}}" >
                        </div>
                        <div class="pb-3">
                            <label>Product Price:</label>
                            <input type="text" style="color: black" class="text_color p-2" name="price"
                                placeholder="Write product Price"  required="" value="{{$product->price}}" >
                        </div>
                        <div class="pb-3">
                            <label>Discount Price</label>
                            <input type="text" style="color: black" class="text_color p-2" name="dis_price"
                                placeholder="Write a Discount is aply"  required="" value="{{$product->discount_price}}">
                        </div>
                        <div class="pb-3">
                            <label>Product Quantity</label>
                            <input type="text "style="color: black"class="text_color p-2" name="quantity"
                                placeholder="Write product Quantity"  required="" value="{{$product->quantity}}" >
                        </div>

                        <div class="pb-3">
                            <label>Product Catagary:</label>
                            <select class="text_color p-2"style="color: black" name="catagory" required="">
                                <option value="{{$product->catagory}}" selected="">{{ $product->catagory}}</option>

                                @foreach($catagory as $catagory)
                                <option>{{$catagory->catagory_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="pb-3">
                            <label>Current Product Image:</label>
                            <img  height="100" width="100" src="/product/{{$product->image}}">
                        </div>
                        <div class="pb-3">
                            <label>Change Product Image:</label>
                            <input type="file" class=" p-2" name="image"  >
                        </div>
                        <form action="{{url('/add_product')}}" method="POST">

                            @csrf

                        <div class="pb-3">

                            <input type="submit" value="Update Product" class="btn btn-primary p-1">
                        </div>
                    </form>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')



    <!-- End custom js for this page -->
</body>

</html>

