<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SUDOKU</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <?php
            const TAILLE = 2;
            const PROBA = 0.4;
            require("php/fonctions1.php");
            require("php/fonctions2.php");
            if (!isset($_POST['tabVal'])){ // Premier chargement
                $grille = remplir_grille_iteratif();
                affiche_grille_html($grille);
            } else { // formulaire rempli
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                $grille = transpose_tableau($_POST['tabVal']);
                affiche_grille($grille);
                if (tester_grille($grille)){
                    echo "Gagné";
                } else {
                    echo "Perdu";
                }
            }

            // $grille = remplir_grille_iteratif();
            // affiche_grille($grille);
            // affiche_grille_html($grille);
        ?>
    </body>
</html>