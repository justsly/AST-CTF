<?php
include("./dbconnect.php");
if(isset($_POST['user'])) $user=$_POST['user'];
if(isset($_POST['password'])) $password=$_POST['password'];
if(isset($user) && $user != "" && isset($password) && $password != ""){
$db = new mysqli($servername,$dbuser,$dbpassword,'sqli');
if($db->connect_errno > 0){
	die("Connection failed: ".$db->connect_error);
}

$sql = <<<SQL
SELECT userid, user
FROM users
WHERE user =?  and password = md5(?)
SQL;

if($stmt = $db->prepare($sql)){
	$stmt -> bind_param("ss", $user, $password);
	$stmt -> execute();
	$stmt -> bind_result($datarow[0],$datarow[1]);
	$stmt -> fetch();
	$stmt -> close();
}
}
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>No way you own this Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
    	<h3>Admin Login</h3>
		<?php
		 if(isset($password) && isset($user)){
			if(isset($datarow[0]) && $datarow[1] == "root") include('./admin_infos.php');
		 	elseif(isset($datarow[0]) && $datarow[1] == "admin") echo "<p class='text-info'>Du bist als Admin einloggt. Jedoch haben wir beschlossen, dass Admin keine Rechte hat. Komme wieder wenn du die Daten von 'root' kennst!</p>";
			elseif(($user=="" || $password=="")){
				echo "<p class='text-warning'>Bitte Benutzernamen und Passwort angeben</p>";
			}
			else{
				echo "<p class='text-warning'>Benutzername und/oder Passwort ungültig</p>";
			}
		}
	    	else {
	    		echo "<p class='text-info'>Logge dich hier als Admin ein, sofern du das Passwort weißt.</p><p class='text-warning'>Du weißt das Passwort nicht? Komm zurück wenn du es weißt. <a href='index.php'>Zurück</a></p>";
		};
		?>
	    		<form class='well form-horizontal' method='post'>
            		<h4>In Account einloggen</h4>
            		<div class='control-group'>
            		<label class='control-label' for='user'>User</label>
            		<div class='controls'>
            		<input type='text' name='user' \>
            		</div></div>
            		<div class='control-group'>
            		<label class='control-label' for='password'>Passwort</label>
            		<div class='controls'>
            		<input type='password' name='password'\>
            		<button type='submit' name='login' class='btn'>login</button>
            		</div></div>
            		</form>
	    		<!-- <a href='admin.txt'>Admin Login</a> -->
		<?php
            	if(isset($db)) $db->close();
            	?>
    </div>
  </body>
</html>
