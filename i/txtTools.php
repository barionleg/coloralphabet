<?

//Simplifica dactiolagraficamente el texto: quita vocales en el medio de la palabra
 function simplifiedTxt($test){
 
	$sCaracter="";
	$aCaracter="";
	$bVocal="";
	$cacheText="";

	$limit=strlen($test);

	for($i=0;$i<$limit;$i++){

		$cLetter=substr($test,$i,1);
		$sCaracter=substr($test,$i+1,1);
		$aCaracter=substr($test,$i-1,1);
		
		if($i==0) $bVocal=1;
		
		if($aCaracter==" " || $aCaracter=="." || $aCaracter=="," ) $bVocal=1;
		if($sCaracter==" " || $sCaracter=="." || $sCaracter=="," ) $bVocal=1;
			
		
			//echo tipoCaracter($cLetter);
			
		if(tipoCaracter($cLetter)=="v"){
		
			if($bVocal)	 $cacheText.=$cLetter;
			
		}else{
		
			 $cacheText.=$cLetter;
		}
		$bVocal=0;
	
	}

	return $cacheText;
 
 }
 
 function colorTxtPalette($bType){
	
	
	if($bType=="random"){
	
		$a="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";

		 $letterColors["a"]=$a;
		 $letterColors["‡"]=$a;
		 $letterColors["b"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["c"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["d"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		$e="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["e"]=$e;
		 $letterColors["Ž"]=$e;
		 $letterColors["f"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["g"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["h"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		$i="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["i"]=$i;
		 $letterColors["’"]=$i;
		 $letterColors["j"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["k"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["l"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["m"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["n"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors[utf8_encode("–")]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		$o="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["o"]=$o;
		 $letterColors["—"]=$o;
		 $letterColors["p"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["q"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["r"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["s"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["t"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		$u="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["u"]=$u;
		 $letterColors["œ"]=$u;
		 $letterColors["v"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["w"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["x"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["y"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["z"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";



		//Nï¿½meros
		 $letterColors["0"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["1"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["2"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["3"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["4"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["5"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["6"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["7"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["8"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
		 $letterColors["9"]="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
	
	}else{
	
		 $letterColors["ad"]="blue";
		 $letterColors["‡d"]="blue";
		 $letterColors["bd"]="red-violet";
		 $letterColors["cd"]="green-yellow";
		 $letterColors["dd"]="yellow-orange";
		 $letterColors["ed"]="orange";
		 $letterColors["Žd"]="orange";
		 $letterColors["fd"]="light-gray";
		 $letterColors["gd"]="of-white";
		 $letterColors["hd"]="gray";
		 $letterColors["id"]="yellow";
		 $letterColors["’d"]="yellow";
		 $letterColors["jd"]="dark-purple";
		 $letterColors["kd"]="light-yellow";
		 $letterColors["ld"]="dark-pink";
		 $letterColors["md"]="dark-orange";
		 $letterColors["nd"]="teal";
		 $letterColors["–d"]="not";
		 $letterColors["od"]="red";
		 $letterColors["—d"]="red";
		 $letterColors["pd"]="dark-yellow";
		 $letterColors["qd"]="black";
		 $letterColors["rd"]="dark-green";
		 $letterColors["sd"]="purple";
		 $letterColors["td"]="light-blue";
		 $letterColors["ud"]="green";
		 $letterColors["œd"]="green";
		 $letterColors["vd"]="cyan";
		 $letterColors["wd"]="pink";
		 $letterColors["xd"]="dark-blue";
		 $letterColors["yd"]="olive-green";
		 $letterColors["zd"]="red-brown";
	}
	return $letterColors;
 
 }
 
 function tilde($char){
 
	switch(strtolower($char)){
		
			case "‡":{return "a";}
			case "Ž":{return "e";}
			case "’":{return "i";}
			case "—":{return "o";}
			case "œ":{return "u";}
			case "a":{return "‡";}
			case "e":{return "Ž";}
			case "i":{return "’";}
			case "o":{return "—";}
			case "u":{return "œ"; }
			default:{return "st";} 
			
		}
 
 }

function sinTilde($char){
		
		
		
		
		$char2=$char;
		/*
		$char = utf8_decode(mb_strtolower($char));
		
		if(mb_strstr($char,utf8_encode("‡"),true)){ return "a"; }
		if(mb_strstr($char,utf8_encode("Ž"),true)){ return "e"; }
		if(mb_strstr($char,utf8_encode("’"),true)){ return "i"; }
		if(mb_strstr($char,utf8_encode("—"),true)){ return "o"; }
		if(mb_strstr($char,utf8_encode("œ"),true)){ return "u"; }
		*/
		return $char2;		
			
		
}

 
 function tipoCaracter($char){
		
		
		switch(strtolower($char)){
		
			case "‡":{}
			case "Ž":{}
			case "’":{}
			case "—":{}
			case "œ":{}
			case "a":{}
			case "e":{}
			case "i":{}
			case "o":{}
			case "u":{  return "v"; }
			default:{  return "o"; } 
			
		}


}

function limpiarCadena($txt){

	
	//limpiar cadena
	
	
	
 return	$txt=strip_tags($txt);
	
	
	/*
	$pat[0]=",,,";
	$pat[1]="&";
	$pat[2]="??";
	$pat[3]=",,";
	$pat[4]="&?";
	$pat[5]="&nbsp;";
	$pat[6]=",?";
	$pat[7]=";?";
	$pat[8]="?,";
	$pat[9]="  ";
	$pat[10]="   ";
	$pat[11]="    ";a
	*/
	$pat[0]="‡";
	$pat[1]="Ž";
	$pat[2]="’";
	$pat[3]="—";
	$pat[4]="œ";
	
	$pat1[0]="a";
	$pat1[1]="e";
	$pat1[2]="i";
	$pat1[3]="o";
	$pat1[4]="u";
	
	
	//return str_ireplace($pat,$pat1,$txt);
	
	//return utf8_encode(lc(utf8_code(str_ireplace($pat,' ',$txt)))); 
	


}
function lc($s) {
	$s = ereg_replace("[‡ˆ‰‹»]","a",$s);
	$s = ereg_replace("[çËåÌ]","A",$s);
	$s = ereg_replace("[Ž]","e",$s);
	$s = ereg_replace("[ƒéæ]","E",$s);
	$s = ereg_replace("[’“”]","i",$s);
	$s = ereg_replace("[êíë]","I",$s);
	$s = ereg_replace("[—˜™›¼]","o",$s);
	$s = ereg_replace("[îñïÍ]","O",$s);
	$s = ereg_replace("[œž]","u",$s);
	$s = ereg_replace("[òôó]","U",$s);
	$s = str_replace("–","n",$s);
	$s = str_replace("„","N",$s);
	//para ampliar los caracteres a reemplazar agregar lineas de este tipo:
	//$s = str_replace("caracter-que-queremos-cambiar","caracter-por-el-cual-lo-vamos-a-cambiar",$s);
	return $s;
}



?>