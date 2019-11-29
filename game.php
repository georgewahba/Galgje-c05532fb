
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>de game</title>
		<style>
			.mid {
				display: inline-block;
				width: 55%;
			}

			.right {
				display: inline-block;
				width: 44%;
			}

			.right img {
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div class="mid">
			<h1>lets begin the game</h1>
			<?php

			
			$mistakesCount = 0;

			if(isset($_POST['button'])){
				if($_POST['button'] != 'reset'){
					$lastCharacter   = $_POST['button'];
					if(isset($_COOKIE['characters'])){
						$characters = $_COOKIE['characters'] . ',' . $_POST['button'];
					} else {
						$characters = $_POST['button'];
					}
					setcookie('characters' , $characters , time() + (86400 * 10) );

					header("Location: game.php");
				} else {
					setcookie("woord", "", time() - 3600); 
					setcookie("characters", "", time() - 3600); 
					setcookie("mistakes", "", time() - 3600); 
					header("Location: galgje.php");

				}
			}

			$wordCharcters = str_split($_COOKIE['woord']);
			$choiceCharcters = explode(',', $_COOKIE['characters']);
			$won = true;

			foreach ($wordCharcters as $wordCharcter) {
				$choiceCorrect = false;
				foreach ($choiceCharcters as $choiceCharcter) {
					if($wordCharcter === $choiceCharcter){
						$choiceCorrect = true;
					}
				}
				if($choiceCorrect){
					echo($wordCharcter);
				} else {
					echo('_');
					$won = false;
				}
			}

			foreach ($choiceCharcters as $choiceCharcter) {
				$choiceCorrect = false;
				foreach ($wordCharcters as $wordCharcter) {
					if($wordCharcter === $choiceCharcter){
						$choiceCorrect = true;
					}
				}
				
				if(!$choiceCorrect){
					$mistakesCount++;
				}
			}

			$lose = false;

			if($mistakesCount === 8){
				$lose = true;
			}
			
			if($won){
				echo '<br>' . '<h1>You Won</h1>';
			}		

			if($lose){
				echo '<br>' . '<h1>You Lose</h1>';
			}
			?>
			<br>
			<br>
			<br>
			<form action="game.php" method="post">
			<button type="submit" name="button" value="reset">reset</button>

			<?php 

				$alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

				foreach ($alphabet as $value) {
					$display = true;
					foreach ($choiceCharcters as $choiceCharcter) {
						if ($value === $choiceCharcter) {
							$display = false;
						}
					}
					if ($won) {
						$display = false;
					}
					if ($lose){
						$display = false;
					}
					if ($display){
						echo('<button type="submit" name="button" value="' . $value . '">' . $value . '</button>');
					} else {
						echo('<button type="submit" name="button" value="' . $value . '" disabled>' . $value . '</button>');
					}
					
				}

			?>

			</form>

			<h1>Gebruikte karakters:</h1><p>
			<?php
				foreach ($choiceCharcters as $choiceCharcter) {
					echo($choiceCharcter . ' , ');
				}
			?>
			</p>
		</div>
		<div class="right">
			<?php
				if($mistakesCount === 0){
					echo('<img src="img/foto1.png">');
				} else {
				echo('<img src="img/foto' . $mistakesCount . '.png">');
				}
			?>
		</div>
	</body>
</html>