<?php
require_once('DataBase.php');
//include_once('../functions/control-session.php');
require_once('../functions/functions.php');
class User {
    private $username, $password;

    public function __construct($username, $password) {

        $this->username = $username;
        $this->password = $password;

    }

    public function signUp($verif_mdp) {
        //Check si pseudo, mdp et verif_mdp sont valides
        //hash mdp et verif_mdp
        //Inserer dans bdd
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        if(checkMdp($this->mdp) && equivMdp($this->mdp, $verif_mdp) && checkPseudo($this->pseudo) && checkExistPseudo($this->pseudo)) {
            //Hashage du mdp
            $hash_mdp = sha1($this->mdp);

            //Inserer valeurs$password
            $requete = "INSERT INTO users (PSEUDO, PASSWORD) VALUES (?, ?)";
            $stmt = $con->prepare($requete);
            $stmt->execute([$this->pseudo, $hash_mdp]);

            //Afficher msg de succès
            $msg .= "<p>Votre compte est crée! <a href='connexion.php'>Connexion ici</a></p>";

        } else {
            $msg .= "<p>Inscription non effectuée</p>";
        }
    }

    public function connexion() {
        //Check si pseudo, mdp sont valides
        //hash mdp
        //Comparer pseudo et mdp avec bdd
        global $msg;
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        if(checkMdp($this->mdp) && checkPseudo($this->pseudo)) {
            //Hashage du mdp
            $hash_mdp = sha1($this->mdp);

            //Inserer valeurs
            $requete = "SELECT * FROM users WHERE PSEUDO = ? AND PASSWORD= ?";
            $stmt = $con->prepare($requete);
            $stmt->execute([$this->pseudo, $hash_mdp]);
            $result = $stmt->rowCount();

            if($result == 1) {
                session_start();
                $infoUser = $stmt->fetch();
                $_SESSION['ID'] = $infoUser['ID_USER'];
                $_SESSION['PSEUDO'] = $infoUser['PSEUDO'];
                $User_ID = $infoUser;

                $msg .= "<p>Connexion reussie</p>";
                echo "user connecté";
                redirect('training.php');
            } else {
                $msg .= "<p>Mauvaise combis pseudo/mdp</p>";
            }
        }
    }
    public function deconnexion() {
        session_unset();
        session_destroy();
        echo "User deconnecté";
    }
}
//$pseudo = "Matt";
//$mdp = "123456";
//$verif_mdp = "123456";
/*$user = new User($pseudo, $mdp, $verif_mdp);
$user->inscription();
var_dump($msg);
*/
//$log_file->close();
?>
