<?php session_start();
if (!$_SESSION["email"]){
	header("location:form-login.php");
}else {

include("connect.php");
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สมาชิก</title>
</head>
	<style>
		body{
			text-align: center;
		}
		table, td, th{
			border: 1px solid black;
			margin-bottom: 2%;
		}
	</style>
<body>
	<h2>รายชื่อสมาชิก</h2>
	<table align="center">
		<tr>
			<th>ชื่อสมาชิก</th>
			<th>รหัสผ่าน</th>
			<th>ลบสมาชิก</th>
		</tr>
		<?php
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		?>
		<tr>
    		<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["password"]; ?></td>
			<td>
				<form action="php-delMember.php" method="post" target="_blank">
					<button type="submit" value="<?php echo $row["email"]; ?>" name="user">ลบสมาชิก</button>
				</form>
			</td>
  		</tr>
		<?php }
			} else {
    			echo "0 results";
		} ?>
	</table>
</body>
<a href="form-cart.php">ย้อนกลับ</a> <br><br>
</html>
<?php $conn->close(); } ?>
