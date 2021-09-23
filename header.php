<?php
require_once 'vendor/autoload.php';

   $client = new Google_Client();
   $client->setClientId('422870873248-6m99rqio3hrd2lfdcrsue2s93aimvpb5.apps.googleusercontent.com');
   $client->setClientSecret('pQCxDtlfC-w2t0SYyGbOU_S-');
   $client->setRedirectUri('http://localhost/ecommerce/index.php');
   $client->addScope('email');
   $client->addScope('profile');
   session_start();



   $_SESSION['flag']=0;
   include("connect.php");

   if(isset($_GET['code'])){
      $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
      if(!isset($token['error'])){
          $client->setAccessToken($token['access_token']);
          $_SESSION['access_token']=$token['access_token'];
          $google_service=new Google_Service_Oauth2($client);
          $data=$google_service->userinfo->get();
          $gender=NULL;
          $username=NULL;
          $pass=NULL;
          $name=NULL;
          if(!empty($data['given_name'])){
              $_SESSION['user_first_name']=$data['given_name'];
          }
          if(!empty($data['family_name'])){
             $_SESSION['user_last_name']=$data['family_name'];
             $name=$_SESSION['user_first_name']. ' '. $_SESSION['user_last_name'];
         }

         if(!empty($data['email'])){
            $_SESSION['email']=$data['email'];
            $username=$_SESSION['email'];
        }




        $sql1=mysqli_query($con,"select * from login where username='$username'")or die('Error:- '.mysqli_error($con));
            if(mysqli_num_rows($sql1)>0)// when already a member
            {
               $rs=mysqli_fetch_array($sql1);
               $_SESSION['msg']="Already registered!!";
               $_SESSION['uid']=$rs[2];
               $_SESSION['uni']=$rs[6];
               $_SESSION['flag']=1;
               header('location:index.php');
            }
            else // sign up
            {
               
               header("location:signup.php?name=".$name."&username=".$username);
            }
      }
   }
   if(isset($_SESSION['uid']))
   {
      $username=$_SESSION['uid'];
      $sql1=mysqli_query($con,"select * from login where username='$username'")or die('Error:- '.mysqli_error($con));
      $rs=mysqli_fetch_array($sql1);
      $name=$rs[1];
      $_SESSION['flag']=1;
   }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>UniShop - Your one stop for buying and selling all you need. </title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <!--bootstrap css-->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="css/animate-wow.css">
      <!--main css-->
      <link rel="stylesheet" href="css/style2.css">

      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <link rel="stylesheet" href="css/slick.min.css">
      <!--responsive css-->
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
      <link rel="stylesheet" href="css/bootstrap-social.css">

   </head>
   <body>
      <header id="header" class="top-head">
         <!-- Static navbar -->
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-2 col-sm-12 left-rs">
                     <div class="navbar-header">
                        <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="navbar-brand"><img src="images/Unilogo.png" alt="" /></a>
                     </div>
                  </div>
                  <div class="col-md-10 col-sm-12">
                     <div class="right-nav">
                        <div class="login-sr">
                           <div class="login-signup">
                              <ul>
                                <?php if($_SESSION["flag"]==1) { ?>
                                 <li><a href="action.php?pid=3" class="custom-b">Logout</a></li>
                              <?php }  else { ?>
                                 <li><a href="login.php" class="custom-b">Login</a></li>
                                 <li><a class="custom-b" href="signup.php">Sign up</a></li>
                              <?php } ?>
                              </ul>
                           </div>
                        </div>
                        
                       <div class="nav-b hidden-xs">
                           <div class="nav-box">
                              <ul>
                                 <li> <a data-toggle="modal" data-target="#myModal" href="#"> <span></span><?php if($_SESSION["flag"]==0){ ?> <img src="images/uni.png" alt="" width="45"  height="45"/><?php } if($_SESSION["flag"]==1){ if($_SESSION["uni"] == "DSCE"){?><img src="images/dsceflag.png" alt="" /><?php } else if( $_SESSION["uni"]=="BIT") {?> <img src="images/bitlogo.png" alt="" width="45"  height="45"/> <?php } else { ?> <img src="images/jadavpur.png" alt="" width="45"  height="45"/><?php } if($_SESSION["flag"]==1){echo $_SESSION["uni"];} }?></a> </li>
                              </ul>
                           </div>
                        </div>
                        <?php if($_SESSION["flag"]==1) { ?>
                           <div class="nav-b hidden-xs">
                              <div class="nav-box">
                                 <ul>
                                    <li><img src="images/wlist.png" alt="" width="40" height="40"/><a href="wishlist.php">Wishlist</a></li>

                                 </ul>
                              </div>

                           </div>

                         

                        <div class="nav-b hidden-xs">
                           <div class="nav-box">
                              <ul>
                                 <li><img src="images/how.png" alt="" width="40" height="40"/><a href="howitworks.php">How it works</a></li>

                              </ul>

                           </div>

                        </div>
                        <div class="nav-b hidden-xs">
                           <div class="nav-box">
                              <ul>
                                 <li><img src="images/ppic.png" alt="" width="40" height="40"/><a href="profile.php">Welcome <?php echo $name ?></a></li>

                              </ul>
                           </div>

                        </div>
                      


                   <?php } ?>
                     </div>
                  </div>

               </div>
            </div>

            <!--/.container-fluid -->
         </nav>
      </header>
      <!-- Modal -->
       <div class="modal fade lug" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change</h4>
               </div>
               <div class="modal-body">
                  <ul>
                     <li><a href="#"><img src="images/dscelogo.png" alt="" /> DSCE</a></li>
                     <li><a href="#"><img src="images/bitlogo.png" alt="" /> BIT </a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>

      <div id="sidebar" class="top-nav">
         <ul id="sidebar-nav" class="sidebar-nav">
            <li><a href="#">Help</a></li>
            <li><a href="howitworks.html">How it works</a></li>
            <li><a href="#">chamb for Business</a></li>
         </ul>
      </div>
