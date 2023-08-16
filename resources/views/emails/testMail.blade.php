<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Send Email in Laravel 8 Using Gmail SMTP | Programming Fields</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>
  <body>
  	<form action="{{ url('email_send') }}" method="post">
  		@csrf

  		<div>
  			<label>Name:</label>
  			<input type="text" name="name">
  		</div>

  		<div>
  			<label>Email:</label>
  			<input type="email" name="email">
  		</div>


  		<div>
  			<label>Subject:</label>
  			<input type="text" name="subject">
  		</div>


  		<div>
  			<label>Message:</label>
  			<textarea name="message" cols="4" rows="4"></textarea>
  		</div>

  		
  		<button type="submit">Submit</button>


  	</form>

  </body>
</html>
