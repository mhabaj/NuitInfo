<?php 
include "header.html";
include "navbar.html";
include('../Controller/Class/User.php');
include('../Controller/Class/Message.php');


session_start();// ici on continue la session
if($_SESSION['STATUS'] == 0 || $_SESSION['STATUS'] == 1){

?>
<div class="container">
<p></p>
<div class="form-group">
<form action="" method="POST">
            <div class=" w-50">
                <textarea class="form-control"  name="message"  id="messageAlix" placeholder="Write down your message" >
                </textarea>
            </div>
   
            <div class="w-50">
                <button class="btn btn-primary text-center" type="submit" name="sendMessage"> Submit Message </button>
            </div>
    </form>
    <?php

    if(isset($_POST['sendMessage'])) {

        $message = $_POST['message'];

        $msg = new Message($message, $_SESSION['ID']);

        $msg->createMessage();
    }
    ?>
</div>
    <div class="embed-responsive embed-responsive-16by9 w-50">
        <iframe src="https://player.twitch.tv/?channel=sardoche" allowfullscreen="true" class="embed-responsive-item"/>
    </div>
</div>


</body>
</html>

<?php }
else {
        redirect('Home.php');
} ?>