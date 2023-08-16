@extends('layouts.base')
@section('body')
@include('layouts.navRegister')
@include('designs.logincss')


<body class="bg-light">

    <style type="text/css">
        i{
            color: red;
        }
    </style>
{{-- {{ count($errors->default) }} --}}


  <div class="text-md-right text-center bg-dark" style="background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 py-4">
          <h1 class="display-4 text-center text-light"><strong>REGISTRATION</strong></h1>
        </div>
      </div>
    </div>
  </div>


  <div class="h-100 w-100 text-light bg-light py-1" style="">
    <div class="container shadow">
      <div class="row">
        <div class="col-md-12 bg-light text-dark" style="   box-shadow: 0px 0px 10px  black;padding-top: 20px">

@if(@ count($errors->default) > 0)
   <div class="alert alert-danger" role="alert" style="margin: 10px">
  <h4 class="alert-heading">Invalid Input</h4>
  <p>
    Invalid input encountered while validating. Please review your inputs
  </p>
  <hr>
  <p class="mb-0">After fixing click the Register button again</p>
</div>
@endif


@if(Session::get('success'))
   <div class="alert alert-success" role="alert" style="margin: 10px">
  <h4 class="alert-heading">Yehey!!!</h4>
  <p>
    {{Session::get('success')}}
  </p>
  <hr>
  <p class="mb-0">Congratulation!!!</p>
</div>
@endif

@if(Session::get('fail'))
   <div class="alert alert-danger" role="alert" style="margin: 10px">
  <h4 class="alert-heading">Opppssss</h4>
  <p>
    {{Session::get('fail')}}
  </p>
  <hr>
  <p class="mb-0">Sorry!!!</p>
