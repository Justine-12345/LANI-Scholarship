@extends('layouts.base')
@section('body')

@include('layouts.navAdmin') 

@include('designs.homecss')


<body>

{{-- 
{{ dd($get_data) }} --}}
@if($get_data['adminInfo']['adminStatus'] == "new")
<div style="text-align: center;">
  <br>
<h2>Thank you for registering on the system, please wait for the admin confirmation.</h2>
<br>
<h4>Registration Application</h4>
<br>
<p>First Name : <b>{{  $get_data['adminInfo']['adminFirstName'] }}</b></p>
<p>Last Name : <b>{{  $get_data['adminInfo']['adminLastName'] }}</b></p>
<p>Middle Name : <b>{{  $get_data['adminInfo']['adminMiddleName'] }}</b></p>
<p>Email : <b>{{  $get_data['adminInfo']['adminEmail'] }}</b></p>
<p>Address : <b>{{  $get_data['adminInfo']['adminAddressline'] }}</b></p>
<p>Birthdate : <b>{{  $get_data['adminInfo']['adminBirthDate'] }}</b></p>
</div>
@elseif($get_data['adminInfo']['adminStatus'] == "banned")
<div style="text-align: center;">
  <br>
<h2>The main admin banned you in admin list, please conctect the main admin for more detail.</h2>
<br>
</div>
@else


    @if(Session::get('new'))
 <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0px; padding: 30px; font-size: 30px">
  <strong>Welcome {{ $get_data['adminInfo']['username'] }}</strong> | {{Session::get('new')}} !!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 
@endif
    <section id="carousel">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-nature carousel-hero" style="background: url(&quot;{{asset('homeAssets/img/pic3.jpg')}}&quot;) round, url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);background-size: cover, auto; height: 510px;">
                        <h1 class="hero-title" style="background: rgba(199,20,14,0.77);font-size: 30px;font-family: ABeeZee, sans-serif;border: 5px solid #ffffff ;"><br><strong>LIFELINE ASSISTANCE FOR NEIGHBORS’ IN-NEED (L.A.N.I.) SCHOLARSHIP APPLICATION FORM</strong><br><br></h1>
                        <p class="hero-subtitle" style="font-size: 18px;font-family: ABeeZee, sans-serif;text-shadow: 0px 0px #103170;background: rgba(199,20,14,0.77);border: 5.4px solid rgb(255,255,255);"><strong>Investing in education, investing in the City's Foundation!</strong></p>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-photography carousel-hero" style="background: url(&quot;{{asset('homeAssets/img/tagg.png')}}&quot;) center / cover no-repeat;height: 510px;">
                        <h1 class="hero-title" style="background: rgba(199,20,14,0.77);font-size: 30px;font-family: ABeeZee, sans-serif;border: 5px solid #ffffff ;"><br><strong>LIFELINE ASSISTANCE FOR NEIGHBORS’ IN-NEED (L.A.N.I.) SCHOLARSHIP APPLICATION FORM</strong><br><br></h1>
                        <p class="hero-subtitle" style="font-size: 18px;font-family: ABeeZee, sans-serif;text-shadow: 0px 0px #103170;background: rgba(171,32,32,0.73);border-radius: 0px;border: 5px solid rgb(255,255,255);border-top-width: 4px;border-top-color: rgb(6,0,0);border-right-width: 4px;border-right-color: rgb(0,0,0);border-bottom-width: 4px;border-left-width: 4px;"><strong>"Think Big, Dream Big, I Love Taguig"</strong></p>
                    </div>
                </div>
                <div class="carousel-item active" style="background: url(&quot;{{asset('homeAssets/img/tag.png')}}&quot;) round;background-size: cover;">
                    <div class="jumbotron pulse animated hero-technology carousel-hero" style="background: url(&quot;{{asset('homeAssets/img/pic1.jpg')}}&quot;) round, url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);background-size: cover, auto;height: 510px;">
                        <h1 class="hero-title" style="background: #c7140e;font-size: 30px;opacity: 0.77;filter: brightness(116%) contrast(103%);font-family: ABeeZee, sans-serif;color: rgb(255,255,255);border: 5px solid #ffffff;"><br><strong>LIFELINE ASSISTANCE FOR NEIGHBORS’ IN-NEED (L.A.N.I.) SCHOLARSHIP APPLICATION FORM</strong><br><br></h1>
                        <p class="hero-subtitle" style="font-family: ABeeZee, sans-serif;font-size: 18px;background: #c7140e;opacity: 0.79;border: 5px solid #ffffff ;"><strong>"Lahat ng Taguigeño ay VIP at walang maiiwanan. Lahat ,ay oportunidad." - Mayor Ma. Laarni Cayetano</strong></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-arrow-left" style="color: #ffffff;background: rgba(16,49,112,0);border-radius: 2px;"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next" style="box-shadow: 0px -1px #103170;"><i class="fa fa-arrow-right" style="border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;background: rgba(16,49,112,0);"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators" style="color: rgb(0,0,0);background: rgba(199,20,14,0);">
                <li data-target="#carousel-1" data-slide-to="0"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
            </ol>
        </div>
    </section>
    <section id="about" style="background: #ffffff;"></section>
    <section id="about-1" style="background: #ffffff;"></section>
  
