<div><br><div style="clear:both"></div><center><?  include "i/paginador.php"; ?></center><br><center><div id="slider" style=" width:500px"></div></center><script>	bRedirect=1;  $(function() {    $( "#slider" ).slider({     	value: <?=$cPage?> ,    	max: <?=$paginas?> ,    	stop: function( event, ui ) {    		setTimeout('goNow('+ui.value+')', 500);             }    });  });  function goNow(ui){  	if(bRedirect){  		bRedirect=0;  	 window.location = "index.php?libro=<?=$archivoHtml?>&cPage="+ui+"<?=$pagColor?><?=$pagSimplified?>";   	}  }  </script><!-- Salida del archivo procesado --><div id="output"></div><div style="clear:both"></div><center><?  include "i/paginador.php"; ?></center><br><div id="textoTexto"><div>		<a onClick="esconder();" style="color:white"><?=$__["[Esconder/mostrar texto]"]?></a>	<a onClick="esconder1();" style="color:white"><?=$__["[Esconder/mostrar Colores]"]?></a>	<a href="index.php?libro=aleatory&cPage=aleatory" style="color:white"><img src="img/biblioteca.gif"  width="30" height="20"><?=$__["[Cualquier libro: lugar aleatorio]"]?></a>	<a href="index.php?libro=<?=$archivoHtml?>&cPage=aleatory"  style="color:white"><img src="img/book.gif" width="30" height="20"><?=$__["[Lugar aleatorio en el libro]"]?></a>		<a onClick="esconder1();" style="color:white">[x2]</a> 	</div><br><div id="esconder">	<textarea id="input" rows="7" cols="120" style="font-family: monospace; background-color: rgb(174,183,175);">	<?=trim($test)?></textarea></div></div><br><br><br><br><br><br><br></div><script>			addEventListener("DOMContentLoaded", function () {				var input = document.querySelector("#input"),					text2color = function(input) {	 				document.querySelector("#output").innerHTML = chromaconate(input.value);				};				text2color(input);				input.onkeyup = function() {					text2color(input);				};			}, false);</script>