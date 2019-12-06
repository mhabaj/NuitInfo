<?php 
include "header.html";
include "navbar.html";
include('../Controller/Class/User.php');

?>
<div class="container">
            <div class="jumbotron">
                    <div class="form-group">
                        <form method="POST" action="">
                        <input class="form-control" type="text" id="login" name="Username" placeholder="your login"/><label for="login">your login</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="your password"/><label for="password">your password</label>
                        <div class="row justify-content-center">
                            <span class="text-center">
                                <button class="btn btn-primary text-center" type="submit" name="connectForm"> Login </button>
                            </span>
                        </div>
                        </form>
                        <?php

                            if(isset($_POST['connectForm'])) {
                                $pseudo = $_POST['Username'];
                                $mdp = $_POST['password'];

                                $user = new User($pseudo, $mdp);

                                $user->login();
                            }

                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
            </div>
</div>

