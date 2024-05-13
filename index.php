<?php 

$insert = false;
if(isset($_POST['name'],$_POST['gender'])){
$server="localhost";
$username="root";
$password="";
$dbname="trip";

//making connection with database
$con = mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    echo "connection to this database failed due to".mysqli_connect_error();

}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];


// Function to validate name
function validateName($name) {
    // Remove leading and trailing whitespaces
    $name = trim($name);

    // Check if the name is empty
    if (empty($name)) {
        echo "<p class='error'>Invalid name</p>";

        return false;

    }

    // Check if the name contains only letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        echo "<p class='error'>Invalid name</p>";

        return false;
    }

    //checking gender is selected
    if (!isset($_POST["gender"])) {
        $genderErr = "Please select a gender";
        echo "<p class='error'>Invalid name</p>";

        return false;
    }

    

    return true;
}

// Function to validate age
function validateAge($age) {
    // Check if age is a non-negative integer
    $result =filter_var($age, FILTER_VALIDATE_INT) && $age >= 18;
    if($result)  return true;

    else{
         echo "<p class='error'>Invalid age</p>";
         return false;   
    }
}


// Function to validate phone number
function validatePhoneNumber($phone) {
    // Remove non-numeric characte = preg_replace("/[^0-9]/", "", $phone);
    $phone = preg_replace("/[^0-9]/", "", $phone);

    // Check if phone number has 10 digits (adjust as needed for your country's format)
    return strlen($phone) === 10;
}

// Function to check duplicate email


function checkDuplicateEmail($email,$con) {
    $checkuser = "SELECT * FROM tripp WHERE email = '$email'";
    $result = mysqli_query($con,$checkuser);
    $count = mysqli_num_rows($result);
    
    if($count!=0) {
           echo "<p class='error'>Duplicate email</p>";
           return false;
    }
    else {
        return true;}
}
// Function to check duplicate phone
function checkDuplicatePhone($phone,$con) {
    $checkuser = "SELECT * FROM tripp WHERE phone = '$phone'";
    $result = mysqli_query($con,$checkuser);
    $count = mysqli_num_rows($result);
    
    if($count>0) {
           echo "<p class='error'>Duplicate Phone</p>";
           return false;
    }
    else {
        return true;}
}
if (validateName($name) && validateAge($age) && validatePhoneNumber($phone)&& checkDuplicatePhone($phone,$con)&& checkDuplicateEmail($email,$con) ) {
    
    $sql=   "INSERT INTO `trip`.`tripp` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES 
    ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

if($con->query($sql) == true){
    $insert =true;
    //echo "Successfully inserted";
}

else{
    //echo "Error: $sql <br> $con->error";
    echo "<p class='error'>Duplicate email</p>";

}

} else {
    echo "<p class='error'>Enter valid inputs!</p>";
    
}







$con->close();
}

else{
    echo "<p class='error'>name and gender cannot be empty</p>";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to Travel From </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <img class= "bg"src="bg.jpeg" alt="JSPM RSCOE">
    <div class="container">
        <h1>Welcme to jspm rscoe</h1>
        <p>Enter your detailes and 
           submit this form to confirm 
           your paricipation</p>
        
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thankyou so much for joing us in the trip!</p>";
        }
        
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name:">
            
            <input type="text" name="age" id="age" placeholder="Enter your age:">

            
            <input type="radio" name="gender" id="gender" value="male">male
            <input type="radio" name="gender" id="gender" value="female">female
            <input type="radio" name="gender" id="gender" value="other">other

            <input type="email" name="email" id="email" placeholder="Enter your email:">
            
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone:">

            <textarea name="desc" id="desc" cols="30" rows="10"placeholder="Enter any requirments"></textarea>

            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
 
</body>
</html>