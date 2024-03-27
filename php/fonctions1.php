<?php
    function init_grille(){
        $une_grille = array();
        // Crée une grille vide
        for ($cpt_ligne=0; $cpt_ligne < TAILLE * TAILLE; $cpt_ligne++){
            $une_grille[] = array();
            // Crée une ligne vide
            for ($cpt_colonne = 0; $cpt_colonne < TAILLE * TAILLE; $cpt_colonne++){
                $une_grille[$cpt_ligne][$cpt_colonne] = 0;
            }
        }
        return $une_grille;
    }

    function affiche_grille($une_grille){
        // Affiche la grille
        for ($cpt_ligne=0; $cpt_ligne < TAILLE * TAILLE; $cpt_ligne++){
            // Affiche une ligne
            for ($cpt_colonne = 0; $cpt_colonne < TAILLE * TAILLE; $cpt_colonne++){
                echo $une_grille[$cpt_ligne][$cpt_colonne] . "&nbsp;";
            }
            echo "<br>";
        }
    }

    function est_valide($une_grille, $ligne, $colonne, $elt){
        // Teste la présence de $elt dans la ligne $ligne
        if (in_array($elt, $une_grille[$ligne])){
            return false;
        }
        // Teste la présence de $elt dans la colonne $colonne
        for ($cpt_ligne = 0; $cpt_ligne < TAILLE * TAILLE; $cpt_ligne++){
            if ($une_grille[$cpt_ligne][$colonne] == $elt){
                return false;
            }
        }
        // Teste la présence de $elt dans la région
        $deb_ligne_region = $ligne - $ligne % TAILLE;
        $deb_colonne_region = $colonne - $colonne % TAILLE;
        // Recherche de $elt dans la région
        for ($cpt_1 = 0; $cpt_1 < TAILLE; $cpt_1++){
            // Parcours des lignes de la région
            for ($cpt_c = 0; $cpt_c < TAILLE; $cpt_c++){
                // Parcours des colonnes de la région
                if ($une_grille[$deb_ligne_region + $cpt_1][$deb_colonne_region + $cpt_c] == $elt){
                    return false;
                }
            }
        }
        return true;
    }
    
    function test_exemple(){
        $grille = init_grille();

        // premier test
        affiche_grille($grille);
        echo "1 en ligne 0 et colonne 0 ";
        if (est_valide($grille, 0, 0, 1)){
            echo "est valide<br>";
        } else {
            echo "n'est pas valide<br>";
        }

        // deuxième test
        $grille[0] = [1, 4, 3, 2];
        $grille[1] = [2, 3, 4, 1];
        $grille[2] = [3, 2, 1, 4];
        $grille[3] = [4, 1, 2, 3];
        affiche_grille($grille);
        echo "4 en ligne 1 et colonne 2 ";
        if (est_valide($grille, 0, 0, 1)){
            echo "est valide<br>";
        } else {
            echo "n'est pas valide<br>";
        }

    }

    function remplir_grille(){
        $une_grille = init_grille();
        $liste_val = [];
        for ($cpt = 1; $cpt <= TAILLE * TAILLE; $cpt++){
            $liste_val[] = $cpt;
        }

        // Parcours de la grille
        for ($cpt_l = 0; $cpt_l < TAILLE * TAILLE; $cpt_l++){
            for ($cpt_c = 0; $cpt_c < TAILLE * TAILLE; $cpt_c++){
                shuffle($liste_val);
                $cpt = 0;
                while (! est_valide($une_grille, $cpt_l, $cpt_c, $liste_val[$cpt])){
                    $cpt++;
                    if ($cpt == TAILLE * TAILLE){
                        return $une_grille;
                    }
                }
                $une_grille[$cpt_l][$cpt_c] = $liste_val[$cpt];
            }
        }
        return $une_grille;
    }

    function remplir_grille_iteratif(){
        $cpt1 = 0;
        $une_grille = remplir_grille();
        while ($une_grille[TAILLE * TAILLE - 1][TAILLE * TAILLE - 1] == 0){
            $une_grille = remplir_grille();
            $cpt1++;
        }
        echo "Nombre d'essais : " . $cpt1 . "<br>";
        return $une_grille;

    }

    // $grille = remplir_grille_iteratif();
    // affiche_grille($grille);

    // $grille = init_grille();
    // affiche_grille($grille);

    // test_exemple();

    // Test de la fonction est_valide
    // if (est_valide($grille, 0, 0, 1)){
    //     echo "Ca marche";
    // } else {
    //     echo "Ca ne marche pas";
    // }
?>