</div>
@endif





           <form method="post" action="{{ route('scholar.store') }}">
                        @csrf
            {{-- fName --}}
            <div class="form-group row" style=""> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">First Name</label>
              <div class="col-10 col-md-6" style="">

                <input type="text" name="firstName" id="FirstName" placeholder="Enter First Name" class="form-control text-secondary @error('firstName') is-invalid @enderror" required value="{{ old('firstName') }}"  autocomplete="firstName">
                @if($errors->has('firstName'))
                <small><i>*{{ $errors->first('firstName') }}</i></small>
                @endif
                </div>


            {{-- suffix --}}
                <label class="col-form-label col-form-label-lg" style="">Suffix (if applicable)</label>
              <div class="col-10 col-md-2 " style="">
                <input type="text" id="Suffix" placeholder="ex. Jr., Sr." class="form-control text-secondary @error('suffix') is-invalid @enderror" name="suffix" value="{{ old('suffix') }}" autocomplete="suffix">
                @if($errors->has('suffix'))
                <small><i>*{{ $errors->first('suffix') }}</i></small>
                @endif
            </div>
            </div>


            {{-- middle Name --}}
            <div class="form-group row" style="">
            <label for="inputpasswordh" class="col-2 col-form-label col-form-label-lg" style="">Middle Name</label>
              <div class="col-10 col-md-3" style="">
                <input type="text" name="middleName" id="MiddleName" placeholder="Enter Middle Name" class="form-control @error('middleName') is-invalid @enderror" value="{{ old('middleName') }}" autocomplete="middleName">
                @if($errors->has('middleName'))
                <small><i>*{{ $errors->first('middleName') }}</i></small>
                @endif 
            </div>



            {{-- surname Name --}}
                <label class="col-2 col-form-label col-form-label-lg" style="">Surname</label>
              <div class="col-10 col-md-5" style=""><input type="text" name="surname" id="Surname" placeholder="Enter Surname"  class="form-control @error('surname') is-invalid @enderror" required value="{{ old('surname') }}" autocomplete="surname">

               @if($errors->has('surname'))
              <small><i>*{{ $errors->first('surname') }}</i></small>
               @endif

            </div>
            </div>

            {{-- birthday --}}
            <div class="form-group row" style=""><label class="col-2 col-form-label col-form-label-lg" style="">Birthday</label>
              <div class="col-10 col-md-3" style=""><input type="date" name="birthday" id="Birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" autocomplete="birthday" min="1900-01-01" max="2017-12-30">
               @if($errors->has('birthday'))
              <small><i>*{{ $errors->first('birthday') }}</i></small>
               @endif
           </div>


              {{-- birthPlace --}}
              <label class="col-2 col-form-label col-form-label-lg" style="">Birth Place</label>
              <div class="col-10 col-md-5" style=""><input type="text" name="birthPlace" placeholder="Enter Birth Place" class="form-control @error('birthPlace') is-invalid @enderror" required value="{{ old('birthPlace') }}" autocomplete="birthPlace">
               @if($errors->has('birthPlace'))
              <small><i>*{{ $errors->first('birthPlace') }}</i></small>
               @endif
              </div>
            </div>

            {{-- gender --}}
            <div class="form-group row" style=""><label class="col-2 col-form-label col-form-label-lg" style="">Gender</label>
              <div class="col-md-3" style="">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-secondary">Male<input type="radio" id="btnradio1" name="gender" value="Male" @if (old('gender') == "Male")
                   checked="" 
                @endif ></label>

                <label class="btn btn-outline-secondary">Female<input type="radio" id="btnradio-2" name="gender" value="Female" @if (old('gender') == "Female")
                   checked="" 
                @endif></label></div>
              @if($errors->has('gender'))
              <small><i>*{{ $errors->first('gender') }}</i></small>
               @endif
              </div>

            {{-- civil status --}}
              <label class="col-2 col-form-label col-form-label-lg" style="">Civil Status</label>
              <div class="col-md-4" style="">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio1" name="civilStatus" value="Single"  @if (old('civilStatus') == "Single")
                   checked="" 
                @endif></label>

                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-2" name="civilStatus" value="Married" @if (old('civilStatus') == "Married")
                   checked="" 
                @endif></label>
            </div>
             @if($errors->has('civilStatus'))
                <small><i>*{{ $errors->first('civilStatus') }}</i></small>
                @endif
              </div>
            </div>

            {{-- religion --}}
            <div class="form-group row" style=""><label class="col-2 col-form-label col-form-label-lg" style="">Religion</label>
              <div class="col-10 col-md-10" style=""><input type="text" name="religion" id="Religion" placeholder="Enter Religion" class="form-control @error('religion') is-invalid @enderror" required value="{{ old('religion') }}" autocomplete="religion">
               @if($errors->has('religion'))
              <small><i>*{{ $errors->first('religion') }}</i></small>
               @endif
            </div>
            </div>

            {{-- ADDRESS --}}
            <div class="form-group row" style=""><label class="col-2 col-form-label col-form-label-lg">Address:</label></div>
            <div class="form-group row" style="">

              {{-- house Number --}}
              <label class="col-2 col-form-label col-form-label-lg" style="">House Number</label>
              <div class="col-10 col-md-3" style=""><input type="text" name="houseNumber" id="HouseNumber" placeholder="ex. BLK LOT" required="required" class="form-control @error('houseNumber') is-invalid @enderror" required value="{{ old('houseNumber') }}" autocomplete="houseNumber">
               @if($errors->has('houseNumber'))
              <small><i>*{{ $errors->first('houseNumber') }}</i></small>
               @endif
              </div>

              {{-- Street --}}
              <label class="col-2 col-form-label col-form-label-lg" style="">Street</label>
              <div class="col-10 col-md-5 " style=""><input type="text" name="street"  id="Street"  placeholder="Leave Blank If None" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}" autocomplete="street">
               @if($errors->has('street'))
              <small><i>*{{ $errors->first('street') }}</i></small>
               @endif</div>
            </div>

            {{-- barangay --}}
            <div class="form-group row" style=""><label class="col-2 col-form-label col-form-label-lg" style="">Barangay</label>
              <div class="col-md-3" style="">
                <div class="form-group row">
                  <div class="col-10 col-md-12" style="">
                    <select type="text" name="barangay" class="form-control" id="inlineFormInput" required>

                    @if ( !empty(old('barangay')))
                    <option value="{{ old('barangay') }}"selected>{{ old('barangay') }}</option>
                    @endif

                    <option value="" @if ( empty(old('barangay'))) selected @endif >Select Your Barangay</option>

                        <option value="Bagumbayan">Bagumbayan</option>
                        <option value="Bambang">Bambang</option>
                        <option value="Calzada">Calzada</option>
                        <option value="Hagonoy">Hagonoy</option>
                        <option value="Ibayo Tipas">Ibayo Tipas</option>
                        <option value="Ligid Tipas">Ligid Tipas</option>
                        <option value="Lower Bicutan">Lower Bicutan</option>
                        <option value="New Lower Bicutan">New Lower Bicutan</option>
                        <option value="Napindan">Napindan</option>
                        <option value="Palingon">Palingon</option>
                        <option value="San Miguel">San Miguel</option>
                        <option value="Santa Ana">Santa Ana</option>
                        <option value="Tuktukan">Tuktukan</option>
                        <option value="Ususan">Ususan</option>
                        <option value="Wawa">Wawa</option>
                        <option value="Central Bicutan">Central Bicutan</option>
                        <option value="Central Signal Village">Central Signal Village</option>
                        <option value="Fort Bonifacio">Fort Bonifacio</option>
                        <option value="Katuparan">Katuparan</option>
                        <option value="Maharlika Village">Maharlika Village</option>
                        <option value="North Daang Hari">North Daang Hari</option>
                        <option value="North Signal Village">North Signal Village</option>
                        <option value="Pinagsama">Pinagsama</option>
                        <option value="South Daang Hari">South Daang Hari</option>
                        <option value="South Signal Village">South Signal Village</option>
                        <option value="Bagong Tanyag">Bagong Tanyag</option>
                        <option value="Upper Bicutan">Upper Bicutan</option>
                        <option value="Western Bicutan">Western Bicutan</option>
                    </select></div>
                     @if($errors->has('barangay'))
                     <small><i>*{{ $errors->first('barangay') }}</i></small>
                     @endif
                </div>
              </div>

              {{-- District --}}
              <label class="col-2 col-form-label col-form-label-lg" style="">District</label>
              <div class="col-md-2" style="">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-secondary">1<input type="radio" id="btnradio1" name="district" value="1" @if (old('district') == "1")
                   checked="" 
                @endif></label>

                <label class="btn btn-outline-secondary">2<input type="radio" id="btnradio-2" name="district" value="2" @if (old('district') == "2")
                   checked="" 
                @endif></label></div>
                @if($errors->has('district'))
               <small><i>*{{ $errors->first('district') }}</i></small>
               @endif
              </div>
               
            </div>

            {{-- City --}}
            <input type="hidden" name="city" value="Taguig City">
            <div class="form-group row" style=""><label class="col-2 col-form-label col-form-label-lg" style="">City</label>
              <div class="col-10 col-md-3" style="font-size: 20px">
                Taguig City
              </div>
              {{-- <div class="col-10 col-md-3" style="">

                <select type="text" name="city" class="form-control" id="inlineFormInput" required="required">
                    @if ( !empty(old('city')))
                    <option value="{{ old('city') }}"selected>{{ old('city') }}</option>
                    @endif

                    <option value="" @if ( empty(old('city'))) selected @endif >Select Your City</option>
                    <option value="Caloocan">Caloocan</option>
                    <option value="Las Piñas">Las Piñas</option>
                    <option value="Makati ">Makati </option>
                    <option value="Malabon">Malabon</option>
                    <option value="Mandaluyong">Mandaluyong</option>
                    <option value="Manila">Manila</option>
                    <option value="Marikina">Marikina</option>
                    <option value="Muntinlupa">Muntinlupa</option>
                    <option value="Navotas">Navotas</option>
                    <option value="Parañaque">Parañaque</option>
                    <option value="Pasay">Pasay</option>
                    <option value="Pasig ">Pasig </option>
                    <option value="Quezon City">Quezon City</option>
                    <option value="San Juan">San Juan</option>
                    <option value="Taguig">Taguig</option>
                    <option value="Valenzuela">Valenzuela</option>
                    <option value="Butuan">Butuan</option>
                    <option value="Cabadbaran">Cabadbaran</option>
                    <option value="Bayugan">Bayugan</option>
                    <option value="Legazpi">Legazpi</option>
                    <option value="Ligao">Ligao</option>
                    <option value="Tabaco">Tabaco</option>
                    <option value="Isabela">Isabela</option>
                    <option value="Lamitan">Lamitan</option>
                    <option value="Balanga">Balanga</option>
                    <option value="Batangas City">Batangas City</option>
                    <option value="Lipa">Lipa</option>
                    <option value="Tanauan">Tanauan</option>
                    <option value="Baguio">Baguio</option>
                    <option value="Tagbilaran">Tagbilaran</option>
                    <option value="Malaybalay">Malaybalay</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Malolos">Malolos</option>
                    <option value="Meycauayan">Meycauayan</option>
                    <option value="San Jose del Monte">San Jose del Monte</option>
                    <option value="Tuguegarao">Tuguegarao</option>
                    <option value="Iriga">Iriga</option>
                    <option value="Naga">Naga</option>
                    <option value="Roxas">Roxas</option>
                    <option value="Bacoor">Bacoor</option>
                    <option value="Cavite City">Cavite City</option>
                    <option value="Dasmariñas">Dasmariñas</option>
                    <option value="Imus">Imus</option>
                    <option value="Tagaytay">Tagaytay</option>
                    <option value="Trece Martires">Trece Martires</option>
                    <option value="Bogo">Bogo</option>
                    <option value="Carcar">Carcar</option>
                    <option value="Cebu City">Cebu City</option>
                    <option value="Danao">Danao</option>
                    <option value="Lapu-Lapu">Lapu-Lapu</option>
                    <option value="Mandaue">Mandaue</option>
                    <option value="Naga">Naga</option>
                    <option value="Talisay">Talisay</option>
                    <option value="Toledo">Toledo</option>
                    <option value="Kidapawan">Kidapawan</option>
                    <option value="Panabo">Panabo</option>
                    <option value="Samal">Samal</option>
                    <option value="Tagum">Tagum</option>
                    <option value="Davao City">Davao City</option>
                    <option value="Digos">Digos</option>
                    <option value="Mati">Mati</option>
                    <option value="Borongan">Borongan</option>
                    <option value="Batac">Batac</option>    
                    <option value="Laoag">Laoag</option>    
                    <option value="Candon">Candon</option>  
                    <option value="Vigan">Vigan</option>    
                    <option value="Iloilo City">Iloilo City</option>
                    <option value="Passi">Passi</option>    
                    <option value="Cauayan">Cauayan</option>    
                    <option value="Ilagan">Ilagan</option>  
                    <option value="Santiago">Santiago</option>
                    <option value="Tabuk">Tabuk</option>    
                    <option value="San Fernando">San Fernando</option>  
                    <option value="Biñan">Biñan</option>    
                    <option value="Cabuyao">Cabuyao</option>    
                    <option value="Calamba">Calamba</option>
                    <option value="San Pablo">San Pablo</option>
                    <option value="Santa Rosa">Santa Rosa</option>
                    <option value="San Pedro">San Pedro</option>
                    <option value="Iligan">Iligan</option>  
                    <option value="Marawi">Marawi</option>  
                    <option value="Baybay">Baybay</option>  
                    <option value="Ormoc">Ormoc</option>    
                    <option value="Tacloban">Tacloban</option>  
                    <option value="Cotabato City">Cotabato City</option>
                    <option value="Masbate City">Masbate City</option>
                    <option value="Oroquieta">Oroquieta</option>
                    <option value="Ozamiz">Ozamiz</option>
                    <option value="Tangub">Tangub</option>
                    <option value="Cagayan de Oro">Cagayan de Oro</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Gingoog">Gingoog</option>
                    <option value="Bacolod">Bacolod</option>
                    <option value="Bago">Bago</option>
                    <option value="Cadiz">Cadiz</option>
                    <option value="Escalante">Escalante</option>
                    <option value="Himamaylan">Himamaylan</option>
                    <option value="Kabankalan">Kabankalan</option>
                    <option value="La Carlota">La Carlota</option>
                    <option value="Sagay">Sagay</option>
                    <option value="San Carlos">San Carlos</option>
                    <option value="Silay">Silay</option>
                    <option value="Sipalay">Sipalay</option>
                    <option value="Talisay">Talisay</option>
                    <option value="Victorias">Victorias</option>
                    <option value="Bais">Bais</option>
                    <option value="Bayawan">Bayawan</option>
                    <option value="Canlaon">Canlaon</option>
                    <option value="Dumaguete">Dumaguete</option>
                    <option value="Guihulngan">Guihulngan</option>
                    <option value="Tanjay">Tanjay</option>
                    <option value="Cabanatuan">Cabanatuan</option>
                    <option value="Gapan">Gapan</option>
                    <option value="Muñoz">Muñoz</option>
                    <option value="Palayan">Palayan</option>
                    <option value="San Jose">San Jose</option>
                    <option value="Calapan  Oriental">Calapan   Oriental</option>
                    <option value="Puerto Princesa">Puerto Princesa</option>
                    <option value="Angeles">Angeles</option>
                    <option value="Mabalacat ">Mabalacat </option>
                    <option value="San Fernando">San Fernando</option>
                    <option value="Alaminos">Alaminos</option>
                    <option value="Dagupan">Dagupan</option>
                    <option value="San Carlos">San Carlos</option>
                    <option value="Urdaneta">Urdaneta</option>
                    <option value="Lucena">Lucena</option>
                    <option value="Tayabas">Tayabas</option>
                    <option value="Antipolo">Antipolo</option>
                    <option value="Calbayog">Calbayog</option>
                    <option value="Catbalogan">Catbalogan</option>
                    <option value="Sorsogon City">Sorsogon City</option>
                    <option value="General Santos">General Santos</option>
                    <option value="Koronadal">Koronadal</option>
                    <option value="Maasin">Maasin</option>
                    <option value="Tacurong">Tacurong</option>
                    <option value="Surigao City">Surigao City</option>
                    <option value="Bislig">Bislig</option>
                    <option value="Tandag">Tandag</option>
                    <option value="Tarlac City">Tarlac City</option>
                    <option value="Olongapo">Olongapo</option>
                    <option value="Dapitan">Dapitan</option>
                    <option value="Dipolog">Dipolog</option>
                    <option value="Pagadian">Pagadian</option>
                    <option value="Zamboanga City">Zamboanga City</option>
                </select>
                @if($errors->has('city'))
               <small><i>*{{ $errors->first('city') }}</i></small>
               @endif
              </div>
 --}}
              {{-- Residing year --}}
              <label class="col-form-label col-form-label-lg" style="">Year Started Residing in Taguig</label>
              <div class="col-10 col-md-4  " style=""><input type="text" id="YrSRT" name="yearStart" placeholder="ex. 2000, 2001" required="required"  class="form-control @error('yearStart') is-invalid @enderror" required value="{{ old('yearStart') }}" autocomplete="yearStart">
               @if($errors->has('yearStart'))
              <small><i>*{{ $errors->first('yearStart') }}</i></small>
               @endif
           </div>
            </div>

            {{-- contact Number --}}
            <div class="form-group row"><label class="col-2 col-form-label col-form-label-lg">Contact Number</label>
              <div class="col-10"><input type="text" name="contactNumber" id="ConNum" placeholder="ex. 09123456789" class="form-control @error('contactNumber') is-invalid @enderror" required  value="{{ old('contactNumber') }}" autocomplete="contactNumber">
               @if($errors->has('contactNumber'))
              <small><i>*{{ $errors->first('contactNumber') }}</i></small>
               @endif</div>
            </div>

            {{-- email --}}
            <div class="form-group row"><label class="col-2 col-form-label col-form-label-lg">Email</label>
              <div class="col-10"><input type="email" name="scholarEmail" id="scholarEmail" placeholder="mail@example.com" required class="form-control @error('scholarEmail') is-invalid @enderror" required  value="{{ old('scholarEmail') }}" autocomplete="scholarEmail">
               @if($errors->has('scholarEmail'))
              <small><i>*{{ $errors->first('scholarEmail') }}</i></small>
               @endif</div>
            </div>

            {{-- password --}}
            <div class="form-group row">

            <label class="col-2 col-form-label col-form-label-lg" style="">Password</label>
              <div class="col-10 col-md-3" style=""><input  type="password"  id="Password" required="required" placeholder="Enter Password"
                class="form-control @error('password') is-invalid @enderror" name="password" required value="{{ old('password') }}" autocomplete="new-password">
                @if($errors->has('password'))
              <small><i>*{{ $errors->first('password') }}</i></small>
               @endif
            </div>

              {{-- confirm Password --}}
              <label class="col-2 col-form-label col-form-label-lg" style="">Confirm Password</label>
              <div class="col-10 col-md-3" style=""><input  type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"></div>



            </div>
           
                <h2 style="text-align: center;">
            <button type="submit" class="btn btn-danger"  style="text-align: center;" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();">Register</button>
                </h2>
        
          </form>
        </div>
      </div>
    </div>
  </div>
  

</body>

@endsection
