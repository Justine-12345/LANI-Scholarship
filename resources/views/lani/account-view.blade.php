@extends('layouts.base')

@include('designs.newcss')

@include('layouts.nav')

@section('body')
{{-- {{ dd($scholar[0]->scholarProfilePic) }} --}}

<form style="margin: 20px;" action="{{ route('scholar.edit', $scholar[0]['scholarId']) }}" method="get" >
    @csrf

          <h1 style="text-align: center;background: #807d7d;color: rgb(255,255,255);font-size: 40px; width: auto;"><br><strong>PROFILE</strong><br><br></h1>
        
  <div class="py-2">
    <div class="container" style="">
      <div class="row" style="">
        <div class="col-md-12 pt-4 pb-4" style=""><img class="img-fluid d-block rounded-circle mx-auto" src="@if ($scholar[0]['scholarProfilePic'] == "")
                  https://static.pingendo.com/img-placeholder-3.svg
                @else
                  {{URL::to('/')}}/images/scholarProfilePic/{{$scholar[0]['scholarProfilePic']}}
                @endif" style="width: 200px; height: 200px; object-fit: cover; box-shadow: 0px 0px 10px  black;"></div>
      </div>
      <div class="row">
      </div>
      <div class="row mb-2">
       
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="">
          <form id="c_form-h" class="p-4 mb-5" style="  box-shadow: 0px 0px 10px  black;">
            <div class="form-group row"><label for="inputmailh" class="col-form-label col-2 col-form-label-lg w-100 text-dark" style=""><strong>First Name: </label></strong>
            <label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarFirstName'] }}</label> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Suffix:</label></strong>
              <label for="inputpasswordh" class="col-form-label col-form-label-lg col-2" style="">{{ $scholar[0]['scholarSuffix'] }}</label>
            </div>
            <div class="form-group row"><strong></strong><label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Middle Name:</label></strong><label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarMiddleName'] }}</label> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Surname:</label></strong>
              <label for="inputpasswordh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarLastName'] }}</label>
            </div>
            <div class="form-group row"><label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Birthday:</label></strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarBirthDate'] }}</label> 
              <label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Birth Place:</label></strong>
              <label for="inputpasswordh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarBirthPlace'] }}</label>
            </div>
            <div class="form-group row"><label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Gender:</label></strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarGender'] }}</label>
              <label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Civil Status:</label></strong>
              <label for="inputpasswordh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarCivilStatus'] }}</label>
            </div>
            <div class="form-group row"><label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Religion:</label> </strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-10" style="">{{ $scholar[0]['scholarReligion'] }}</label>
            </div>

            <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Address:</label></strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-10" style="">{{ $scholar[0]['scholarAddress'] }}</label>
            </div>

            
            <div class="form-group row"><label for="inputpasswordh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Barangay:</label></strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarBarangay'] }}</label><label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>District:</label></strong>
              <label for="inputpasswordh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarDistrict'] }}</label>
            </div>
            <div class="form-group row"><label for="inputpasswordh" class="col-form-label col-form-label-lg col-2 text-dark" style=""><strong>City:</label></strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarCity'] }}</label><label for="inputmailh" class="col-form-label col-form-label-lg col-4 text-dark" style=""><strong>Year Started Residing in Taguig: </label></strong>
              <label for="inputpasswordh" class="col-form-label col-form-label-lg col-2" style="">{{ $scholar[0]['scholarStartedDate'] }}</label>
            </div>
            <div class="form-group row"><label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style=""><strong>Contact Number:</label></strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarContactNum'] }}</label>
            </div>
            <div class="form-group row"><label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style="" contenteditable="true"><strong>E-mail:</label></strong>
              <label for="inputmailh" class="col-form-label col-form-label-lg col-4" style="">{{ $scholar[0]['scholarEmail'] }}</label> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg text-dark" style="">
            </div>

  <div class="form-group row"  >
    <button type="submit" class="float-center btn btn-danger"> <i class="fas fa-edit"></i> Edit Account</button>
  </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@stop