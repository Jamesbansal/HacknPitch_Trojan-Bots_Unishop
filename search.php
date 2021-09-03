<?php 
    session_start();
    if(isset($_GET['sear']))
    {
    	$searchitem=$_GET['sear'];
    	$sql=mysqli_query($con,"select * FROM product where name='$searchitem'")or die('ERROR'.mysqli_error($con));
    	
    }
	$searchitem=$_GET['sear'];
	$cd=date("d-m-y");
	include ("connect.php");
    $query="select * FROM product where name='$searchitem'"
    $result=mysqli_query($query);

    while($a=mysql_fetch_object($result)){
        ?>
        <br><br><br>
        <table>
            <tr>
                <td><?php echo $a->sno;?> </td>
                <td><?php echo $a->name;?> </td>
            </tr>    

    }
?>