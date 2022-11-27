<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<link rel="stylesheet" href="Stylee_Admin.css">
</head>

<body>
	<ul>
  <li><a class="active" href="Index.html">Admin</a></li>
  <li><a href="Add_Product.html">Add Product</a></li>
  <li><a href="View.php">View Product</a></li>
  <li><a href="#about">Order</a></li>
  <li><a href="Customer.php">Customer Details</a></li>
 <li><a href="#about">Sgin out</a></li>
</ul>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Number</th>
	  <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Prices RM</th>
      <th scope="col">Product Descrption</th>
	  <th scope="col">Product Image</th>
	  <th scope="col"> UOM</th>
	  <th scope="col">Color</th>
	  <th scope="col">Design</th>
	  <th scope="col">Brand</th>
    </tr>
  </thead>
  <tbody>
<?php
		$con=mysqli_connect("localhost", "root", "","Online_shop") or die("Cannot connect to
server.".mysqli_error($con)); 
		
		$i =1;
		$rows= mysqli_query($con,"SELECT * FROM product ORDER BY Product_ID");
		?>
		<?php foreach($rows as $row): ?>
		<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $row["Product_ID"] ?></td>
		<td><?php echo $row["Product_Name"];?></td>
		<td><?php echo $row["Product_Prices"];?></td>
		<td><?php echo $row["Product_Descrption"];?></td>
   <td><img src="Photo/<?php echo $row["Product_Photo"];?>" width="200" height="120" title="<?php echo $row["Product_Photo"];?>"></td>
		<td><?php echo $row["UOM"];?></td>
		<td><?php echo $row["Color"];?></td>
		<td><?php echo $row["Material"];?></td>
		<td><?php echo $row["Design"];?></td>
		<td>
			<form action="edit_product.php" method="post">
			<input type="hidden" name="edit_product" value="$row["Product_ID"]">
			<button type="submit" name="Edit_Product" class="btn-success">Edit</button>
			</form>
			
			</td>
		<?php endforeach;?>
		</tr>
	
    
    
  </tbody>
</table>
</div>
	

	


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	
</body>
</html>