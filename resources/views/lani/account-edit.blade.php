@extends('layouts.base')
{{-- @include('designs.newcss') --}}
@section('body')
@if(Session::get('UserRole') == "admin")
<div>
  @include('layouts.navAdmin')
  </div>  
@else
  @include('layouts.nav')
@endif


{{-- {{ dd($scholar[0]) }} --}}

@if($message=Session::get('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 80%; margin: auto;">
  <strong>{{ $message }}!!! <i class="far fa-check-circle"></i></strong>  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</div>
@endif

<form style="margin: 20px;" action="{{ route('scholar.update', $scholar[0]['scholarId']) }}" method="post" enctype="multipart/form-data">
    @csrf
  {{ method_field('PATCH') }}
          <h1 style="text-align: center;background: #807d7d;color: rgb(255,255,255);font-size: 40px; width: auto;"><br><strong>PROFILE</strong><br><br></h1>

  <div class="py-2">
    <div class="container" style="">
      <div class="row" style="">
        <div class="col-md-12 pt-4 pb-4" style=""><img class="img-fluid d-block rounded-circle mx-auto" src="@if ($scholar[0]['scholarProfilePic'] == "")
                  https://static.pingendo.com/img-placeholder-3.svg
                @else
                  {{URL::to('/')}}/images/scholarProfilePic/{{$scholar[0]['scholarProfilePic']}}
                @endif" style=" width: 200px; height: 200px; object-fit: cover;  box-shadow: 0px 0px 10px  black;"></div>
      </div>
      <div class="row">
      </div>
      
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
       
  

  <input type="hidden" name="old_scholarProfilePic" value="{{ $scholar[0]['scholarProfilePic']}}">
             <p class="text-left" id="twoByTwo"><strong>Upload New Profile Picture</strong><br></p>
                            <div class="form-row">
                                <div class="col text-left"><p><input type="file" accept="image/*" name="scholarProfilePic[]" id="file"  onchange="loadFile(event)" style="display: none;"></p>
<p><img id="output" name="scholarProfilePic" width="200" class="border border-danger" /></p>
<p><label class="btn btn-outline-secondary" for="file" style="cursor: pointer;">Upload Image</label></p>
@if($errors->has('scholarProfilePic'))
    <small><i>*{{ $errors->first('scholarProfilePic') }}</i></small>
    @endif
<script>
var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};
</script></div>

                            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">First Name:</label>
              <div class="col-10 col-md-4" style="">
                <input type="text" name="scholarFirstName" class="form-control" style="" value="{{ $scholar[0]['scholarFirstName'] }}"> </div><label for="inputpasswordh" class="col-form-label col-form-label-lg col-2" style="">Suffix:</label>
              <div class="col-10 col-md-4" style="">
                <input type="text" name="scholarSuffix" class="form-control" style="" value="{{ $scholar[0]['scholarSuffix'] }}"> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Middle Name:</label>
              <div class="col-10 col-md-4" style="">
                <input type="text" name="scholarMiddleName" class="form-control" style="" value="{{ $scholar[0]['scholarMiddleName'] }}"> </div><label for="inputpasswordh" class="col-form-label col-2 col-form-label-lg" style="">Surname:</label>
              <div class="col-10 col-md-4" style="">
                <input type="text" name="scholarLastName" class="form-control" style="" value="{{ $scholar[0]['scholarLastName'] }}"> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Birthday:</label>
              <div class="col-10 col-md-4" style="">
                <input type="date" name="scholarBirthDate" class="form-control" style="" value="{{ $scholar[0]['scholarBirthDate'] }}"> </div><label for="inputpasswordh" class="col-form-label col-2 col-form-label-lg" style="">Birth Place:</label>
              <div class="col-10 col-md-4" style="">
                <input type="text" name="scholarBirthPlace" class="form-control" style="" value="{{ $scholar[0]['scholarBirthPlace'] }}"> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Gender:</label>
              <div class="col-10 col-md-4" style="">

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-secondary">Male<input type="radio" id="btnradio1" name="scholarGender" value="Male" @if ($scholar[0]['scholarGender'] == "Male")
                   checked="" 
                @endif ></label>

                <label class="btn btn-outline-secondary">Female<input type="radio" id="btnradio-2" name="scholarGender" value="Female" @if ($scholar[0]['scholarGender'] == "Female")
                   checked="" 
                @endif></label>
                </div>
                

              </div>
              <label for="inputpasswordh" class="col-form-label col-2 col-form-label-lg" style="">Civil Status:</label>
              <div class="col-10 col-md-4" style="">

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio1" name="scholarCivilStatus" value="Single" @if ($scholar[0]['scholarCivilStatus'] == "Single")
                   checked="" 
                @endif ></label>

                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-2" name="scholarCivilStatus" value="Married" @if ($scholar[0]['scholarCivilStatus'] == "Married")
                   checked="" 
                @endif></label>
                </div>

                <input type="hidden" class="form-control"> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Religion:</label>
              <div class="col-10 col-md-10" style="">
                <input type="text" name="scholarReligion" class="form-control" style="" value="{{ $scholar[0]['scholarReligion'] }}"> </div>
            </div>
            
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">House Number:</label>
              <div class="col-10 col-md-4" style="">
                <input type="text" name="houseNumber" class="form-control" style="" required> </div><label for="inputpasswordh" class="col-form-label col-2 col-form-label-lg" style="">Street:</label>
              <div class="col-10 col-md-4" style="">
                <input type="text" name="street" class="form-control" style="" required> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Barangay:</label>
              <div class="col-10 col-md-4" style="">
                <select type="text" name="scholarBarangay" class="form-control" id="inlineFormInput" required>
                    <option value="{{ $scholar[0]['scholarBarangay'] }}" selected>{{ $scholar[0]['scholarBarangay'] }}</option>

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
                    </select>

                  </div><label for="inputpasswordh" class="col-form-label col-2 col-form-label-lg" style="">District:</label>
              <div class="col-10 col-md-4" style="">
                <input type="number" name="scholarDistrict" class="form-control" style="" value="{{ $scholar[0]['scholarDistrict'] }}"> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">City:</label>
              <div class="col-10 col-md-4" style="">
                <select type="text" name="scholarCity" class="form-control" id="inlineFormInput" required="required">
                    
                  <option value="{{ $scholar[0]['scholarCity'] }}" selected>{{ $scholar[0]['scholarCity'] }}</option>

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

              </div><label for="inputpasswordh" class="col-form-label col-form-label-lg col-4" style="">Year Started Residing in Taguig:</label>
              <div class="col-10 col-md-2" style="">
                <input type="number" name="scholarStartedDate" class="form-control" style="" value="{{ $scholar[0]['scholarStartedDate'] }}"> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Contact Number:</label>
              <div class="col-10 col-md-4" style="">
                <input type="number" name="scholarContactNum" class="form-control" style="" value="{{ $scholar[0]['scholarContactNum'] }}"> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">E-mail:</label>
              <div class="col-10 col-md-5" style="">
                <input type="email" name="scholarEmail" class="form-control" style="" value="{{ $scholar[0]['scholarEmail'] }}" disabled=""> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-3 col-form-label-lg" style="">Current Password:</label>
              <div class="col-10 col-md-3" style="">
                <input type="password" name="scholarPassword" class="form-control" style=""> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-3 col-form-label-lg" style="">New Password:</label>
              <div class="col-10 col-md-3" style="">
                <input type="password" name="newPassword" class="form-control" style=""> </div>
            </div>
            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-form-label-lg col-3" style="">Confirm Password:</label>
              <div class="col-10 col-md-3" style="">
                <input type="password" name="confirmPassword" class="form-control" style=""> </div>
            </div>

            <div class="row">
              <div class="mx-auto"><button type="submit" class="btn border-dark btn-danger mt-4">Done</button></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@stop