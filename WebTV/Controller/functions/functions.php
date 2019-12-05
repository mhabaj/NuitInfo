<?php


function redirect($url, $permanent = false) {
    if ($permanent) {
        header('HTTP/1.1 301 Moved Permanently');
    }
    header('Location: ' . $url);
    exit();
}
/*
*
*	Checker la longueur min = 6, max=50
*
*
*/
function checkPassword($password) {
    
    if(strlen($password)>= 8 && strlen($password) <= 50) {
        return true;
    } else {
        echo "<p>Password must have 8-50 </p>";
        return false;
    }
    
}

function equivMdp($mdp, $verif_mdp) {
    $hash_mdp = sha1($mdp);
    $hash_verif = sha1($verif_mdp);

    if($hash_mdp == $hash_verif) {
        return true;
    } else {
        echo "<p>Mdps non identiques</p>";
        return false;
    }
}

function checkPseudo($pseudo) {
    
    $filter_pseudo = filter_var(trim($pseudo), FILTER_SANITIZE_STRING);
    
    if(!empty($filter_pseudo)) {
        if(strlen($filter_pseudo) <= 20) {
            if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pseudo)) {
                return true;
            } else {
                echo "<p>Pas de char spéciaux</p>";
                return false;
            }
        } else {
            echo "<p>Max 20 char</p>";
            return false;
        }
    } else {
        echo "<p>Pseudo ne doit pas etre vide</p>";
        return false;
    }
}

function checkExistPseudo($pseudo) {
    $bdd = new ConnexionBDD();
    $con = $bdd->getCon();
    
    $stmt = $con->query("SELECT PSEUDO FROM users WHERE users.PSEUDO='$pseudo'");
    $nbrOccur = $stmt->rowCount();
    
    if($nbrOccur == 0) {
        return true;
    } else {
        echo "<p>Pseudo existe deja</p>";
        return false;
    }
}

function checkNom($nom){
    if(!empty($nom) && (strlen($nom) <= 20)) {
        return true;
    }
    return false;
}

function checkType($type) {
    if(!empty($type) && (strlen($type) <= 20)) {
        return true;
    }
    return false;
}

function checkPuissance($puissance) {
    if(!empty($puissance) && is_numeric($puissance) &&($puissance < 40)) {
        return true;
    }
    return false;
}

function checkPhoto($photo) {
    if(!empty($photo) && (strlen($photo)) <= 30) {
        return true;
    }
    return false;
}







?>