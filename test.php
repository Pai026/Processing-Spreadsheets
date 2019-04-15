  <?php
  require ('excel_reader.php');
  
  $xlsx= new PhpExcelReader;
  $xlsx->read('hello.xls');
  


  function sheetData($sheet){
  	$servername = "localhost";
$username = "root";
$password= "";
$dbname = "master";
  	$conn =new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn_error);
}
  $x=2;
  while($x <= $sheet['numRows']){
  $stmt = $conn->prepare("INSERT INTO product (SKU,ASIN,PRICE,Quantity) VALUES (?,?,?,?)");
  $stmt->bind_param("ssii", $sheet['cells'][$x][1],$sheet['cells'][$x][2],$sheet['cells'][$x][3],$sheet['cells'][$x][4]);
  $stmt->execute();
  $x++;
}
}
 /*else
 {  $x=2;
	 while($x <= $sheet['numRows']){
  $stmt = $conn->prepare("INSERT INTO product_details (Product_ID,Price,Quantity) VALUES (?,?,?)");
  $stmt->bind_param("sii", $sheet['cells'][$x][1],$sheet['cells'][$x][2],$sheet['cells'][$x][3]);
  $stmt->execute();
  $x++; 	
 }
}
*/$nr_sheets = count($xlsx->sheets);
  for($i=0; $i<$nr_sheets; $i++){
  		sheetData($xlsx->sheets[$i]);
  }
  ?>