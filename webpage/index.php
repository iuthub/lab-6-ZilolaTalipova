<?php
	session_start();



$Name = isset($_SESSION["Name"])?$_SESSION["Name"]:"";
$Email = isset($_SESSION["Email"])?$_SESSION["Email"]:"";
$Username = isset($_SESSION["Username"])?$_SESSION["Username"]:"";
$Password = isset($_SESSION["Password"])?$_SESSION["Password"]:"";
$city = isset($_SESSION["city"])?$_SESSION["city"]:"";
$Pcode = isset($_SESSION["Pcode"])?$_SESSION["Pcode"]:"";
$Hphone = isset($_SESSION["Hphone"])?$_SESSION["Hphone"]:"";
$Mphone = isset($_SESSION["Mphone"])?$_SESSION["Mphone"]:"";
$CreditCard = isset($_SESSION["CreditCard"])?$_SESSION["CreditCard"]:"";
$Msalary = isset($_SESSION["Msalary"])?$_SESSION["Msalary"]:"";
$gpa = isset($_SESSION["gpa"])?$_SESSION["gpa"]:"";




$NamePattern = "/^\D{2,}$/";
$EmailPattern = "/^\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b$/";
$UsernamePattern = "/^\w{5,}$/";
$PasswordPattern = "/^\w{8,}$/";
$cityPattern = "/^[A-Z][a-z]+([ -][A-Z][a-z]+)*$/";
$PcodePattern = "/^\d{6}$/";
$HphonePattern = "/^\d{2}\s\d{7}$/";
$MphonePattern = "/^\d{2}\s\d{7}$/";
$CreditCardPattern = "/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/";
$MsalaryPattern = "/^UZS [1-9]\d{0,2}(,\d{3})*\.\d{2}$/";
$gpaPattern = "/^[0-4]{1}\.((5){1}|[0-4]{1}[0-9]{1})$/";





$isPost = $_SERVER["REQUEST_METHOD"]=="POST";
$isValid = TRUE;

if($isPost) {
	$Name = $_REQUEST["Name"];
	$Email = $_REQUEST["Email"];
	$Username = $_REQUEST["Username"];
	$Password= $_REQUEST["Password"];
	$city = $_REQUEST["city"];
	$Pcode = $_REQUEST["Pcode"];
	$Hphone = $_REQUEST["Hphone"];
	$Mphone = $_REQUEST["Mphone"];
	$CreditCard = $_REQUEST["CreditCard"];
	$Msalary = $_REQUEST["Msalary"];
	$gpa = $_REQUEST["gpa"];


	$_SESSION["name"] = $Name;
	$_SESSION["Email"] = $Email;
	$_SESSION["Username"] = $Username;
	$_SESSION["Password"] =$Password;
	$_SESSION["city"] = $city;
	$_SESSION["Pcode"] = $Pcode;
	$_SESSION["Hphone"] = $Hphone;
	$_SESSION["Mphone"] = $Mphone;
	$_SESSION["CreditCard"] = $CreditCard;
	$_SESSION["Msalary"] = $Msalary;
	$_SESSION["gpa"] = $gpa;



	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<form action="index.php" method="POST" enctype="multipart/form-data">
		<dl>
			<dt>Name</dt>
			<dd>
			   <input type="text" name="Name"  minlength="2"/>
			   <?php if($isPost && !preg_match($NamePattern, $Name)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide city.</span>
					<?php } ?>
			</dd>
			
			<dt>Email</dt>
			<dd>
				<input type="email" name="Email"/>
				<?php if($isPost && !preg_match($EmailPattern, $Email)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide right Email.</span>

				<?php } ?>
			</dd>
			<dt>Username</dt>
			<dd>
				<input text="text" name="Username"/>
				<?php if($isPost && !preg_match($UsernamePattern, $Username)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide right  form of Username.</span>

				<?php } ?>
			</dd>
			<dt>Password</dt>
			<dd>
				<input type="password" name="Password"/>
				<?php if($isPost && !preg_match($PasswordPattern, $Password)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, should contain at least 8 chars.</span>

				<?php } ?>
			</dd>

            <dt>Confirm Password</dt>
			<dd>
				<input type="password" name="Cpassword"/>
				<?php if($isPost && !($Password == $CPassword)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, Confirm Password</span>

				<?php } ?>
  
			</dd>
			

			<dt>Date</date>
			<dd>
				<input type="date" name="date" required>
				
			</dd>
			<dt>Gender</dt>
			<dd>
                Male<input type="radio" name="Gender" value="male" required/>
                Female<input type="radio" name="Gender" value="female" required/>
			</dd>
			<dt>Marital Status</dt>
			<dd>
                Single<input type="radio" name="Status" value="single" required/>
				Merried<input type="radio" name="Status" value="Married" required/>
				Divorced<input type="radio" name="Status" value="Divorced"required/>
				Widowed<input type="radio" name="Status" value="Widowed" required/>
			</dd>
			<dt>Address</dt>
			<dd><input type="text" name="address"/></dd>

			<dt>City</dt>
			<dd><input type="text" name="city"/>
			<?php if($isPost && !preg_match($cityPattern, $city)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide city.</span>
					<?php } ?>
					<dd>

			<dt>Postal Code</dt>
			<dd><input type="number" name="Pcode"/>
			<?php if($isPost && !preg_match($PcodePattern, $Pcode)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide 6 digits.</span>

				<?php } ?>
			</dd>

			<dt>Home Phone</dt>
			<dd><input type="text" name="Hphone"/>
			<?php if($isPost && !preg_match($HphonePattern, $Hphone)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide Home number.</span>

				<?php } ?>
			</dd>


			<dt>Mobile Phone</dt>
			<dd><input type="text" name="Mphone"/>
			<?php if($isPost && !preg_match($HphonePattern, $Hphone)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide Home number.</span>

				<?php } ?>
			</dd>

			<dt>Credit Card Number</dt>
			<dd><input type="text" name="CreditCard"/>
			<?php if($isPost && !preg_match($CreditCardPattern, $CreditCard)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide right credit  number.</span>

				<?php } ?></dd>
			
			<dt>Credit Card Expiry Date</dt>
			<dd><input type="date" name="CreditExpiry"/></dd>

			<dt>Monsthly Salary</dt>
			<dd><input type="text" name="Msalary"/>
			<?php if($isPost && !preg_match($MsalaryPattern, $Msalary)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide right credit  number.</span>

				<?php } ?>
			</dd>

			<dt>Web Site URL</dt>
			<dd><input type="url" name="url"/></dd>

			<dt>Overall GPA</dt>
			<dd><input type="text" name="gpa"/>
			<?php if($isPost && !preg_match($gpaPattern, $gpa)) {
					$isValid=FALSE;
					?>
					<span class="error"> Please, provide right gpa</span>

				<?php } ?>
			</dd>


			
		</dl>

		<div>
			<input type="submit" name="register" value="Register" />
		</div>
		
	</form>
	<?php if ($isPost && $isValid) {
			header("Location: FinishedPage.php", TRUE, 301);
		} ?>
	</body>
</html>