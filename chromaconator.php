<script>
 var alphabetColors = {

  <?
  	$print="";
  
  	foreach ($jsAlfa as $key => $value) {
  		$print .= "'".$value["simbolo"]."' : '".$value["valor"]."',";
  		$print .= "'".strtoupper($value["simbolo"])."' : '".$value["valor"]."',";
  	}
  	echo trim($print, ','); ?>

	};

var chromaconate = function(input,type) {	
	var output = "";
	var poner="";
	var border="";

	for (var i = 0; i < input.length; i++) {
		
		var mayus = "";
		var borderColor = "";
		var nextMayus = "";
		var preMayus = "";
		var altura = "";
		var currentChar = input[i];		
		var nextChar = input[i+1];	
		var preChar =  input[i-1];	

		poner=""; border = "";

		mayus = currentChar.toUpperCase();

		if(i<input.length-1){ nextMayus = nextChar.toUpperCase(); }
		if(i!=0){ preMayus = preChar.toUpperCase(); }
		
		if(!isNaN(currentChar) && currentChar!=" " && currentChar!="\t"  && currentChar!="\n"){

			borderColor="; border-style:solid; border-color: #0000ff;";
			border=" -moz-border-radius: 7px 7px 7px 7px; -webkit-border-radius : 7px 7px 7px 7px; ";
		
		}else{

			if(nextChar=="," || nextChar==")" || nextChar=="."
			|| nextChar=="?" || nextChar=="!" || nextChar==";"
			|| nextChar==":"){
			  
			  border=" -moz-border-radius: 0px 7px 7px 0px; -webkit-border-radius : 0px 7px 7px 0px; ";	
			  poner=("<span style=\"color: white;\"><strong>&nbsp;"+nextChar+"</strong></span>");

			}	

			if(preChar=="(" || preChar=="¿"  || preChar=="¡"){ 
				poner=("<span style=\"color: white;\"><strong>&nbsp;"+preChar+"</strong></span>");
			}

			if(nextChar==nextMayus){
				if(currentChar==mayus){
					border=" -moz-border-radius: 7px 7px 7px 7px; -webkit-border-radius : 7px 7px 7px 7px; ";
				}
			}else{
				if(currentChar==mayus){
					border=" -moz-border-radius: 7px 0px 0px 7px; -webkit-border-radius : 7px 0px 0px 7px; ";
				}
			}
		}

		if(!isNaN(preChar) && preChar!=" "){

			if(currentChar=="," || currentChar=="."){

				poner=("<span style=\"color: white;\"><strong>&nbsp;"+currentChar+"</strong></span>");	
			}
		
		}

		if(currentChar=="*" || currentChar=="/"){
			
			poner=("<span style=\"color: white;\"><strong>&nbsp;"+currentChar+"</strong></span>");	
		}

		if(type==1){
			poner=("<span style=\"color: white;\"><strong>&nbsp;"+currentChar+"</strong></span>");	
		}
		


		output +=
				"<div onMouseOver=\"document.getElementById('letter').innerHTML='"+currentChar+"';\" style=\"" + 
				border +" background-color: " +
				(alphabetColors[currentChar] || "transparent") + borderColor +"\">"+poner+"</div>\n" ;
		
		
	}
	
	return output;
};

</script>