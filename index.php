<?php
include('logic.php');
if(isset($_COOKIE['game'])){
//$_SESSION['user']=$_COOKIE['game'];
echo "<h1 align='center'>Last Player = ".$_COOKIE['game'];echo "</h1>";
}
?>

<?php
if(isset($_COOKIE['game'])){?>
<Form action="logic.php" align='center' class="indexform">
	<button type="submit" name="same" value='a' class="btn" >	
	<?php echo "Continue As ".$_COOKIE['game']."";
		?>
	</button>
	<h1 > OR.</h1>
</Form>
<?php }?>

<head>
<link href="sass/css/styles.css" rel="stylesheet">
</head>
<body>

<h1 align="center"> Login As New Player.</h1>
<form  method="GET" align="center" autocomplete="off" >
	<input type="text" name="name" placeholder="New Player" required><br><br>
	<button type="submit" name="subn" value="Enter" class="btn">New Player</button><br>
</form>

</body>








