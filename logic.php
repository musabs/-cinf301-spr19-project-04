<?php
error_reporting(0);
session_start();
//USER REGISTRATION
ob_start();
if(isset($_REQUEST['same']))
{$_SESSION['user'] = $_COOKIE['game'];
header('location:game.php');
}
$p;$count=1;$winner='n';$box=array('','','','','','','','','');

if(isset($_REQUEST['subn'])){
//session_destroy();session_start();
$_SESSION['user']=$_REQUEST['name']; // check here if the user's text file present or not?
$fi=$_SESSION['user'];$fi = "player/".$fi.".txt";$_SESSION['file']=$fi;
if(file_exists ($fi))
{//echo "FIle PRESENT"; 
$_SESSION['fread']=fopen($fi,'r');//open file and show	}
}
else{$p = fopen($fi,'w+'); fclose($p);}
setcookie('game', $_SESSION['user'], time() + (86400 * 30), "/");
header('location:game.php');
}	
// USER END
$_SESSION['s0']='';$_SESSION['s1']='';$_SESSION['s2']='';
$_SESSION['s3']='';$_SESSION['s4']='';$_SESSION['s5']='';
$_SESSION['s6']='';$_SESSION['s7']='';$_SESSION['s8']='';



if(isset($_POST['sub']))
{

$_SESSION['s0']=$_POST['box0'];
$_SESSION['s1']=$_POST['box1'];
$_SESSION['s2']=$_POST['box2'];
$_SESSION['s3']=$_POST['box3'];
$_SESSION['s4']=$_POST['box4'];
$_SESSION['s5']=$_POST['box5'];
$_SESSION['s6']=$_POST['box6'];
$_SESSION['s7']=$_POST['box7'];
$_SESSION['s8']=$_POST['box8'];

if(($_SESSION['s0']=='x' && $_SESSION['s1']=='x' && $_SESSION['s2']=='x')||
($_SESSION['s3']=='x' && $_SESSION['s4']=='x' && $_SESSION['s5']=='x') ||
($_SESSION['s6']=='x' && $_SESSION['s7']=='x' && $_SESSION['s8']=='x') ||
($_SESSION['s0']=='x' && $_SESSION['s3']=='x' && $_SESSION['s6']=='x') ||
($_SESSION['s1']=='x' && $_SESSION['s4']=='x' && $_SESSION['s7']=='x') ||
($_SESSION['s2']=='x' && $_SESSION['s5']=='x' && $_SESSION['s8']=='x') ||
($_SESSION['s0']=='x' && $_SESSION['s4']=='x' && $_SESSION['s8']=='x') ||
($_SESSION['s2']=='x' && $_SESSION['s4']=='x' && $_SESSION['s6']=='x')){
$winner = 'x'; // winner here


if(isset($_SESSION['user']))
{ 

$fi=$_SESSION['user'];$fi = "player/".$fi.".txt";$p=fopen($fi , 'r');//  reading previous wins on player
$_SESSION['file']=$fi;
fseek($p , 0 , SEEK_SET);$_SESSION['count']=fgets($p); // read wins
fseek($p , 5 , SEEK_SET);$_SESSION['lost']=fgets($p); // read lost
fseek($p , 10 , SEEK_SET);$_SESSION['tied']=fgets($p); // read tie
fclose($p);

if(empty($_SESSION['count'])){$_SESSION['count']=0;$_SESSION['count']=$_SESSION['count']+$count;}
else{$_SESSION['count']=$_SESSION['count'] + $count;}

$p = fopen($_SESSION['file'],'w+');
fseek($p , 0 , SEEK_SET);fputs($p,$_SESSION['count']);
fseek($p , 5 , SEEK_SET);fputs($p,$_SESSION['lost']);
fseek($p , 10 , SEEK_SET);fputs($p,$_SESSION['tied']);

}

//header('index.php');
//echo "<br><br> X wins the game<br><br>".$_SESSION['count'];
}
$blank=0;
for($i=0; $i<=8; $i++){
if($_SESSION['s'.$i] == ''){$blank=1;}
}
if($blank==1 && $winner=='n'){
	
//line 1
if($_SESSION['s0']=='x'&&$_SESSION['s1']=='x')
{
	if($_SESSION['s2']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}echo $_SESSION['s'.$i]='o';}
	else {echo $_SESSION['s2']='o';}
}

else if($_SESSION['s0']=='x'&&$_SESSION['s2']=='x')
{if($_SESSION['s1']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s1']='o';}
}
else if($_SESSION['s1']=='x'&&$_SESSION['s2']=='x')
{
if($_SESSION['s0']=='o'){$i=rand() % 8;
	while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
else {$_SESSION['s0']='o';}	
}

//line 2
else if($_SESSION['s3']=='x'&&$_SESSION['s4']=='x')
{
	if($_SESSION['s5']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s5']='o';}
}
else if($_SESSION['s3']=='x'&&$_SESSION['s5']=='x')
{
	if($_SESSION['s4']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s4']='o';}
}

else if($_SESSION['s4']=='x'&&$_SESSION['s5']=='x')
{
if($_SESSION['s3']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s3']='o';}
}
//line 3
else if($_SESSION['s6']=='x'&&$_SESSION['s7']=='x')
{
	if($_SESSION['s8']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s8']='o';}
}

else if($_SESSION['s6']=='x'&&$_SESSION['s8']=='x')
{
	if($_SESSION['s7']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s7']='o';}	
}

else if($_SESSION['s8']=='x'&&$_SESSION['s7']=='x')
{
	if($_SESSION['s6']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s6']='o';}	
}

// column 1

else if($_SESSION['s0']=='x'&&$_SESSION['s3']=='x')
{
	if($_SESSION['s6']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s6']='o';}
}

else if($_SESSION['s0']=='x'&&$_SESSION['s6']=='x')
{if($_SESSION['s3']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s3']='o';}
}
else if($_SESSION['s3']=='x'&&$_SESSION['s6']=='x')
{
if($_SESSION['s0']=='o'){$i=rand() % 8;
	while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
else {$_SESSION['s0']='o';}	
}

//column 2
else if($_SESSION['s1']=='x'&&$_SESSION['s4']=='x')
{
	if($_SESSION['s7']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s7']='o';}
}
else if($_SESSION['s1']=='x'&&$_SESSION['s7']=='x')
{
	if($_SESSION['s4']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s4']='o';}
}

else if($_SESSION['s4']=='x'&&$_SESSION['s7']=='x')
{
if($_SESSION['s1']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s1']='o';}
}
//column 3
else if($_SESSION['s2']=='x'&&$_SESSION['s5']=='x')
{
	if($_SESSION['s8']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s8']='o';}
}

else if($_SESSION['s2']=='x'&&$_SESSION['s8']=='x')
{
	if($_SESSION['s5']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s5']='o';}	
}

else if($_SESSION['s5']=='x'&&$_SESSION['s8']=='x')
{
	if($_SESSION['s2']=='o'){$i=rand() % 8;
		while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}
	else {$_SESSION['s2']='o';}	
}
else{$i=rand() % 8;
	while($_SESSION['s'.$i] != ''){$i = rand() % 8;}$_SESSION['s'.$i]='o';}	
if(($_SESSION['s0']=='o' && $_SESSION['s1']=='o' && $_SESSION['s2']=='o')||
($_SESSION['s3']=='o' && $_SESSION['s4']=='o' && $_SESSION['s5']=='o') ||
($_SESSION['s6']=='o' && $_SESSION['s7']=='o' && $_SESSION['s8']=='o') ||
($_SESSION['s0']=='o' && $_SESSION['s3']=='o' && $_SESSION['s6']=='o') ||
($_SESSION['s1']=='o' && $_SESSION['s4']=='o' && $_SESSION['s7']=='o') ||
($_SESSION['s2']=='o' && $_SESSION['s5']=='o' && $_SESSION['s8']=='o') ||
($_SESSION['s0']=='o' && $_SESSION['s4']=='o' && $_SESSION['s8']=='o') ||
($_SESSION['s2']=='o' && $_SESSION['s4']=='o' && $_SESSION['s6']=='o')){
$winner = 'o';

if(isset($_SESSION['user']))
{ $fi=$_SESSION['user'];$fi = "player/".$fi.".txt";$p=fopen($fi , 'r');//  reading previous wins on player
$_SESSION['file']=$fi;
fseek($p , 0 , SEEK_SET);$_SESSION['count']=fgets($p); // read wins
fseek($p , 5 , SEEK_SET);$_SESSION['lost']=fgets($p); // read lost
fseek($p , 10 , SEEK_SET);$_SESSION['tied']=fgets($p); // read tie
fclose($p);

if(empty($_SESSION['lost'])){$_SESSION['lost']=0;$_SESSION['lost']=$_SESSION['lost']+$count;}
else{$_SESSION['lost']=$_SESSION['lost'] + $count;}

$p = fopen($_SESSION['file'],'w+');
fseek($p , 0 , SEEK_SET);fputs($p,$_SESSION['count']);
fseek($p , 5 , SEEK_SET);fputs($p,$_SESSION['lost']);
fseek($p , 10 , SEEK_SET);fputs($p,$_SESSION['tied']);

}
//echo "<br><br> You Lost<br><br>";	
}}
else if($winner =='n'){$winner ='t';
if(isset($_SESSION['user']))
{ $fi=$_SESSION['user'];$fi = "player/".$fi.".txt";$p=fopen($fi , 'r');//  reading previous wins on player
$_SESSION['file']=$fi;
fseek($p , 0 , SEEK_SET);$_SESSION['count']=fgets($p); // read wins
fseek($p , 5 , SEEK_SET);$_SESSION['lost']=fgets($p); // read lost
fseek($p , 10 , SEEK_SET);$_SESSION['tied']=fgets($p); // read tie
fclose($p);

if(empty($_SESSION['tied'])){$_SESSION['tied']=0;$_SESSION['tied']=$_SESSION['tied']+$count;}
else{$_SESSION['tied']=$_SESSION['tied'] + $count;}

$p = fopen($_SESSION['file'],'w+');
fseek($p , 0 , SEEK_SET);fputs($p,$_SESSION['count']);
fseek($p , 5 , SEEK_SET);fputs($p,$_SESSION['lost']);
fseek($p , 10 , SEEK_SET);fputs($p,$_SESSION['tied']);

}

}
}
//header('location:index.php');

?>