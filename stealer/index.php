<?php
include("./dbconnect.php");
if(isset($_POST['name']) && isset($_POST['msg'])) {
  $uname=$_POST['name'];
	$umsg=$_POST['msg'];
}
if($_SERVER['HTTP_USER_AGENT'] == "edbrowse/3.6.1") setcookie('auth','07a83dc243c22832c073aa9423863b47');
elseif(!isset($_COOKIE['auth'])) setcookie('auth','guest');
$db = new mysqli($servername,$dbuser,$dbpassword,'sqli');
if($db->connect_errno > 0){
	die("Connection failed: ".$db->connect_error);
}
if(isset($uname) && $uname != "" && isset($umsg) && $umsg != "" && $uname != "admin" && $uname != "Admin"){
$sql = <<<SQL
INSERT INTO posts(user, inhalt) values(?, ?)
SQL;
    if($stmt = $db->prepare($sql)){
			$stmt -> bind_param('ss', $uname, $umsg);
	    $stmt -> execute();
	    $stmt -> bind_result($datarows);
    }
}
$sql = <<<SQL
SELECT timestamp, user, inhalt
FROM posts
SQL;
    if($stmt = $db->prepare($sql)){
	    $stmt -> execute();
	    $stmt -> bind_result($db_timestamp, $db_name, $db_msg);
    }
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>1337 H4x0r Chatwall</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="BB">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
	<div class="container">
	  <span class="brand"><a href="/">Best Chat EU</a></span>
	</div>
      </div>
    </div>
    <div class="container">
    	<h3>1337 H4x0r Chatwall</h3>
			<?php
					if(isset($_COOKIE['auth']) && $_COOKIE['auth'] == "07a83dc243c22832c073aa9423863b47") {
						echo "<h1>Welcome Admin. The Secret is 'd98e34ca8f143a7a903c16eae8558aa2'</h1>";
					}
					if(isset($uname) && ($uname == "admin" || $uname == "Admin")){
						echo "<p class='text-warning'>Der Name Admin kann nicht verwendet werden.</p>";
					}
			 ?>
    	<form class="well form-horizontal" method="post">
        	    <div class="control-group">
        	    <label class="control-label" for="name">Name</label>
        	    <div class="controls">
        	    <input type="text" name="name"/>
						  </div></div>
						  <div class="control-group">
							<label class="control-label" for="msg">Nachricht</label>
							<div class="controls">
							<input type="text" name="msg"/>
        	    <button type="submit" class="btn" value="clicked">senden</button>
        	    </div></div>
        </form>
		<?php
		    echo "<pre>";
		    while ($stmt->fetch()) {
                echo "<b>";
                printf ("%s - %s", $db_timestamp, $db_name);
                echo "</b><br />";
								printf ("%s", $db_msg);
								echo "</p>";
            }
            echo "</pre>";
		 	$stmt -> close();

      if(isset($db)) $db->close();
    ?>
    </div>
  </body>
</html>
