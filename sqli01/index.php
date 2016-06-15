<?php
include("./dbconnect.php");
if(isset($_POST['debug'])) $debug=1;
if(isset($_POST['user'])) $user=$_POST['user'];
if(isset($_POST['password'])) $password=$_POST['password'];
if(isset($user) && $user != "" && isset($password) && $password != ""){
$db = new mysqli($servername,$dbuser,$dbpassword,'sqli');
if($db->connect_errno > 0){
	die("Connection failed: ".$db->connect_error);
}
$sql = <<<SQL
SELECT *
FROM users
WHERE user = '$user' and password = '$password'
SQL;
if($result = $db->query($sql)){
	$rows = $result->num_rows;
}
}
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Secure Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="BB">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
	<div class="container">
	  <span class="brand"><a href="/">AST-CTF</a></span>
	</div>
      </div>
    </div>
    <div class="container">
    	<h3>Secure Login</h3>
		<?php
		 if(isset($password) && $password != "" && isset($user) && $user != ""){
		 	if(isset($debug) && isset($sql)){
				 echo "<p class='text-info'>DEBUG: ".$sql."</p>";
			}
		 	if(isset($rows)){
				if($rows >= 1){
		 			include('./admin_infos.php');
		 			$result->free();
		 		}
				else{
					if(substr($user,0,5) != "admin"){
						echo "<p class='text-warning'>Wieso versuchst du dich mit ".$user." einzuloggen, wenn der korrekte User admin heißt?</p>";
					}
					else{
						echo "<p class='text-warning'>Benutzername und/oder Passwort ungültig!</p>";
					}
				}
			}
			else{
				echo "<p class='text-warning'>Ungültige MySQL Syntax!</p>";
			}
		 }
		 else {
			if(isset($password) && isset($user)){
				echo "<p class='text-warning'>Bitte Benutzernamen und Passwort eingeben!</p>";
			}
			else{
		 		echo "<p class='text-info'>Logge dich als 'admin' ein!</p>";
			}
		 }
		?>
	    <form class="well form-horizontal" method="post">
	    <div class="control-group">
	    <label class="control-label" for="user">User</label>
	    <div class="controls">
	    <input type="text" name="user"/>
	    </div></div>
	    <div class="control-group">
	    <label class="control-label" for="password">Passwort</label>
	    <div class="controls">
	    <input type="password" name="password"/>
	    <button type="submit" class="btn" value="clicked">login</button>
	    </div></div>
	<?php
        if(isset($debug) && $debug==1){
            echo "<div class='control-group'>
            <label class='control-label' for='checkbox'>Debug</label>
            <div class='controls'>
            <input type='checkbox' name='debug' checked/>";
        }
        else{
            echo "<div class='control-group' style='display:none;'>

            <label class='control-label' for='checkbox'>Debug</label>
            <div class='controls'>
            <input type='checkbox' name='debug'/>";
        }
    ?>
  	    </div></div>
	    </form>
			<!--
			<a href="sql_statement.txt">SQL-Statement</a>
			-->
    </div>


  </body>
</html>
