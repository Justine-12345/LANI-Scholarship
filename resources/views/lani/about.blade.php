@extends('layouts.base')

@include('designs.aboutcss')
@include('layouts.nav')

@section('body')

<body>
    <div class="row">
        <div class="col-lg-12 text-center" data-aos="fade-up" style="color: rgb(0,0,0);background: #807d7d;border-radius: 0px;margin: 0px;margin-top: 0px;margin-bottom: 9px;">
           
            <h2 class="text-uppercase" style="border-color: #000000;color: rgb(255,255,255);font-size: 40px;"><br><strong>ABOUT</strong><br><br></h2>
        </div>
    </div>
    <section id="about" style="background: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-down" style="color: #c7140e;border-radius: 17px;background: #c7140e;margin: auto;margin-right: auto;margin-left: auto;">
                    <ul class="list-group timeline">
                        <li class="list-group-item" style="padding-top: 14px;margin-top: 15px;margin-bottom: 13px;"><img class="float-left d-lg-flex justify-content-lg-start rubberBand animated rounded-circle" src="{{asset('aboutAssets/img/166325916_507484137292190_4092235184476265441_n.png')}}" style="margin: 10px;width: 234px;height: 205.016px;">
                            <div class="timeline-image"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading" style="font-size: 26px;">What is L.A.N.I scholarship?&nbsp;</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted" style="text-align: justify;font-size: 20px;"><br>LIFELINE ASSISTANCE FOR NEIGHBOR'S IN-NEED (L.A.N.I) SCHOLARSHIP is given to a bona fide Taguig residents. The applicant must be a registered voter of Taguig and with at least one family member that is a registered voter of the City. It is a great opportunity for Taguigeños who are dedicated to study. There will be a maintaining General weighted average to avoid termination of the scholarship.&nbsp;<br><br></p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted" style="margin-bottom: 15px;"><img class="float-left rubberBand animated rounded-circle" src="{{asset('aboutAssets/img/165688155_884797295651560_1435924049484523608_n.png')}}" style="border: 2px solid var(--gray-dark);width: 230px;margin: 10px;height: 200px;">
                            <div class="timeline-image"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading" style="font-size: 26px;">How can I get L.A.N.I scholarship?</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted d-xl-flex justify-content-xl-end align-items-xl-center" style="font-size: 20px;">There will be a scholarship application form that will be submitted if it is for renewal application or new application.&nbsp;</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>