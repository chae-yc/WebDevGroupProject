<!DOCTYPE html>

<html >

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Sing up</title>
	<!-- for Jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	 crossorigin="anonymous"></script>
		
	<!-- for datepicker -->
	<!-- jQuery UI CSS파일  -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />  
	<!-- jQuery 기본 js파일 -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
	<!-- // jQuery UI 라이브러리 js파일 -->
	<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>  
	<!-- css -->
	<link rel="stylesheet" href="../css/register.css" type="text/css" />  
	<!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body data-gr-c-s-loaded="true">

<?php
	// define variables and set to empty values
	$IDErr = $pwdErr = $emailErr = $dateErr = "";
	$ID = $pwd = $email = $date = "";

	$complete = 1;//true

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["name_text"])) {
			$IDErr = "ID is required";
			$complete = 0;
		} else {
			$ID = test_input($_POST["name_text"]);
			// check if name only contains letters and whitespace
			if (!preg_match('/^[a-zA-Z0-9]+$/',$ID)) {
				$IDErr = "Only letters and numbers are allowed";
				$complete = 0;
			}
		}
		
		if (empty($_POST["pwd_text"])) {
			$pwdErr = "pwd is required";
			$complete = 0;
		} else {
			$pwd = test_input($_POST["pwd_text"]);
		}
		
		if (empty($_POST["email_text"])) {
			$emailErr = "Email is required";
			$complete = 0;
		} else {
			$email = test_input($_POST["email_text"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$complete = 0;
			}
		}
		
		if (empty($_POST["date"])) {
			$dateErr = "day is required";
			$complete = 0;
		} else {
			$date = test_input($_POST["date"]);
		}
		
		
		if($complete){
			
			try{
				$host = "localhost";
				$user = "root";
				$DBpwd = "";
				$db = "webca";

				$conn = new PDO("mysql:host=$host;dbname=$db",$user,$DBpwd);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$birth = substr($date,6,4)."-".substr($date,3,2)."-".substr($date,0,2) ;

				$sql = "INSERT INTO users (ID, pwd, email,birth)
				VALUES ('".$ID."', '".$pwd."', '".$email."','".$birth."')";

				$conn->exec($sql);
				//alert and close the tab
				echo ("<script language=javascript> alert('Thank you for singing up');</script>");
				echo ("<script language=javascript> close();</script>");
				
			}
			catch(PDOException $e){
				$errMessage = "". $e->getMessage();
				//echo $errMessage;
				if(strstr($errMessage,"PRIMARY"))
					$IDErr = "Your ID already is being used : ";
				if(strstr($errMessage,"email"))
					$emailErr = "Your email already is being used: ";
			}
			
			$conn = null;
			
		}
		else 
			echo "<h1>Please, check your form</h1>";
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
	<div id="registerWin" align="center">
	
	
		<form class="modal-content animate" name="personal_info" id="registerForm"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<h1>Join Us!</h1>
			<table align="center" border="0">
				<tbody>
					<tr>
						<td class="name">
							ID:
						</td>
						<td class="data">
							<input type="text" name="name_text" id="name_text" width="20" maxlength="40" size="20" value="<?php echo $ID;?>" required>
							<span class="error">* <?php echo $IDErr;?></span>
						</td>
					</tr>
					<tr>
						<td class="name">
							Password :
						</td>
						<td class="data">
							<input type="text" name="pwd_text" id="pwd_text" width="20" maxlength="40" size="20" value="<?php echo $pwd;?>">
							<span class="error">* <?php echo $pwdErr;?></span>
						</td>
					</tr>
					<tr>
						<td class="name">
							E-mail address:
						</td>
						<td class="data">
							<input type="text" name="email_text" id="email_text" width="20" maxlength="40" size="20" value="<?php echo $email;?>">
							<span class="error">* <?php echo $emailErr;?></span>
						</td>
					</tr>
					<tr>
						<td class="name">
							Date of Birth (DD/MM/YYYY):
						</td>
						
						<td class="data">
								<input type="text" name = "date" id="testDatepicker" readonly='true' value="<?php echo $date;?>">  
								<span class="error">* <?php echo $dateErr;?></span>
						</td>
						
					</tr>
				</tbody>
			</table>

			<div class="wrapper">
				<button class="btn btn-success" onclick="register()">Submit</button>
			</div><br>
			
		</form>
	</div>
	<script src ="../js/register.js"></script>  

</body>


</html>