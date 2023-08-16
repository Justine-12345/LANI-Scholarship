@extends('layouts.base')
@section('body')
@include('layouts.navAdmin') 
@include('designs.homecss')




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


 <div class="container">
        <div class="intro">
            <h2 class="text-center" style="margin: 10px 0px 8px;margin-top: 10px;font-family: ABeeZee, sans-serif;text-align: justify;color: rgb(199,20,14);"><strong>Admin Announcements</strong></h2>
        </div>
        <div class="row articles">
        @foreach($announcements as $announcement)
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
                 </form></h3>
                <p class="description" style="text-align: justify;"><em>{{ $announcement->announcementContent }}</em></p>
            </div>
          @endforeach
        </div>
    </div>


@stop
