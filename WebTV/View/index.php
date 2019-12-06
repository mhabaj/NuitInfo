<?php
    include ('Controller/Class/User.php');
?>
            <form method="POST" >



                    <input class="input100" type="text" name="pseudo" placeholder="Nom d'utilisateur">



                    <input class="input100" type="password" name="mdp" placeholder="Mot de passe">


                    <input class="input100" type="password" name="mdp2" placeholder="Verification de mot de passe">



                        <a href="connexion.php" >
                            Vous avez déjà un compte? Connectez vous!
                        </a>


                    <button type="submit"  name="formInscription" class="login100-form-btn">
                        Inscription
                    </button>



<?php

    if(isset($_POST['formInscription'])) {
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];
        $verif_mdp = $_POST['mdp2'];

        $user = new User($pseudo, $mdp);

        $user->signUp($verif_mdp);
    }


?>