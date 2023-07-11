<?php
//Check if the form is submitted
  if(isset($_POST['firstname'])) {

   //Connect to the database
  $hostname = "localhost";
  $username = "riasec";
  $password = "gaurav1996";

  // Create connection
  $con = mysqli_connect($hostname, $username, $password);

if (!$con) {
	die("connection to this database failed" . mysqli_connect_error());
      }
      else{
   echo "Success connecting to the db lalalal ";
      }
  $firstname= $_POST['firstname'];
  $middlename=$_POST['middlename'];
  $lastname=$_POST['lastname'];
  $dob=$_POST['dob'];
  $education=$_POST['education']; 
  $gender=$_POST['gender'];
  $state=$_POST['state'];
  $district=$_POST['district'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
$sql= "INSERT INTO holland.riasec (`firstname`, `middlename`, `lastname`, `dob`, `gender`, `education`, `state`, `district`, `contact`, `email`) VALUES ('$firstname', '$middlename', '$lastname', '$dob', '$gender', '$education', '$state', '$district', '$contact', '$email');";
 echo $sql;

 if($con->query($sql)==true){
	echo "successfully inserted";
		header("Location: riasec.html");
	exit;
 }
else{
	echo "Error:$sql<br>$con->error";

}
$con->close();

}
?>
<!DOCTYPE html>
<html lang=en>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>Personal Information Form</title>
	<style>
			form {
			margin: 20px auto;
			max-width: 500px;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-family: Arial, sans-serif;
		}
		
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		
		input[type=text], input[type=date], select , input[type=number], input[type=tel],input[type=email]{
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 20px;
			box-sizing: border-box;
			font-size: 16px;
		}
		
		input[type=submit] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
		}
		
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>

	<h2>Personal Information</h2>
    

	<form action="connect.php" method="post">
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname" required><br><br>

		<label for="middlename">Middle Name:</label>
		<input type="text" id="middlename" name="middlename"><br><br>

		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname" required><br><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob" required min="1940-01-01" max="2030-01-01"><br><br>
		
		<label for="education">Education:</label>
		<select id="education" name="education" required>
		<option value="">Select</option>
		<option value="8th">8th</option>
		<option value="10th">10th</option>
		<option value="12th">12th</option>
		<option value="ITI">ITI</option>
		<option value="Diploma">Diploma</option>
		<option value="Under-graduate">Under-graduate</option>
		<option value="Post-graduate">Post-graduate</option>
		</select><br><br>
		
		<label for="gender">Gender:</label>
		<select id="gender" name="gender" required>
			<option value="">Select</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		</select><br><br>



		<label for="state">State:</label>
		<input type="text" id="state" name="state" required><br><br>

		<label for="district">District:</label>
		<input type="text" id="district" name="district" required><br><br>

		<label for="contact">Contact No.:</label>
		<input type="tel" id="contact" name="contact" required><br><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>

		<input type="submit" value="Submit">
	</form>

</body>
<script>
	// Select the form element
const form = document.querySelector('form');

// Listen for the form submission event
form.addEventListener('submit', (e) => {
  e.preventDefault(); // Prevent the form from submitting normally
  
  // Get the form data
  const formData = new FormData(form);

  fetch('connect.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.text();
  })
  .then(data => {
    // Redirect the user to the success page
    window.location.href = 'riasec.html';
  })
  .catch(error => {
    console.error('There was an error submitting the form:', error);
  });
  
  // Convert the form data to a plain object
  const data = {};
  for (let [key, value] of formData.entries()) {
    data[key] = value;
  }
  
  // Save the form data to local storage
  localStorage.setItem('formData', JSON.stringify(data));
  
  // Redirect the user to the success page
  window.location.href = 'riasecg.html';
});

</script>
</html>
<!--INSERT INTO `trip` (`sno`, `firstname`, `middlename`, `lastname`, `dob`, `gender`, `education`, `state`, `district`, `contact`, `email`, `dt`) VALUES ('1', 'gaurav', 's', 'dave', '14-04-1996', 'male', 'highschool', 'gujarat', 'anand', '9408866967', 'gauravsdave1996@gmail.com', current_timestamp());-->
