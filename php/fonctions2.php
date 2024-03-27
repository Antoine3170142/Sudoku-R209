<?php
    function tester_grille($une_grille){
        for ($cpt_l = 0; $cpt_l < TAILLE * TAILLE; $cpt_l++){
            for ($cpt_c = 0; $cpt_c < TAILLE * TAILLE; $cpt_c++){
                $val = $une_grille[$cpt_l][$cpt_c];
                $une_grille[$cpt_l][$cpt_c] = 0;
                if (!est_valide($une_grille, $cpt_l, $cpt_c, $une_grille[$cpt_l][$cpt_c])){
                    return false;
                }
                $une_grille[$cpt_l][$cpt_c] = $val;
            }
        }
        return True;
    }

    function transpose_tableau($tab1d){
        $tab2d = array();
        $cpt = 0;
        for ($cpt_l = 0; $cpt_l < TAILLE * TAILLE; $cpt_l++){
            $tab2d[$cpt_l] = array();
            for ($cpt_c = 0; $cpt_c < TAILLE * TAILLE; $cpt_c++){
                $tab2d[$cpt_l][$cpt_c] = $tab1d[$cpt];
                $cpt++;
            }
        }
        return $tab2d;
    }
    
    function alea_vide(){
        if (mt_rand(1, 100) <= PROBA * 100) {
            return true;
        } else {
            return false;
        }
    }

    function affiche_grille_html($une_grille){
        echo "<h1>Sudoku</h1>";
        echo "<form method='post'  action='index.php'>";
        echo "<table>";
        foreach ($une_grille as $ligne){
            echo "<tr>";
            foreach ($ligne as $case){
                echo "<td>";
                if (alea_vide()) {
                    echo "<input type='number' name='tabVal[]'  min='1' max='".TAILLE * TAILLE."' value='' required>";
                } else {
                    echo "<input type='number' name='tabVal[]' min='1' max='".TAILLE * TAILLE."' value='$case' readonly>";
                }  
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "<input type='submit' value='Tester la validité'>";
        echo "</form>";
    }
?>
