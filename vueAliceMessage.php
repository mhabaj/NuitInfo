<?php 
include "header.html";
include "navbar.html";
?>
<div class="container">
<p class="h2">
    Welcome <?php $user = "Alix" ;echo $user." !"; ?>
</p>
<div class="form-group">
<form action="" method="POST">
            <div class=" w-50">
                <textarea class="form-control" rows="5" cols="33" id="messageAlix">
                    You could enter your text here
                </textarea>
            </div>
   
            <div class="w-50">
                <input class="btn btn-primary form-control" type="submit"/>
            </div>
    </form>
</div>
    <div class="embed-responsive embed-responsive-16by9 w-50">
        <iframe src="https://player.twitch.tv/?channel=sardoche" allowfullscreen="true" class="embed-responsive-item"/>
    </div>
</div>


</body>
</html>