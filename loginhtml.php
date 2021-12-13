<?php
 session_start();
 include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="CSS/loginstyle.css">
</head>

<body>
    <div class="both">
        <div class="h" >
            <h1 class="heading">Online Voting System</h1>
        </div>
        <div class="h1">
            <table class="table1">
                <tr>
                    <td> <div class="party">
                        <table class="table">
                       <tr>
                               <td><div class="bjplogo">
                                   <center><h3>BJP</h3></center>
                                  <center><img src="pic/bjp.png" alt="bjp" class="bjp" > </center>
                                  <center><h4>Votes :
                                  <?php
                                    include("conn.php");
                                    $sql="select votes from bjp";
                                    $data=mysqli_query($conn,$sql);
                                    $total=mysqli_num_rows($data);
                                    $result=mysqli_fetch_assoc($data);
                                    echo $total;
                                  ?>
                                  </h4></center>
                               </div>
                           </td>
                           <td><div class="conglogo">
                               <center><h3>CONGRESS</h3></center>
                              <center><img src="pic/cog.png" alt="cong" class="cong" > </center>
                              <center><h4>Votes :
                              <?php
                                    include("conn.php");
                                    $sql="select votes from congress";
                                    $data=mysqli_query($conn,$sql);
                                    $total=mysqli_num_rows($data);
                                    $result=mysqli_fetch_assoc($data);
                                    echo $total;
                                  ?>
                              </h4></center>
                           </div>
                             </td>
                       </tr>
                       <tr>
                               <td><div class="splogo">
                                   <center><h3>SP</h3></center>
                                  <center><img src="pic/sp.png" alt="sp" class="sp" > </center>
                                  <center><h4>Votes :
                                  <?php
                                    include("conn.php");
                                    $sql="select votes from sp";
                                    $data=mysqli_query($conn,$sql);
                                    $total=mysqli_num_rows($data);
                                    $result=mysqli_fetch_assoc($data);
                                    echo $total;
                                  ?>
                                  </h4></center>
                               </div>
                             </td>
                           <td><div class="bsplogo">
                               <center><h3>BSP</h3></center>
                              <center><img src="pic/bsp.png" alt="bsp" class="bsp" > </center>
                              <center><h4>Votes :
                              <?php
                                    include("conn.php");
                                    $sql="select votes from bsp";
                                    $data=mysqli_query($conn,$sql);
                                    $total=mysqli_num_rows($data);
                                    $result=mysqli_fetch_assoc($data);
                                    echo $total;
                                  ?>
                              </h4></center>
                           </div>
                           </td>
                       </tr>
                        </table>  
                       </div></td>
                    <td><div class="loginbox">
                        <img src="pic/logo.png"  class="log" alt="logo">
                        <form class="f" action="" method="POST">
                        <input type="tel" name="uid" id="phone" placeholder="Aadhar number" pattern="[0-9]{12}" required><br><br>
                        <input type="password" name="password" id="password" placeholder="Password" required><br><br>
                        <input class="btn" type="submit" name="submit" value="Login"><br><br>
                        <p class="p">Not registered?<a href="register.php" class="link">Register here</a></p>
                        </form>
                        
                        </div>
                    </td>
                </tr>
 
            </table>
        </div>
       
</div>
</body>
<?php
if (isset($_POST['submit']))
{
   $u=$_POST['uid'];
   $p=$_POST['password'];
   $sql="select * from info where aadhaar='$u' and password='$p'";
   $data=mysqli_query($conn,$sql);
   $total=mysqli_num_rows($data);
   echo $total;
   if($total==1)
   {
    $_SESSION['unumber']=$u;
    header('location:profile.php');

   }else
   {
    echo"wrong input";
   }
}
?>
</html>
