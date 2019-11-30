<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h1>je hebt gekozen voor een random woord</h1>
<?php
    $words = array('bitacademy', 'arthur' , "school" , "galgje" );
    $rand_keys = array_rand($words);
    setcookie('woord' , $words[$rand_keys] , time() + (86400 * 10) );
    echo $words[$rand_keys];
    ?>
    <form action="game.php" method="get">
      <button type="submit" name="button">begin de game</button>
    </form>
  </body>
</html>
