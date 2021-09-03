<?php 
session_start();
	$pid=$_GET['pid'];
	$cd=date("d-m-y");
	include ("connect.php");
	if($pid==1) //sign in
	{
		if(isset($_POST['submit']))
		{
			$email=$_POST['email'];
			$pass=$_POST['password'];
			$sql=mysqli_query($con,"select * from login where email='$email' and password='$pass'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql)>0)
			{
				$_SESSION['uid']=$email;
				header('location:index.php');
			}
			else
			{
				$_SESSION['msg']="Invalid email/password!!";
				header('location:login.php');
			}
		}
	}

	if($pid==2) //sign up 
	{
		if(isset($_POST['submit']))
		{
			$pass=$_POST['password'];
			$email=$_POST['email'];
			
			$sql1=mysqli_query($con,"select * from login where email='$email'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql1)>0)// when already a member
			{
				$_SESSION['msg']="Already registered!!";	
			} 
			else // sign up 
			{	
			$sql2=mysqli_query($con,"insert into login (name,email,password,gender) values('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[gender]')")or die('Error:- '.mysqli_error($con));
			$_SESSION['msg']="Successully registered!!"; 
			$_SESSION['uid']=$email;           
			
			}
			
			header('location:signup.php');
		}
	}
	if($pid==3)
	{
		unset($_SESSION['uid']) ;
		header('location:index.php');
	}
	if($pid==4)
	{
		if(isset($_POST['submit']))
		{
			
			$file_name=$_FILES["img"]["name"];
			if($file_name!="")
			{
				$file_location=$_FILES["img"]["tmp_name"];
			  $ext=end(explode('.', $file_name));
			  $num=rand(100000,999999);
			$img=$num."."."$ext";
			$upload_path="image/".$img;
					move_uploaded_file($file_location,$upload_path);
		
			$sql=mysqli_query($con,"insert into product(name,address,contact,year,pname,detail,cat,image,price) values ('$_POST[name]','$_POST[add]','$_POST[cno]','$_POST[year]','$_POST[pname]','$_POST[detail]','$_POST[cat]','$img','$_POST[price]')")or die('Error:- '.mysqli_error($con));
			//header('location:detail.php');
			$_SESSION['msg']="Record saved !!!";
			header('location:index.php');
			}
			
		}
	}

	if($pid==5) //sign up 
	{
		if(isset($_POST['submit']))
		{
			$val=$_POST['item'];
			$sql=mysqli_query($con," SELECT *  FROM product WHERE pname LIKE '%$val%';")or die('Error:- '.mysqli_error($con));
			header("location:item.php?val=$val");
		}

	}

?>
