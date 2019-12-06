<?php 
include "header.html";
include "navbar.html";
?>
<div class="form-group container">
<form method="POST" action="ALive.php">
    <input class="form-control" type ="text" name="login"/><label for="login">Login</label>
    <input class="form-control" type ="password" name="password" id="password"/><label for="password"> Password</label>
    <input class="form-control" type ="password" name="passwordConfirm" id="passwordConfirm"/><label for="passwordConfirm"> Password confirm</label>
    <span class="form-control"><input class="btn btn-primary" type="submit" /></span>
</form>
</div>
</body>
</html>