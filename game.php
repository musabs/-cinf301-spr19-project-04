<?php
include('logic.php');
?>
<link rel="stylesheet"  href="sass/css/styles.css">

<script>
function f0(){var a='x';document.getElementById('c0').value=a;}
function f1(){var b='x';document.getElementById('c1').value=b;}
function f2(){var c='x';document.getElementById('c2').value=c;}
function f3(){var c='x';document.getElementById('c3').value=c;}
function f4(){var c='x';document.getElementById('c4').value=c;}
function f5(){var c='x';document.getElementById('c5').value=c;}
function f6(){var c='x';document.getElementById('c6').value=c;}
function f7(){var c='x';document.getElementById('c7').value=c;}
function f8(){var c='x';document.getElementById('c8').value=c;}
</script>
<body>
<link href="css/style.css" rel="stylesheet">
<h1 align="center"><i>Tic Tac Toe</i></h1>

	
	<form action="" method="POST" align="center" autocomplete="off">
		<?php
for($i=0;$i<=8;$i++){
	printf('<input type="text" name="box%s" value="%s" id="c%s" class="box1" onclick="f%s()" readonly>',$i,$_SESSION['s'.$i],$i,$i);
		if($i==2 || $i ==5 || $i==8){print('<br>');}
		}
		if($winner =='n'){
			print('</br><input type="submit" name="sub" value="NEXT" class="go1">');
		}
		else{
			print('<br><input type="button" name="newgamebtn" value="play again" class="again1"	onclick="window.location.href=\'game.php\'">');
		}
		?>		
	</form>
<?php
if(isset($_SESSION['user']))
{
	echo "<h1>Playing As ".$_SESSION['user']."</h1><br> ";
$fi = 	$_SESSION['user']; $fi="player/".$fi.".txt";
		if(file_exists($fi))
		{$c=fopen($fi , 'r');fseek($c , 0 , SEEK_SET);$d = fgets($c);$d=$d+0;
			fseek($c , 5 , SEEK_SET);$e = fgets($c);$e=$e+0;
			fseek($c , 10 , SEEK_SET);$f = fgets($c);$f=$f+0;
			echo "<h1 class='win'> Wins = ".$d. "<span class='loss'> lost = ".$e. "</span><span class='t'> TIED = ".$f." </span></h1>";
		}}
else{echo "<h1>Playing As Guest..</h2>";}
?>


</body>