@extends('layouts.base')

@include('designs.postcss')

 @include('layouts.nav') 

@section('body')

<body> 
<br>
@if($message=Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%; margin: auto;">
  <strong>{{ $message }}!!! <i class="far fa-check-circle"></i></strong>  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</div>
@endif

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

      <input type="hidden" name="postTitle" value="{{ $scholar[0]['userTitle'] }}">
      <input type="hidden" name="postDate" value="{{ date('Y-m-d') }}">
      <input type="hidden" name="scholarId" value="{{ $scholar[0]['scholarId'] }}
" >
</div>
</div>
</div>
</form> 
{{-- {{ dd($scholar) }} --}}



<h2 class="text-center" data-aos="fade-up" data-aos-duration="500" style="margin: 10px 0px 8px;margin-top: 10px;font-family: ABeeZee, sans-serif;text-align: justify;color: rgb(199,20,14); "><strong>My Post</strong></h2>
{{-- {{ dd($posts) }} --}}
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

    <div style="padding-top: 11px;padding-left: 0px;background: #c7140e;width: 1116px;margin: auto;border-radius: 8px;padding-bottom: 11px; width: 80%"><div class="container" style = "background-color : #c7140e ;">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                  
<img class="img-fluid d-block rounded-circle mx-auto" src="
 @if($post->userTitle == "scholar")

@if($post->scholarProfilePic != "")
{{URL::to('/')}}/images/scholarProfilePic/{{$post->scholarProfilePic}}
@else
    https://static.pingendo.com/img-placeholder-3.svg
@endif

@elseif($post->userTitle == "admin")
{{URL::to('/')}}/images/ilovetaguig.png
@else
    https://static.pingendo.com/img-placeholder-3.svg
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
                            @if($post->userTitle == "scholar")
                            {{ $post->username }} (scholar)
                            @else
                            {{ $post->username }} (admin)
                            @endif
                        </strong>

                            
                            <form action="{{ route('post.destroy',$post->postId) }}" method="post">
                            {!! method_field('DELETE') !!}
                            @csrf
                             <span class= "float-right">

                            <button type="submit" style="border: none; background-color: inherit;"><i class="far fa-trash-alt" style = "font-size : 30px; color: gray"></i></button>

                             </span>
                          </form>
                   </p>
                   <div class="clearfix"></div>
                    <p>{{ $post->postContent }}</p>
                    <p>
                   </p>
                </div>
            </div>
{{-- Comments   --}} 
{{-- {{ dd($comments) }} --}}
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

@foreach($comments as $comment)
 
 @if($comment->postId == $post->postId)
                        <div class="card card-inner">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">

                                  {{--         <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" /> --}}

                 
<img class="img-fluid d-block rounded-circle mx-auto" src="
 @if($comment->userTitle == "scholar")

@if($comment->scholarProfilePic != "")
{{URL::to('/')}}/images/scholarProfilePic/{{$comment->scholarProfilePic}}
@else
    https://static.pingendo.com/img-placeholder-3.svg
@endif

@elseif($comment->userTitle == "admin")
{{URL::to('/')}}/images/ilovetaguig.png
@else
    https://static.pingendo.com/img-placeholder-3.svg
@endif" style="width: 100; height: 100px; object-fit: cover;">
                           
                    <p class="text-secondary text-center" style="font-size: 12px">
                      @php
                        $date=date_create($comment->commentDate);
                      @endphp
                      {{date_format($date,"M/d/Y") }}</p>

                                        </div>
                                        <div class="col-md-10">
                                            <p><strong>
                                        @if(!empty($comment->adminUsername))
                                        {{ $comment->adminUsername }} (Admin)
                                        @else
                                         {{ $comment->scholarUsername }}  (Scholar)
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
                    {{ $scholar[0]['username'] }}
                    <button type="submit" class="float-right btn btn-secondary " onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"><i class="fa fa-comment"></i>
                        Comment
                    </button>
                
            </div>
            <div class="card-body">
                <div class=" card-text form-group"><textarea placeholder="Message" name="commentContent" rows="4" class="form-control form-control-lg"></textarea></div>
            </div>


      <input type="hidden" name="postId" value="{{ $post->postId }}">
      <input type="hidden" name="commentDate" value="{{ date('Y-m-d') }}">
      <input type="hidden" name="scholarId" value="{{ $scholar[0]['scholarId'] }}">

        </div>
    </div>
</form>
</button></h2>
</div>
</div></div></div></div></div></div></button></div><div style="height: 30px"></div>

@endforeach
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Accordion-with-custom-design.js"></script>
</body>

    @stop