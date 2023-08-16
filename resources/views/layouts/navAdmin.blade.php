

<nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background-color: #c7140e;color: rgb(51, 51, 51);">
                <div class="container-fluid">
                    <picture><img src="{{asset('aboutAssets/img/tag.png')}}" width="60" style="height: 59px;padding-left: 0px;"></picture><a class="navbar-brand" href="#" style="color: rgb(255,255,255);font-size: 30px;margin-right: 0px;margin-top: 0px;margin-left: 10px;"><strong>LANI SCHOLARSHIP <small>(Admin)</small></strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-2" style="color: rgb(255,255,255);">

                        <ul class="navbar-nav ml-auto" style="margin-right: 20px">
                          @if($get_data['adminInfo']['adminStatus'] != "new" && $get_data['adminInfo']['adminStatus'] != "banned")
                            <li class="nav-item"><a class="nav-link " data-bss-hover-animate="pulse" href="{{ route('userhomeAdmin') }}" style="color: rgb(255,255,255);">Home</a></li> 

                             <li class="nav-item"><a class="nav-link " data-bss-hover-animate="pulse" href="{{ route('submission.index') }}" style="color: rgb(255,255,255);">Submission</a></li>

                            

                            <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="{{ route('admin.index')  }}" style="color: rgb(255,255,255);">Admin</a></li>

                             <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="{{ route('scholar.index')  }}" style="color: rgb(255,255,255);">Scholar</a></li>

                            <li class="nav-item"><a class="nav-link " data-bss-hover-animate="pulse" href="{{ route('indexAdmin') }}" style="color: rgb(255,255,255);">MyPost</a></li>

                            <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="{{ route('aboutAdmin') }}" style="color: rgb(255,255,255);">About</a></li>
                            @endif
                        </ul>


                       
                       <img class="rounded-circle" src="{{ asset('images/ilovetaguig.png') }}" style="width: 50px; height: 50px; object-fit: cover; margin-left:" id="dp">
                        
                        <label for="dp" style="padding-top: 10px; margin-left: 10px"><b><a href="{{ route('admin.edit',$get_data['adminInfo']['adminId']) }}" style="color: white; text-decoration: none;">{{ $get_data['adminInfo']['username'] }}</a></b></li>
                       



                       <span class="navbar-text actions"> 

                    <a class="btn btn-light action-button" role="button" data-bss-hover-animate="pulse" href=" {{ route('logoutAdmin') }}  " style="background-color: #807d7d;border-radius: 20px;color: rgba(255,255,255,0.9);border-width: 0px; margin-left: 10px">Logout</a></span>
                    </div>
                </div>
            </nav> 