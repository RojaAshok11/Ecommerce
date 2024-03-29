<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .center{
        margin: auto;
        width:50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid rgb(49, 47, 47);
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
            <div class="div_center">
                <h2 class="h2_font">Add Catagory</h2>

                <form action="{{url('/add_catagory')}}" method="POST">

                    @csrf

                    <input style="color: black" type="text" class="p-3" name="catagory" placeholder="Write catagory name">
                    <input type="submit" class="btn btn-primary p-2" name="submit" value="Add Catagory">
                </form>


            </div>
            <table class="center">
                <tr>
                    <td>Catagory Name</td>
                    <td>Action</td>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->catagory_name}}</td>
                    <td>
                        <a onclick="return confirm('Are You Sure To Delete This')"class="btn btn-danger m-2" href="{{url('delete_catagory',$data->id)}}">Delete</td>
                </tr>
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

