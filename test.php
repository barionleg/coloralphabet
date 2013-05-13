
<?

	
	
	//$_SESSION= array();
	
	if(isset($_GET["random"])){
			$_SESSION["random"]=1;
	
	}
	if(isset($_GET["simplified"])){
		$_SESSION["simplified"]=1;
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	
	ViewText.org API	

</title><link rel="stylesheet" type="text/css" href="/static/css/page.css?7" media="all" /><link href="/static/images/favicon.ico" rel="icon" type="image/x-icon" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script type="text/javascript">
        if (typeof jQuery == 'undefined') {
            document.write(unescape("%3Cscript src='/static/js/jquery-1.4.2.min.js' type='text/javascript'%3E%3C/script%3E"));
        }

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-19867845-2']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body style="background-color: black;">
   
   

   <div id="content" class="container_12">
        

 
	

    
<form id="form1" name="form1" method="post" action="index.php">

	   
	    <input type="hidden" id="url" style="width:350px;" value="<?=$_GET["url"]?>" />
        <div><input type="hidden" style="width:95%;height:250px;" id="results"></textarea>
		<input type="hidden" id="send_id" name="PastedText" value="">
		</div>
</form>
	    <script type="text/javascript">
		    $("document").ready(function () {
			    $.getJSON("http://viewtext.org/api/text?url=" + $("#url").val() + "&callback=?",
			    function (data) {
				    $("#results").val(data.content);
					
					var myt=document.getElementById("results").value;
					
					document.getElementById("send_id").value=myt.replace(/(<([^>]+)>)/ig,"");
					document.form1.submit();
			    });
		    });
	    </script>
    </div>

    </div>

    
        
    
</body>
</html>