@if(Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ Session::get('success') }}<i class="fas fa-check-circle"></i></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


    <div class="container">
       <form style="margin: 20px;" action="{{ route('announcement.store') }}" method="post" >
    @csrf
  <div class="form-group"><div class="card text-white bg-secondary">
  <div class="card-header"  >
    Write your announcements here
  <button type="submit" class="float-right btn btn-danger" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"> <i class="fas fa-feather"></i> Publish</button>
  </div>
  <div class="card-body">
      <div class=" card-text form-group">
          <textarea placeholder="Message" name="announcementContent" rows="4"
                    class="form-control form-control-lg">
          </textarea>
      </div>
      <input type="hidden" name="announcementDate" value="{{ date('Y-m-d') }}">
      <input type="hidden" name="adminId" value="{{ $admin[0]['adminId'] }}
" >
</div>
</div>
</div>
</form>

        <div class="intro">
            <h2 class="text-center" style="margin: 10px 0px 8px;margin-top: 10px;font-family: ABeeZee, sans-serif;text-align: justify;color: rgb(199,20,14);"><strong>Admin Announcements</strong></h2>
        </div>
        <div class="row articles">
          @php
          $i = 0;  
          @endphp
        @foreach($announcements as $announcement)
        @php
          $i++;
          if ($i > 3){
            break;
          }
        
        @endphp
            <div class="col-sm-6 col-md-4 item">
                <div class="zoomin frame" style="width:100%;height:236px;"><img data-bss-hover-animate="bounce" style="width:100%;height:236px;" src=" {{asset('homeAssets/img/aa.png')}} "></div>
                <h3 class="name" style="font-size: 25px;"><em>Announcement No.
                  @php
                    $dateA = date_create($announcement->announcementDate);
                    $dateAF = date_format($dateA,"M/d/Y");
                  @endphp
                 {{ $dateAF }}</em> 
                 <form action="{{ route('announcement.destroy',$announcement->announcementId) }}" method="post">
                  @csrf
                  @method('DELETE')
                 <button type="submit" style="float: right; border: none; background-color: inherit;">
                 <i class="fas fa-trash-alt" style="float: right; color: gray; font-size: 16px"></i>
                 </button>
                 </form>
               </h3>
                <p class="description" style="text-align: justify;"><em>{{ $announcement->announcementContent }}</em>

                </p>
            </div>
          @endforeach
          @if(count($announcements) > 3)
           <div class="col-sm-6 col-md-4 item">
                <a href="{{ route('announcement.index') }}"  class="badge badge-danger">See more announcements</a>
            </div>
          @endif
        </div>
    </div>
    <section id="about" style="background: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center" style="font-family: ABeeZee, sans-serif;color: rgb(199,20,14);"><strong>Admins &amp; Scholars Forum</strong></h2>
 
  <form style="margin: 20px;" action="{{ route('post.store') }}" method="post" >
    @csrf
  <div class="form-group"><div class="card text-white bg-secondary">
  <div class="card-header"  >
      Do you want to ask Questions?
  <button type="submit" class="float-right btn btn-danger" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"> <i class="fas fa-edit"></i> Post</button>
  </div>
  <div class="card-body">
      <div class=" card-text form-group">
          <textarea placeholder="Message" name="postContent" rows="4"
                    class="form-control form-control-lg">
          </textarea>
      </div>

      <input type="hidden" name="postTitle" value="{{ $admin[0]['userTitle'] }}">
      <input type="hidden" name="postDate" value="{{ date('Y-m-d') }}">
      <input type="hidden" name="adminId" value="{{ $admin[0]['adminId'] }}
" >
</div>
</div>
</div>
</form> 
<h2 class="text-center" data-aos="fade-up" data-aos-duration="500" style="margin: 10px 0px 8px;margin-top: 10px;font-family: ABeeZee, sans-serif;text-align: justify;color: rgb(199,20,14);"><strong></strong></h2>

@php
$i = 0;  
@endphp

@foreach($posts as $post)

