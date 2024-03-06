<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->



      <div class="col-sm-6 col-md-4 col-lg-4 " style="margin-left: 20%; width:50%; padding:30px">
        <div class="box">

           <div class="img-box" style="padding: 20px">
              <img src="product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5>
                {{$product->title}}
              </h5>

              @if($product->discount_price!=null)
              <h6 style="color:blue">
               Discount Price<br>
               ${{$product->discount_price}}
              </h6>
              <h6 style="text-decoration:line-through; color:red">
               Price<br>
               ${{$product->discount_price}}
              </h6>
              @else

              <h6 style="color:blue">
              Price<br>
               ${{$product->price}}
              </h6>
              @endif
              <h6>Product Catagory:{{$product->catagory}}
                </h6>
                <h6>Product Details:{{$product->description}}</h6>
                <h6>Available Quantity:{{$product->quantity}}</h6>
                <form action="{{url('add_cart',$product->id)}}" method="Post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4"><input type="number" name="quantity" value="1" min="1" style="width:100px"></div>
                        <div class="col-md-4"><input type="submit" value="Add To Cart"></div>


                    </div>
                  </form>

           </div>
           <div>
            <div style="text-align: center; padding-bottom: 40px;">
                <h1 style="font-size:30px; text-align:center; padding-top:20px; padding-bottom:20px;">
                   Reviews
                </h1>
                <form action="{{url('add_comment')}}" method="POST">
                    @csrf
                    <textarea style="height: 150px; width:600px;"  placeholder="Comment something here" name="comment"></textarea>
                    <br>
                    {{-- <a href="" class="btn btn-primary"></a> --}}
                    <input type="submit" class="btn btn-primary" value="Add Review">
                </form>
              </div>
              <div style="padding-left: 20%;">
                <h1 style="font-size:20px; padding-bottom:20px;">All Reviews</h1>


        @foreach ($comments->reverse() as $comment)
            <div class="pb-3">
                <b>{{ $comment->name }}</b> <!-- Assuming 'name' is a field in your Comment model -->
                <p>{{ $comment->comment }}</p> <!-- Assuming 'comment' is a field in your Comment model -->

                <a style="color: blue" href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
                <br>

                @foreach($reply as $rep)

                @if($rep->comment_id==$comment->id)

                <div class="ps-3 pb-3">
                    <b>{{$rep->name}}</b>
                    <p>{{$rep->reply}}</p>
                    <a style="color: blue" href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
                </div>
                @endif
                @endforeach
            </div>
        @endforeach

        <div style="display:none;" class="replyDiv">
            <form action="{{url('add_reply')}}" method="POST">
                @csrf
            <input type="text" id="commentId" name="commentId" hidden="">
            <textarea style="height: 100px; width:500px;" name="reply" placeholder="write something here"></textarea>
            <br>

            <button type="submit" class="btn btn-primary text-black">Replay</button>

            {{-- <a href="" class="btn btn-primary">Reply</a> --}}
            <a href="javascript::void(0);" class="btn btn-danger" onclick="reply_close(this)">Close</a>
            </form>

        </div>


        </div>


           </div>
        </div>
     </div>


      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
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
