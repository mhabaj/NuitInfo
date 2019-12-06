<?php


class Message
{
    private $message;
    private $sender;

    public function __construct($message, $sender){
        $this->message = filter_var($message, FILTER_SANITIZE_STRING);
        $this->sender = $sender;
    }

    public function createMessage() {

        $db = new DB();
        if(!$db) {
            echo $db->lastErrorMsg();
        }
        date_default_timezone_set(date_default_timezone_get());
        $dt = date('m/d/Y h:i:s a', time());
        $sql = <<<EOF
        INSERT INTO send (idStream, idUser, message, MessageDate, messageStatus) VALUES (1,'$this->sender','$this->message','$dt', 0 );
EOF;
        $ret = $db->query($sql);
    }
}

?>