@php
$i++;  
$accId = "accId".$i;
$accId2 = "#accId".$i;
date_default_timezone_set("Asia/Manila");
@endphp

    <div style="padding-top: 11px;padding-left: 0px;background: #c7140e;width: 1116px;margin: auto;border-radius: 8px;padding-bottom: 11px; width: 100%"><div class="container" style = "background-color : #c7140e ;">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                  
<img class="img-fluid d-block rounded-circle mx-auto" src="
 @if($post->postTitle == "scholar")

    @if($post->scholarProfilePic!="")
    {{URL::to('/')}}/images/scholarProfilePic/{{$post->scholarProfilePic}}
    @else
     https://static.pingendo.com/img-placeholder-3.svg
    @endif
@else
   {{URL::to('/')}}/images/ilovetaguig.png
@endif" style="width: 200px; height: 150px; object-fit: cover;">


                    <p class="text-secondary text-center" style="font-size: 12px">
                      @php
                        $date=date_create($post->postDate);
                      @endphp
                      {{date_format($date,"M/d/Y") }}</p>


                </div>
                <div class="col-md-10">
                    <p>
                        <strong>
                            @if($post->scholarUsername != "")
                            {{ $post->scholarUsername }} ({{ $post->scholarTitle}})
                            @else
                            {{ $post->adminUsername }} ({{ $post->adminTitle}})
                            @endif
                        </strong>

                            
                            <form action="{{ route('post.destroy',$post->postId) }}" method="post">
                            {!! method_field('DELETE') !!}
                            @csrf
                            
                          </form>
                   </p>
                   <div class="clearfix"></div>
                    <p>{{ $post->postContent }}</p>
                    <p>
                   </p>
                </div>
            </div>

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="{{ $accId2 }}"
         aria-expanded="true" aria-controls="collapseOne" >
@php
     $c = 0;
  @endphp
@foreach($comments as $comment)
 @if($comment->postId == $post->postId)
 @php
  $c++;  
 @endphp     
@endif
@endforeach
   Comments | {{ $c }}
           <i class="fas fa-chevron-down" style="float: right;"></i></button>
      </h2>
    </div>

    <div id="{{ $accId }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      
{{-- Comments   --}} 

@foreach($comments as $comment)
 
 @if($comment->postId == $post->postId)
                        <div class="card card-inner">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">

                                  {{--         <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" /> --}}


<img class="img-fluid d-block rounded-circle mx-auto" src="
@if($comment->scholarTitle == "scholar")

      @if($comment->scholarProfilePic != "")
      {{URL::to('/')}}/images/scholarProfilePic/{{$comment->scholarProfilePic}}
      @else
      https://static.pingendo.com/img-placeholder-3.svg
      @endif
@else
{{URL::to('/')}}/images/ilovetaguig.png
@endif" style="width: 100px; height: 100px; object-fit: cover;">





                                            
                    <p class="text-secondary text-center" style="font-size: 12px">
                      @php
                        $date=date_create($comment->commentDate);
                      @endphp
                      {{date_format($date,"M/d/Y") }}</p>

                                        </div>
                                        <div class="col-md-10">
                                            <p><strong>
                                        @if(!empty($comment->adminUsername))
                                        {{ $comment->adminUsername }} ({{ $comment->adminTitle }})
                                        @else
                                         {{ $comment->scholarUsername }}  ({{ $comment->scholarTitle }})
                                        @endif
                                            </strong></p>
                                            <p>{{ $comment->commentContent }}</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endif
@endforeach
{{-- end Comments --}}  
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
</div>
<form action="{{ route('comment.store') }}" method="post" style="margin: 20px;">
   @csrf
  <div class="d-inline" style="width: 937px;">
        <div class="card text-white bg-comments mb-1" style = "background-color : #c7140e ; border: none;">

    
            <div class="card-header">
                    {{ $admin[0]['username'] }}
                    <button type="submit" class="float-right btn btn-secondary " onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"><i class="fa fa-comment"></i>
                        Comment
                    </button>
            </div>
            <div class="card-body">
                <div class=" card-text form-group"><textarea placeholder="Message" name="commentContent" rows="4" class="form-control form-control-lg"></textarea></div>
            </div>


      <input type="hidden" name="postId" value="{{ $post->postId }}">
      <input type="hidden" name="commentDate" value="{{ date('Y-m-d') }}">
      <input type="hidden" name="adminId" value="{{ $admin[0]['adminId'] }}">

        </div>
    </div>
</form>

</div>
<div style="height: 30px"></div>

@endforeach
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Accordion-with-custom-design.js"></script>
</body>
@endif

    @stop