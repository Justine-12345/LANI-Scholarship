<nav class="navbar navbar-light navbar-expand-lg sticky-top navigation-clean-button" style="background-color: #c7140e;color: rgb(51, 51, 51);">
        <div class="container-fluid">
            <picture style="width: 70px;"><img src="{{asset('aboutAssets/img/tag.png')}}" width="60"></picture><a class="navbar-brand" href="#" style="color: rgb(255,255,255);font-size: 30px;"><strong>LANI SCHOLARSHIP <small>(Admin)</small></strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active text-right d-table" data-bss-hover-animate="pulse" href="{{ route('visitor') }}" style="color: rgb(255,255,255);padding-right: 10px;">Home</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>


                  <div style="height: 0px;width: 20px;"></div><span class="navbar-text actions"> <a class="btn btn-primary action-button" role="button" data-bss-hover-animate="pulse" href="{{ route('admin.create') }} " style="background: rgb(255,255,255);border-radius: 20px;color: black;border-width: 0px;">Register</a></span>

                <div style="height: 0px;width: 20px;"></div><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" data-bss-hover-animate="pulse" href="{{ route('loginAdmin') }}" style="background-color: #807d7d;border-radius: 20px;color: rgba(255,255,255,0.9);border-width: 0px;">Login</a></span>
            </div>
        </div>
    </nav>