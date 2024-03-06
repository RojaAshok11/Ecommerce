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
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   </head>
   <body>
    {{-- sweet alert --}}
    @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('home.new_arival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      {{-- Comment and replay system starts here --}}
      <div style="text-align: center; padding-bottom: 40px;">
        <h1 style="font-size:30px; text-align:center; padding-top:20px; padding-bottom:20px;">
            Comments
        </h1>
        <form action="{{url('add_comment')}}" method="POST">
            @csrf
            <textarea style="height: 150px; width:600px;"  placeholder="Comment something here" name="comment"></textarea>
            <br>
            {{-- <a href="" class="btn btn-primary"></a> --}}
            <input type="submit" class="btn btn-primary" value="Comment">
        </form>
      </div>
      <div style="padding-left: 20%;">
        <h1 style="font-size:20px; padding-bottom:20px;">All Comments</h1>


@foreach ($comments as $comment)
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

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <script>
        function reply(caller) {

            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            console.log("Reply button clicked"); // Check if the function is being called
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }
        function reply_close(caller) {

            $('.replyDiv').hide();
        }
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   </body>
</html>
