<?php include("header.php");

if($_SESSION["flag"]==1)
{
    $sql=mysqli_query($con,"SELECT * from login  where username='$_SESSION[uid]' ")or die('ERROR'.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);
}


?>

<br> <br> <br>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
          <div style="margin:10px;" class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <form action="action.php?pid=7" method="POST" name="form">
                <div class="col-md-4 mt-1"><img  style="border-radius: 8px; ;   " class="img-fluid img-responsive rounded product-image" src="images/pro.png"></div>
                <br>
                <br>
                <br>
                <br>
                <div class="col-md-6 mt-1">
                      <h1 style="color:white">NAME: <?php echo $rs[1];?></h1>
                      <br><br>
                      <h3 class="mt-1 mb-1 spec-1" ><span style="color:white">Username: </span><span class="dot"></span><span style="color:white"><?php echo $rs[1]; ?></span><span class="dot"></span></h3>
                     
                      <h3 class="mt-1 mb-1 spec-1" ><span style="color:white">University: </span><span class="dot"></span><span style="color:white"><?php echo $rs[6]; ?></span><span class="dot"></span></h3>
                     
                      <h3 class="mt-1 mb-1 spec-1" ><span style="color:white">Gender: </span><span class="dot"></span><span style="color:white"><?php echo $rs[4]; ?></span><span class="dot"></span></h3>
                      
                      <h3 style="color:white" class="text-justify text-truncate para mb-0"><span style="color:white">Phone: </span><?php echo $rs[5];?> <br><br></h3>
                      <br>
                      <div>
                        <span class="mt-1 mb-1 spec-1"  ><a href="seller.php" action="seller.php"><button type="submit" class="btn btn-primary btn-md"  name="submit" value="submit" >Items You are Selling  <img src="images/s.png" alt="" width="25" height="25"/></button></a> </span>
                  </div>
                </div>
               
              
            </form>
           
            </div>


          </div>
    </div>
</div>
<?php include("footer.php"); ?>
