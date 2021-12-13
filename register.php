<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="CSS/registeter.css">
</head>
<body>
    <h1 style="border: 5px solid green; background-color: green;text-align: center;">Online Voting System</h1>
    <div class="register">
       <h2>Registration</h2>
       <form class="form" action="" method="POST">
           <input type="text" name="name" id="name" placeholder="Name"autocapitalize="on" required pattern="[A-Z a-z]{3,}" tiltle="Name should be minmum 3 alphbatic">
           <input type="tel" name="uid" id="uid" placeholder="Aadhar Number" required pattern="[0-9]{12}" title="Input 12 uid number" maxlength="12">
           <input type="text" name="state" id="state" placeholder="State" autocapitalize="on" required pattern="[A-Z a-z]{}">
           <input type="text" name="city" id="city" placeholder="city" autocapitalize="on" required pattern="[A-Z a-z]{}">
           <input type="date" name="dob"  id="dob" placeholder="Date of birth" required>
           <input type="text" name="address" id="address" placeholder="Addresss"autocapitalize="on" required>
           <input type="password" name="password" id="pass" placeholder="Password" required>
           <input type="password" name="cpassword" id="cpass" placeholder="Confirm Password" required><br><br>
           <span  id="message" style="color:red"></span><br><br>
        <input class="btn" type="submit" name="submit" value="Register" onclick="return Validate()">
       </form>

    </div>
</body>
<?php 
include("conn.php");
if(isset($_POST['submit']))
{
$name= $_POST['name'];
$uid= $_POST['uid'];
$state= $_POST['state'];
$city= $_POST['city'];
$dob= $_POST['dob'];
$add= $_POST['address'];
$pw= $_POST['password'];

$sql ="insert into INFO(name,aadhaar,state,city,dob,address,password) values('$name','$uid','$state','$city','$dob','$add','$pw')";
if(mysqli_query($conn,$sql))
{
   echo"<h3 align='center'><font color='green'>Sucessfully Registered<h3>";
   header('refresh:3;url=loginhtml.php');
}else
{
    echo"error:".$sql.mysqli_error($conn);
}
}
mysqli_close($conn);
?>
<script type="text/javascript">
    function Validate() {
        var pw = document.getElementById("pass").value;
        var today= new Date();
        var year=today.getFullYear();

        var t= new Date(document.getElementById("dob").value);
        var y=t.getFullYear();
        var age=0;
        age=year-y;
        if(age<18)
        {
          alert("enter valid Date of Birth");
          return false;
        }
        //check empty password field  
  if(pw == "") {  
     document.getElementById("message").innerHTML = "**Fill the password please!";  
     return false;  
  }  
   
 //minimum password length validation  
  if(pw.length < 8) {  
     document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
     return false;  
  }  
  
//maximum length of password validation  
  if(pw.length > 15) {  
     document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  } else {  
    var confirm_password = document.getElementById("cpass").value;
        if (pw != confirm_password) {
          document.getElementById("message").innerHTML = "**Password doesn't match";
            return false;
        }
        return true; 
  } 
        
    }
</script>
</html>