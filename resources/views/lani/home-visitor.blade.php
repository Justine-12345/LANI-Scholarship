@extends('layouts.base')
@include('designs.homevisitorcss')
@section('body')
@include('layouts.navRegister')
<body style="background: #000000; padding: 0px">
    <section id="carousel">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item" >
                    <div class="jumbotron pulse animated hero-photography carousel-hero" style="background: linear-gradient(#c7140e 18%, rgb(58,58,58) 50%, #000000 56%, #000000 84%); height: 350px">
                        <h1 class="hero-title" style="font-size: 61px;color: rgb(255,255,255);font-family: Aleo, serif;margin: -21px;">WELCOME TAGUIG SCHOLARS!</h1>
                        <p class="hero-subtitle" style="font-size: 32px;font-family: Quintessential, cursive;width: 50;margin: 29px 264.5px;">&nbsp;&nbsp;

                            <img src="{{ url('https://pbs.twimg.com/profile_images/1232180711068553216/PaJ2VSNK.png') }}" width="100px" height="100px">
                      </p>
                        <p class="hero-subtitle" style="font-size: 32px;font-family: Quintessential, cursive;">Be one of our great scholars!&nbsp;</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-photography carousel-hero" style="background: url(&quot;https://wie.ieee.org/wp-content/uploads/2018/02/SCHOLARSHIPS.jpg&quot;) top / cover; height: 350px">
                        <p class="hero-subtitle" style="font-size: 32px;font-family: Quintessential, cursive;border-right-color: rgb(128,53,53);color: rgb(228,203,203);width: 604px;height: 74px;">"Nothing is more expensive than a missed opportunity"</p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="jumbotron pulse animated hero-photography carousel-hero" style="background: url(&quot;https://cdn.dnaindia.com/sites/default/files/styles/full/public/2019/03/26/805913-mahatma-gandhi-2.jpg&quot;) center / cover; height: 350px">
                        <p class="text-nowrap text-center d-xl-flex align-items-xl-end hero-subtitle" style="text-shadow: 0px 0px #c7140e;color: #000000;font-family: Quintessential, cursive;font-size: 32px;width: 601px;height: 116px;margin: 27px 267px;padding: 32px 15px;text-align: left;box-shadow: 0px 0px #c7140e;border-color: #470a0a;">"The future depends on what you do today." - Mahatma Gandhi</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
            </ol>
        </div>
    </section>
    <div class="container">
        <div style="text-align:center;">
            <h2 class="divider-style" style="background: #6f2f2f;"></h2>
        </div>
    </div>
    <div class="container">
        <section class="article-list">
            <div class="container" style="background: #ffffff;">
                <div class="row articles" style="background: #ffffff;">
                    <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src=" {{ asset('homeVisitorAssets/img/wha.png') }} " width="150px"></a>
                        <h3 class="name" style="font-size: 25px;font-family: Aleo, serif;">What</h3>
                        <p class="description" style="color: #103170;">LIFELINE ASSISTANCE FOR NEIGHBOR'S IN-NEED (L.A.N.I) SCHOLARSHIP is a program for students who needs academic assistance.&nbsp; &nbsp; &nbsp;<br></p>
                    </div>
                    <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="{{ asset('homeVisitorAssets/img/who.png') }} " width="365px"></a>
                        <h3 class="name" style="font-size: 25px;font-family: Aleo, serif;">Who</h3>
                        <p class="description" style="text-align: center;color: #103170;">The scholarship&nbsp;is given to a bona fide Taguig residents. Applicants must be a registered voter of Taguig and with at least one family member that is a registered voter of the City.<br></p>
                    </div>
                    <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="{{ asset('homeVisitorAssets/img/how.png') }} " width="190px"></a>
                        <h3 class="name" style="font-size: 25px;font-family: Aleo, serif;">How</h3>
                        <p class="description" style="color: #103170;">There will be a scholarship application form that will be submitted if it is for renewal application or new application.&nbsp;<br><br></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div style="text-align:center;">
            <h2 class="divider-style" style="border-color: #000000;background: #c7140e;margin: 12px 40px 8px;"><span style="background: #c7140e;">---</span></h2>
        </div>
    </div>
    <div class="container">
        <section class="highlight-phone">
            <div class="container">
                <div class="row">
                    <div class="col-md-8" style="width: 702.263px;height: 506px;margin: -25px;">
                        <div class="intro">
                            <p style="height: -9px;width: 299px;margin: 96px;font-family: Quintessential, cursive;color: #000000;font-size: 32.4px;text-align: center; color: black; line-height: 40px; background-color: white; padding: 10px; margin-bottom: 10px; ">"The learner always begins by finding fault, but the scholar sees the positive merit in everything." -&nbsp; Georg Wilhelm Friedrich Hegel</p>
                        </div>
                    </div>
                    <div class="col-sm-4" style="background: url(&quot;https://scontent.fmnl16-1.fna.fbcdn.net/v/t1.6435-9/175635378_4365299900169133_1139778742792345214_n.jpg?_nc_cat=109&amp;ccb=1-3&amp;_nc_sid=8bfeb9&amp;_nc_ohc=f4NE82nkgE4AX9qxVLP&amp;tn=u8T2TXLA-f6g2Okf&amp;_nc_ht=scontent.fmnl16-1.fna&amp;oh=c892bb4247fbba79828e8eb4a32ff6ab&amp;oe=60AD2F80&quot;) center / contain no-repeat;width: 375.125px;height: 503px;margin: -16px;padding: -9px;">
                        <div class="d-none d-md-block phone-mockup"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div style="text-align:center;">
            <h2 class="divider-style" style="border-color: #000000;background: #c7140e;margin: 12px 40px 8px;"><span style="background: #c7140e;color: #ffffff;font-family: 'Bebas Neue', cursive;font-size: 29px;">L.A.N.I scholarship program types &amp; intended beneficiaries</span></h2>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive" style="color: #000000;background: #ffffff;font-family: Aleo, serif;text-align: left;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">SCHOLARSHIP TYPE</th>
                        <th style="text-align: center;">INTENDED BENEFICIARIES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Honors</strong></td>
                        <td>Top 10 graduates of public high schools in Taguig.</td>
                    </tr>
                    <tr>
                        <td><strong>Premier</strong><br></td>
                        <td>Those enrolling in, or enrolled in the University of the Philippines System (Luzon Campuses &amp; other public &amp; private colleges and universities certified by CHED as Center of Excellence in the NCR.&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Priority</strong></td>
                        <td>Those enrolling in or enrolled in BS Social Work, DOST - listed priority courses in DOST-listed schools, or if persons with disabilities, must be endorsed&nbsp; by the city PDAO, or if taking up law or medicine, must be enrolled or enrolling in top performing schools as listed by the Program based on the listing of PRC/CHED. Preferably enrolled within the NCR.</td>
                    </tr>
                    <tr>
                        <td><strong>Basic (Public - Private)</strong></td>
                        <td>&nbsp;Graduates of any public high schools in Taguig or nearby LGUs in the NCR who are enrolled in any private college or university, or in any accredited technical-vocational institutions in the NCR.</td>
                    </tr>
                    <tr>
                        <td><strong>SUC/LCU (Private - Public)</strong></td>
                        <td>Graduates of any private school in Taguig or nearby LGUs in the NCR, who are enrolled or enrolling in a State University/College (SUC) or Local College/University (LCU) in the NCR.</td>
                    </tr>
                    <tr>
                        <td><strong>Basic Plus</strong></td>
                        <td>Graduates of any public high school in Taguig or nearby LGUs in the NCR, who are enrolled or enrolling in a State University/College(SUC) or Local Collage/University (LCU) in the NCR.&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div style="text-align:center;">
            <h2 class="divider-style" style="border-color: #000000;background: #c7140e;margin: 12px 40px 8px;"><span style="background: #c7140e;color: #ffffff;font-family: 'Arbutus Slab', serif;font-size: 19px;">Lanischolarship&nbsp;© 2021 All Rights Reserved<br></span></h2>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Typing-With-Blinking.js"></script>
    <script src="assets/js/Content-Slide-2-With-Images-1.js"></script>
    <script src="assets/js/Content-Slide-2-With-Images.js"></script>
    <script src="assets/js/ImageSlidePete.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
</body>
@stop