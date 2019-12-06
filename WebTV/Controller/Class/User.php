<?php
//include_once('../functions/control-session.php');
include_once('../Controller/Class/DataBase.php');
require_once('../Controller/functions/functions.php');
global $msg;

class User{
    private $username, $password, $status;

    /**
     * @brief User constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password) {

        $this->username = $username;
        $this->password = $password;

    }

    /**
     * @brief Sign up a new user
     * @param $verif_pass password confirmation
     */
    public function signUp($verif_pass) {
        //check if credentials are vaild
        //hash password

        global $msg;



        if(checkPassword($this->password) && equivPassword($this->password, $verif_pass) && checkUsername($this->username) && checkExistUsername($this->username)) {
            //passwordHash
            $hash_password = sha1($this->password);

            $db = new DB();
            if(!$db) {
                echo $db->lastErrorMsg();
            }

            $sql = <<<EOF
    INSERT INTO user (userName, password, status) VALUES ('$this->username', '$hash_password', 2);
EOF;

            $ret = $db->query($sql);


            $msg .= "<p>Account created <a href='A INSERER'>Login here</a></p>";

        } else {
            $msg .= "<p>Error signup</p>";
        }
    }

    /**
     * @brief login a user using entered credentials
     */
    public function login() {
        //Check if username is not vaild
        //hash password
        global $msg;


        if(checkPassword($this->password) && checkUsername($this->username)) {
            //Hashage du mdp
            $hash_password = sha1($this->password);

            //Inserer valeurs



            $db = new DB();
            if(!$db) {
                echo $db->lastErrorMsg();
            }
            $result = $db->query("SELECT * FROM User WHERE userName = '$this->username' AND password= '$hash_password'");
            $rows = 0;

            while($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $rows += 1; //+1 to the counter per row in result
            }

            if($rows == 1) {
                $res = null;
                while($res = $result->fetchArray(SQLITE3_ASSOC)) {

                    session_start();
                    $_SESSION['ID'] = $res['idUser'];
                    $_SESSION['USERNAME'] = $res['userName'];
                    $_SESSION['STATUS'] = $res['status'];
                    $this->status = $res['status'];
                    $_SESSION['STATUS'] = $res['status'];

                    $msg .= "<p>login success</p>";

                    redirect('Home.php');
                }
            }
            } else {
                $msg .= "<p>Bad credentials</p>";
            }
    }

    /**
     * @brief disconned user and clear session and all it's temporary data
     */
    public function disconnect() {
        session_unset();
        session_destroy();
        echo "Disconnected";
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
