<?php
 session_start();
 include("conn.php");
 $ud=$_SESSION['unumber'];
 $sql="select * from info where aadhaar='$ud'";
 $data=mysqli_query($conn,$sql);
 $result=mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="CSS/profile.css">
</head>
<body>
    <div class="both">
        <div class="h" >
            <h1 class="heading">Online Voting System</h1>
            <form action="" method="POST">
                           <input  class="bt" type="submit" name="btn"value="Logout">
                            </form>
                           <?php
                           if(isset($_POST['btn']))
                           {
                            include('conn.php');
                            session_unset();
                            // echo " <h1> <font color='green' align='center'> Logut successfully</h1>";
                            header('refresh:3; url=loginhtml.php');
                            }
                             ?>
        </div >
        <div class="profile">
            <table class="table">
                <tr>
                    <td >
                        <div class="first">
                            <p><b>Name</b> :<?php echo $result['name'];?></p>
                            <p><b>UID</b> :<?php echo $result['AADHAAR'];?></p>
                            <p><b>D.O.B</b> :<?php echo $result['dob'];?></p>
                            <p><b>State</b> :<?php echo $result['state'];?></p>
                            <p><b>city</b> :<?php echo $result['city'];?></p>
                            <p><b>Address</b> :<?php echo $result['address'];?></p>
                            <p><b>Status</b> :<?php $st=$result['status'];
                               if($st==1){ echo" <font color='green'>Voted";
                                   }else { echo" <font color='red'> Not Voted";
                                         } ?></p>
                        </div> 
                    </td>
                    <td >
                        <div class="second">
                            <div class="bjp">
                                <table>
                                    <tr>
                                        <td><h3>BJP</h3></td>
                                        <td><img src="pic/bjp.png" class="bjplogo"></td>
                                        <td><form method="POST"><input class="sub" name="bjp" type="submit" value="Vote"></form>
                                         <?php 
                                          include('conn.php');
                                          if(isset($_POST['bjp']))
                                           {
                                             $sql="insert into bjp(votes) values(5)";
                                             if(mysqli_query($conn,$sql))
                                             {
                                                $tem=$result['AADHAAR'];
                                                $sql1="update info set status=1 where  AADHAAR='$tem'";
                                                if(mysqli_query($conn,$sql1))
                                                {
                                                    header('refresh:1; url=profile.php');
                                                }
                                             }

                                           }
                                         ?>
                                       </td>
                                    </tr>
                                   
                                    
                                </table>
                                <div class="cong">
                                    <table>
                                        <tr>
                                            <td><h3>CON</h3></td>
                                            <td><img src="pic/cog.png" class="conglogo"></td>
                                            <td><form method="POST"><input class="sub" name="cong" type="submit" value="Vote">
                                            <?php 
                                              include('conn.php');
                                              if(isset($_POST['cong']))
                                              {
                                               $sql="insert into congress(votes) values(5)";
                                               if(mysqli_query($conn,$sql))
                                                 {
                                                    $tem=$result['AADHAAR'];
                                                    $sql1="update info set status=1 where  AADHAAR='$tem'";
                                                    if(mysqli_query($conn,$sql1))
                                                    {
                                                        header('refresh:1; url=profile.php');
                                                    }
                                                  }

                                               }
                                            ?>
                                            </td>
                                        </tr>
    
                                    </table>
                                </div>
                                <div class="sp">
                                    <table>
                                        <tr>
                                            <td><h3>S P</h3></td>
                                            <td><img src="pic/sp.png" class="splogo"></td>
                                            <td><form method="POST"><input class="sub" name="sp" type="submit" value="Vote"></form>
                                            <?php 
                                                   include('conn.php');
                                                   if(isset($_POST['sp']))
                                                   {
                                                        $sql="insert into sp(votes) values(5)";
                                                        if(mysqli_query($conn,$sql))
                                                        {
                                                          $tem=$result['AADHAAR'];
                                                          $sql1="update info set status=1 where  AADHAAR='$tem'";
                                                          if(mysqli_query($conn,$sql1))
                                                          {
                                                            header('refresh:1; url=profile.php');
                                                          }
                                                        }

                                                   }
                                            ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div>
                                    <table>
                                        <tr>
                                            <td><h3>BSP</h3></td>
                                            <td><img src="pic/bsp.png" class="bsplogo"></td>
                                            <td><form method="POST"><input class="sub"  name="bsp"type="submit" value="Vote"></form>
                                            <?php 
                                                 include('conn.php');
                                                if(isset($_POST['bsp']))
                                                {  
                                                    $sql="insert into bsp(votes) values(5)";
                                                    if(mysqli_query($conn,$sql))
                                                    {
                                                        $tem=$result['AADHAAR'];
                                                        $sql1="update info set status=1 where  AADHAAR='$tem'";
                                                        if(mysqli_query($conn,$sql1))
                                                        {
                                                            header('refresh:1; url=profile.php');
                                                        }
                                                     }

                                                }
                                           ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <?php  
    $json = json_encode($st);
    ?>
    <script type="text/javascript">
                 var st=<?=$json?>;
                 var element = document.getElementsByClassName("sub");
                 if(st==1){
                 for(var i=0; i<element.length;i++)
                 {
                     element[i].disabled=true;
                 }
                }
             </script>
</body>
</html>