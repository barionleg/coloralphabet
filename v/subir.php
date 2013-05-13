<?
$e=mysql_connect("localhost","root","");
$bd= mysql_select_db('usuarios', $e);


$q="select fecha from libro where usr_id like '$usrIdMostrar' order by  fecha DESC limit 0,1"; 
$res=mysql_query($q);

$fila = mysql_fetch_row($res); $txt=$fila[0]; 

//echo $txt;
/*
$datetime1 = date_create('$txt');
$datetime2 = date_create(date("Y-m-d H:i:s"));
echo date("Y-m-d H:i:s");
echo "<br>".$txt;
$intervalo = date_diff($datetime1, $datetime2);
echo $intervalo->format('%R%a días');*/
?>
<br><br>
<center>
<div>
<form action="index.php" method="post" enctype="multipart/form-data"> 
      <input type="hidden" name="subir" value="subir">
   	<b><?= $__['Subir Libro en Html:']?></b> 
   	<br> 
   	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
   	<br> 
   	<br> 
   	<b><?= $__['Enviar un nuevo archivo:']?></b> 
   	<br> 
   	<input name="userfile" type="file"> 
   	<br> 
      <img src="captcha.php">
      <br>
      <input type="text" name="captcha" value="" style="width: 50px"><br>
   	<input type="submit" value="Enviar"> 
</form>
</div>
</center>