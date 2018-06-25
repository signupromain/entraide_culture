<?php
/**
 * # aaa076 - UtilManager
 */

class UtilManager
{
    # aaa077 attribut
    private $db;

    # aaa078 construct
    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    # aaa079 identification
    public function identUtil(Util $user)
    {
        $sql = "SELECT * FROM util WHERE thelogin=? AND thepwd=?";
        $recup = $this->db->prepare($sql);
        $recup->bindValue(1, $user->getThelogin(), PDO::PARAM_STR);
        $recup->bindValue(2, $user->getThepwd(), PDO::PARAM_STR);
        $recup->execute();

        # aaa080 no result
        if (!$recup->rowCount()) {
            return false;
        } else {

            # aaa081 1 result, identification ok
            $this->createSession($recup->fetch(PDO::FETCH_ASSOC));
            return true;
        }
    }

    # aaa082 create session
    private function createSession(array $datas)
    {
        $_SESSION = $datas; // # aaa086 correct $_SESSION[]
        $_SESSION['monid'] = session_id();
    }

    # aaa088 method deconnect session
    public function deconnect()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        header("Location: ./");
    }


}