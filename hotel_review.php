<?php
// Create the variables
$name_error = '';
$email_error = '';
$response_error = '';
$output = '';
$hotel_chain = '';

//If the form is submitted
if (isset($_POST["submit"]))
{
    // Validate name
	if (empty($_POST["name"]))
    {
        $name_error = "<p>Please enter your name!</p>";
    }
    else
    {
        // Check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"]))
        {
            $name_error = "<p>Only Letters and whitespace allowed!</p>";
        }
        //Check if name is “Voldemort” then redirect to "tomsrhinoplasty.com"
        if ($_POST["name"] == "Voldemort")
        {
            header("Location: http://tomsrhinoplasty.com");
        }
    }
    // Validate email
	if (empty($_POST["email"]))
    {
        $email_error = "<p>Please enter your email!</p>";
    }
    else
    {
        // Check if e-mail address is well-formed
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            $email_error = "<p>Invalid Email!</p>";
        }
    }
    // Validate response
	if (empty($_POST["response"]))
    {
        $response_error = "<p>Please choose your response!</p>";
    }
    //If there are no errors
	if ($name_error == "" && $email_error == "" && $response_error == "")
    {
        //Print the received data
		$output = '  
           <p>Thank you ' . $_POST["name"] . ' for submitting your review.</p>
		   <p>You said that your stay at ' . $_POST["hotel_chain"] . ' was ' . $_POST["response"] . '.</p>   
           ';
    }
}
?>  
<!DOCTYPE html>
<html>

<head>
	<title>Welcome to d_vu's page!</title>
	<style type="text/css">
        .error{ color: red; }
    </style>
</head>

<body>
	<div class="container" style="width:500px;">
		<p>Please help other customers by submitting a review of your recent hotel stay below:</p>
		<form method="post">
			<div class="form-group">
				<label>Hotel you recently stayed at:
					<select name="hotel_chain" required>
						<option value="AllPoints">All Points by Careaton</option> 
						Fanshawe College Page 2 of 7 
						INFO1208 PHP Professor Kjartan Hermansen 
						Lab 03 HTML Forms Winter 2022
						<option value="Holiday Out">Holiday Out</option>
						<option value="Doubleshrub">Doubleshrub</option>
						<option value="DaNada">DaNada</option>
						<option value="Mitts Carlton">Mitts Carlton</option>
						<option value="Milton">Milton</option>
					</select>
				</label>
			</div>
			<p></p>
			<div class="form-group">
				<label>Name<span class="error">*</span></label>
				<input type="text" name="name" class="form-control" maxlength="75"> <span class="error"><?php echo $name_error; ?></span> </div><p></p>
			<div class="form-group">
				<label>Email Address<span class="error">*</span></label>
				<input type="text" name="email" class="form-control" maxlength="150"> <span class="error"><?php echo $email_error; ?></span> </div><p></p>
			<div class="form-group">
				<label>My rating for this stay is:<span class="error">*</span></label>
				<input type="radio" name="response" value="awesome">Awesome!
				<input type="radio" name="response" value="bad">Bad <span class="error"><?php echo $response_error; ?></span> </div><p></p>
			<div class="form-group">
				<input type="submit" name="submit" value="Submit" class="btn btn-info" /> </div>
		</form>
		<div>
			<?php echo $output; ?>
		</div>
	</div>
	<br /> 
</body>

</html>