@extends('layouts.base')
@section('body')
@include('layouts.nav') 
@include('designs.homecss')

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


                 {{ $dateAF }}</em></h3>
                <p class="description" style="text-align: justify;"><em>{{ $announcement->announcementContent }}</em></p>
            </div>
          @endforeach
        </div>
    </div>


@stop
