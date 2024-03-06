<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="pb-2">
                            <label>Product Title</label>
                            <input style="color: black" type="text" class="text-block  p-2" name="title" required="" placeholder="Write product title"
                                required="">

                        </div>
                        <div class="pb-3">
                            <label>Product Description:</label>
                            <input style="color: black" type="text" class="text_color p-2" name="description" required=""
                                placeholder="Write product Description" >
                        </div>
                        <div class="pb-3">
                            <label>Product Price:</label>
                            <input style="color: black" type="text" class="text_color p-2" name="price" required=""
                                placeholder="Write product Price" >
                        </div>
                        <div class="pb-3">
                            <label>Discount Price</label>
                            <input  style="color: black" type="text" class="text_color p-2" name="dis_price" required=""
                                placeholder="Write a Discount is aply" >
                        </div>
                        <div class="pb-3">
                            <label>Product Quantity</label>
                            <input style="color: black" type="text" class="text_color p-2" name="quantity" required=""
                                placeholder="Write product Quantity" >
                        </div>

                        <div class="pb-3 input">
                            <label>Product Catagary:</label>
                            <select style="color: black" class="text_color p-2" name="catagory">
                                <option value="" selected="">Add a catagory here</option>
                                @foreach($catagory as $catagory)
                                <option>{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pb-3">
                            <label>Product Image Here:</label>
                            <input type="file" class=" p-2" name="image"  >
                        </div>
                        <form action="{{url('/add_product')}}" method="POST">

                            @csrf

                        <div class="pb-3 ">

                            <input class="btn btn-success" type="submit" class="p-1">
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
