<?
if(isset($_GET["captcha"])){
	include "i18n/index.php";

	session_start(); 

	if(strlen($_GET["captcha"])<4){ 
		echo  "<span style=\"color: red;\">".$__['no parece correcto, vuelve a intentarlo']."</span>"; die;}

	if ($_GET['captcha'] == $_SESSION['cap_code']) 
		echo "<span style=\"color: green;\">OK!</span>"; 
	else  
		 echo  "<span style=\"color: red;\">".$__['no parece correcto, vuelve a intentarlo']."</span>";
}
