<?php

/**
 * @param $url
 * @param bool $permanent
 */
function redirect($url, $permanent = false) {
    if ($permanent) {
        header('HTTP/1.1 301 Moved Permanently');
    }
    header('Location: ' . $url);
    exit();
}

/**
 * @brief Check if password is valid
 * @param $password user's password
 * @return bool
 */
function checkPassword($password) {
    
    if(strlen($password)>= 8 && strlen($password) <= 50) {
        return true;
    } else {
        echo "<p>Password must have 8-50 </p>";
        return false;
    }
    
}

/**
 * @brief checks if password and password confirmation are identical
 * @param $password user's password
 * @param $verif_password   password Confiramtion
 * @return bool
 */
function equivPassword($password, $verif_password) {
    $hash_password = sha1($password);
    $hash_verif = sha1($verif_password);

    if($hash_password == $hash_verif) {
        return true;
    } else {
        echo "<p>Passwords are not identical</p>";
        return false;
    }
}

/**
 * @brief checks if requested username is valid
 * @param $username
 * @return bool
 */
function checkUsername($username) {
    
    $filter_username = filter_var(trim($username), FILTER_SANITIZE_STRING);
    $username_len = strlen($filter_username);
    if(!empty($filter_username)) {
        if($username_len <= 20 && $username_len >=3 ) {
            if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)) {
                return true;
            } else {
                echo "<p>Don't use special characters</p>";
                return false;
            }
        } else {
            echo "<p>Username length between  3-20 characters</p>";
            return false;
        }
    } else {
        echo "<p>Username can't be empty</p>";
        return false;
    }
}

/**
 * @brief Verify if username is already used
 * @param $username
 * @return bool
 */
function checkExistUsername($username) {

    $db = new DB();
    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }
    $result = $db->query("SELECT userName FROM User WHERE userName='$username'");
    $rows = 0;

    while($row = $result->fetchArray()) {
        $rows += 1; //+1 to the counter per row in result
    }

    
    if($rows == 0) {
        return true;
    } else {
        echo "<p>Username already taken</p>";
        return false;
    }
}


?>