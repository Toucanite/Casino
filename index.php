<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Exercice PHP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
			<?php
      $DEFAULT_MONEY = 10000;
      $NOMBRE_IMAGES = 3;
      $COUT_PAR_TOUR = 1000;
      $PRICES = array(0, 15000, 25000, 250000, 500000, 1000000);
      $nbrTireAuSort = array();


      if (isset($_GET['money'])) {
        $money = $_GET['money'];
        $nbrPrecedent = 0;
        $recompense = NULL;
        for ($i=0; $i < $NOMBRE_IMAGES; $i++) {
          $nbrTireAuSort[$i] = rand(0, 5);
          echo '<img src="Image' . $nbrTireAuSort[$i] . '.jpg" alt="' . $nbrTireAuSort[$i] . '">';
        }
        foreach ($nbrTireAuSort as $key => $value) {
          if ($key != 0) {
            if ($nbrPrecedent != $value) {
              break;
            }
            if ($key == (count($nbrTireAuSort) - 1)) {
              $recompense = $value;
            }
          }
          $nbrPrecedent = $value;
        }
        if ($recompense === NULL) {
          $money += 0;
        }
        elseif ($recompense == 0) {
          $money = 0;
          echo '<h1>Pas de chance! Vous avez tout perdu...</h1><br>';
        }
        else {
          $money += $PRICES[$recompense];
          echo '<h1>Félicitations! Vous avez gagné ' . $PRICES[$recompense] . ' $</h1><br>';
        }

        if ($money >= $COUT_PAR_TOUR) {
          echo '<p>Vous avez ' . $money . ' $</p><br>';
          echo '<a href="index.php?money=' . ($money - $COUT_PAR_TOUR) . '">Cliquez ici pour jouer ' . $COUT_PAR_TOUR . ' $</a><br>';
        }
        else {
          echo '<br><p>Vous n\'avez plus assez de crédits pour jouer</p><br>';
        }


      }
      else {
        echo '<h1>Bienvenue au Casino!</h1><br>';
        echo '<img src="banner.jpg" alt="Casino"><br>';
        echo '<p>Vous avez ' . $DEFAULT_MONEY . ' $</p><br>';
        echo '<a href="index.php?money=' . $DEFAULT_MONEY . '">Cliquez ici pour jouer ' . $COUT_PAR_TOUR . ' $</a><br>';
      }

			?>
        <br>
        <a href="index.php">Retour</a>
        </div>
    </body>
</html>
