 <?php
$servername = "localhost";
$username = "root";
$password= "";
$dbname = "master";
  	$conn =new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn_error);
}
$result=mysqli_query($conn,"CREATE View finalresult AS SELECT product_details.Product_ID,product.SKU,product.ASIN,product_details.Price AS Base_Price,product_details.Quantity  FROM product,product_details WHERE product_details.Product_ID=SUBSTR(product.SKU,1,8) ORDER BY product_details.Product_ID");
?>