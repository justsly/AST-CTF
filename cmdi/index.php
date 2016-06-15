<?php
//Unsecure by design
if(isset($_GET['ip'])) $ip = $_GET['ip'];
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="BB">
    <link href="/css/style.css" rel="stylesheet">
    <title>Pingsystem 3000</title>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
	    <div class="container">
	        <span class="brand"><a href="#">AST-CTF</a></span>
	    </div>
      </div>
    </div>
    <div class="container">
    	<h3>Pingsystem 3000</h3>
		<p class='text-info'>The ultimate ping system</p>
	    <form class="well form-horizontal" method="get">
	        <div class="control-group">
	            <label class="control-label" for="ip">Was willst du pingen?</label>
	            <div class="controls">
	                <input type="text" name="ip"/>
	                <button type="submit" class="btn">Submit</button>
  	            </div>
  	        </div>
	    </form>
	    <p>
	    <?php
		if(isset($ip)){
			system("ping -c 3 ".$ip);
		}
		?></p>
	    <p>
    </div>
  </body>
</html>
