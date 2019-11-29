<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>zelf kiezen</title>
  </head>
  <body>
<h1>je hebt gekozen om zelf een woord te bedenken</h1>
<form  action="#" method="post">
<input type="text" name="woord">
<button type="submit" name="button">kies dit woord</button>
<?php
if (isset($_POST['woord'])) {
$woordzelf = strtolower($_POST['woord']);
setcookie('woord' , $woordzelf , time() + (86400 * 10) );
header("Location: game.php");
}
 ?>

</form>
  </body>
</html>
