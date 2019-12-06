<?php 
include "header.html";
include "navbar.html";
include('../Controller/Class/User.php');

?>
<div class="container">
            <div class="jumbotron">
                    <div class="form-group">
                        <form method="POST">
                        <input class="form-control" type="text" id="login"  name="username" placeholder="your login"/><label for="login">your login</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="your password"/><label for="password">your password</label>
                            <input class="form-control" type="password" id="password" name="passwordVerif" placeholder="Reenter your password"/><label for="password">your password</label>

                            <div class="row justify-content-center">
                            <span class="text-center">
                                <button class="btn btn-primary text-center" type="submit" name="SignUpForm"> SignUp </button>
                            </span>
                        </div>
                        </form>
                        <?php
                            if(isset($_POST['SignUpForm'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $passwordVerif = $_POST['passwordVerif'];

                                $user = new User($username, $password);

                                $user->signUp($passwordVerif);
                            }

                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
            </div>
</div>

