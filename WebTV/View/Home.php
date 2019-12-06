<?php
session_start();// ici on continue la session
?>
<html>
    <head>
        <link rel="stylesheet" href="./assets/bootstrap.css">
        <script src="./assets/fontawesome-free-5.11.2-web/js/all.js"></script>
        <title>Sos précarité étudiante </title>
    </head>
    <body class="bg-dark text-white">

        
    <div class="navbar text-light">
        <h1>
        <div class="nav-item active">
            <a class="navitem text-light">
                Home
            </a>
            </div>
    </h1>

        

        <div class="nav-item active">
            <?php
            if ((!isset($_SESSION['ID'])) || ($_SESSION['ID'] == '')) {

                ?>
                <a class="navbar-toggler text-light" href = "Login.php">
                    Log in
                </a>
                <a class="navbar-toggler text-light" href = "SignUp.php">
                    Sign Up
                </a>
                <?php
            }
           else{
               if ( $_SESSION['STATUS'] == 2){ // 2 is Client

?>
                   <form method="POST" >
                                <button class="btn btn-primary text-center" type="submit" name="Disconnect"> Disconnect </button>

                   </form>
        <?php

               }
               if( $_SESSION['STATUS'] == 1 ){ //1 is moderator
                ?>
                <a class="nav-item text-light" href="ModeratorView.php">
                    <span class="far fa-user fa-2x"></span> Moderator View
                </a>
             <?php
            } if ( $_SESSION['STATUS'] == 0) { //0 is streamer
                ?>
                   <a class="nav-item text-light" href="ModeratorView.php">
                       <span class="far fa-user fa-2x"></span> Moderator View
                   </a>
                   <a class="nav-item text-light" href="AddModerator.php">
                       <span class="far fa-user fa-2x"></span> Add Moderator
                   </a>

            <?php
               }
           }

             ?>
        </div>
    </div>
    <div class="nav-item active">
            <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.twitch.tv/?channel=squeezielive" allowfullscreen="true" scrolling="no"></iframe><a href="https://www.twitch.tv/squeezielive?tt_content=text_link&tt_medium=live_embed" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px; text-decoration:underline;">Regardez une vidéo en direct de Squeezielive sur www.twitch.tv</a>
            </div>
    </div>
    </div>

    <?php

    if(isset($_POST['Disconnect'])) {
        session_start();
        session_unset();
        session_destroy();
        header('Location:Home.php');
    }
    ?>
    ?>
    </body>
</html>