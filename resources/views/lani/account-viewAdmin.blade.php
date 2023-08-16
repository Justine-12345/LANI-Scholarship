@extends('layouts.base')
@section('body')
@include('layouts.navAdmin')

<style type="text/css">
  td{
    padding-top: 5px;
    padding-bottom: 5px;
    border-bottom: 1px solid gray;
    width: 500px;
    border-right: none;
    border-left: none;
  }
  .value{
    width: 200px;
    font-size: 10;
  }
</style>
<h2 style="text-align: center; margin-top: 20px; margin-bottom: 20px">Scholar Profile</h2>
<div class="col-md-6" style="font-size: 20px; margin-top: 150px; margin: auto;">
<table >
  <tr>
    <td>
      <b>First Name </b>
    </td>
    <td class="value">
      {{ $scholar->scholarFirstName}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Last Name </b>
    </td>
    <td class="value">
      {{ $scholar->scholarLastName}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Middle Name </b>
    </td>
    <td class="value">
      {{ $scholar->scholarMiddleName}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Suffix</b>
    </td>
    <td class="value">
      {{ $scholar->scholarSuffix}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Username</b>
    </td>
    <td class="value">
      {{ $scholar->username}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Age</b>
    </td>
    <td class="value">
      {{ $scholar->scholarAge}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Gender</b>
    </td>
    <td class="value">
      {{ $scholar->scholarGender}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Email</b>
    </td>
    <td class="value">
      {{ $scholar->scholarEmail}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Contact No</b>
    </td>
    <td class="value">
      {{ $scholar->scholarContactNum}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Religion</b>
    </td>
    <td class="value">
      {{ $scholar->scholarReligion}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Birthday</b>
    </td>
    <td class="value">
      {{ $scholar->scholarBirthDate}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Birthplace</b>
    </td>
    <td class="value">
      {{ $scholar->scholarBirthPlace}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Civil Status</b>
    </td>
    <td class="value">
      {{ $scholar->scholarCivilStatus}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Address</b>
    </td>
    <td class="value">
      {{ $scholar->scholarAddress}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Barangay</b>
    </td>
    <td class="value">
      {{ $scholar->scholarBarangay}}
    </td>
  </tr>
  <tr>
    <td>
      <b>District</b>
    </td>
    <td class="value">
      {{ $scholar->scholarDistrict}}
    </td>
  </tr>
   <tr>
    <td>
      <b>City</b>
    </td>
    <td class="value">
      {{ $scholar->scholarCity}}
    </td>
  </tr>
   <tr>
    <td>
      <b>Year started residing in Taguig City</b>
    </td>
    <td class="value">
      {{ $scholar->scholarStartedDate}}
    </td>
  </tr>
  <tr>
    <td>
      <b>Status</b>
    </td>
    <td class="value">
      @if($scholar->scholarStatus == 'renew')
      Accepted
      @else
      {{ $scholar->scholarStatus}} 
      @endif

        @if($scholar->scholarStatus == 'new')
              <a href="#" class="badge badge-success">Accept</a>
              @endif
    </td>
  </tr>



</table>

</div>

 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>






@stop