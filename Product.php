<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product</title>
</head>

<body>
<?php
	$con=mysqli_connect("localhost", "root", "","online_shop") or die("Cannot connect to
server.".mysqli_error($con)); 
if(isset($_POST["Submit"])){
	$Product_name = $_POST["pname"];
	$Product_Prices= $_POST["pprices"];
	$UOM= $_POST["UOM"];
	$Color= $_POST["color"];
	$design= $_POST["Design"];
	$Brand= $_POST["Brand"];
	$Discrption=$_POST["dproduct"];
	if($_FILES["Image"]["error"]==4){
		//check whether it is exits or not the image
     echo 
		 "<script>alert ('Image Does not exits')</script>;"
		 ;
		
	}
	
	else{
		$filename= $_FILES["Image"]["name"];
		$filesize= $_FILES["Image"]["size"];
		$Tempname= $_FILES["Image"]["tmp_name"];
		$validimageExtansion=['jpg','jpeg','png'];
		$ImageExtansion= explode('.',$filename);
		$ImageExtansion= strtolower(end($ImageExtansion));
		
		if(! in_array($ImageExtansion,$validimageExtansion)){
			// check image extansion/ format like  jpeg,png 
			echo
				"<script> alert('invalid image extansion' );</script>"
				;
		
		}
		elseif($filesize >1000000){
			// check image size
			echo 
				"<script>alert('Image Size to large');</script>"
				;
		}
		else
		{
			$newimagename=uniqid(); //special id will create for the image save folder.
			$newimagename .='.'.$ImageExtansion;
			move_uploaded_file($Tempname,'Photo/'.$newimagename);// Image will be uplode into folder
			
			$insert_sql="INSERT INTO product VALUES ('null', '$Product_name', '$Product_Prices','$Discrption', '$newimagename','$UOM','$Color','$Brand','$design')";// sql stament
          $sql_result =mysqli_query($con,$insert_sql) or die("Error in inserting data due to
".mysqli_error()); //mysql query will check the database connection and Sql Statment
			if($sql_result)
             echo "Succesfully insert new data.";
              else
               echo "Error in inserting new data"; 

			
		}
	}
}
	?>
</body>
</html>