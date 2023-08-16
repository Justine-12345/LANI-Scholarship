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
	
		font-size: 10;
		text-align: left;
	}
</style>
<h2 style="text-align: center; margin-top: 20px; margin-bottom: 20px">Edit Admin Profile</h2>
<div class="col-md-6" style="font-size: 20px; margin-top: 150px; margin: auto;">
<form action="{{ route('admin.update',$admin->adminId) }}" method="post"> 
	@csrf
	@method('PATCH')
<table >
	<tr>
		<td>
			<b>First Name </b>
		</td>
		<td class="value">
		<input class="form-control" name="adminFirstName" type="text" placeholder="Default input" value="
			<?php
             if (count($errors)>0){
                 echo old('adminFirstName');
                }
             else{ 
             echo $admin->adminFirstName;
                 }       
            ?>
		">
		 @if($errors->has('adminFirstName'))
            <small><i>*{{ $errors->first('adminFirstName') }}</i></small>
         @endif
		</td>
	</tr>
	<tr>
		<td>
			<b>Last Name </b>
		</td>
		<td class="value">
			<input class="form-control" style="padding-right: 100px" name="adminLastName" type="text" placeholder="Default input" value="
			<?php
             if (count($errors)>0){
                 echo old('adminLastName');
                }
             else{ 
             echo $admin->adminLastName;
                 }       
            ?>
		">
		 @if($errors->has('adminLastName'))
            <small><i>*{{ $errors->first('adminLastName') }}</i></small>
         @endif
		</td>
	</tr>
	<tr>
		<td>
			<b>Middle Name </b>
		</td>
		<td class="value">
			<input class="form-control" name="adminMiddleName" type="text" placeholder="Default input" value="
			<?php
             if (count($errors)>0){
                 echo old('adminMiddleName');
                }
             else{ 
             echo $admin->adminMiddleName;
                 }       
            ?>
		">
		 @if($errors->has('adminMiddleName'))
            <small><i>*{{ $errors->first('adminMiddleName') }}</i></small>
         @endif
		</td>
	</tr>
	<tr>
		<td>
			<b>Address</b>
		</td>
		<td class="value">
			<input class="form-control" name="adminAddressline" type="text" placeholder="Default input" value="
			<?php
             if (count($errors)>0){
                 echo old('adminAddressline');
                }
             else{ 
             echo $admin->adminAddressline;
                 }       
            ?>
		">
		 @if($errors->has('adminAddressline'))
            <small><i>*{{ $errors->first('adminAddressline') }}</i></small>
         @endif
		</td>
	</tr>
	<tr>
		<td>
			<b>Birthday</b> 
		</td>
		<td class="value">
			<input class="form-control" name="adminBirthDate" type="date" placeholder="Default input" value="
			<?php
             if (count($errors)>0){
                 echo old('adminBirthDate');
                }
             else{ 
             echo $admin->adminBirthDate;
                 }       
            ?>
		">
		 @if($errors->has('adminBirthDate'))
            <small><i>*{{ $errors->first('adminBirthDate') }}</i></small>
         @endif
		</td>
	</tr>

</table>
<div class="row" style="margin-top: 10px">
<div class="col-md-1 offset-md-5">
<button type="submit" class="btn btn-danger">Update</button>
</div>
</div>
</form>
</div>

 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>






@stop