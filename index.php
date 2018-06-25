<?php
# aaa002
/**
 * Front controller
 */

// session
session_start();

# aaa003
// dependance
require_once "config.php";

# aaa042 - try to create PDO instance
try {

    # aaa043 create PDO instance in $pdo
    $pdo = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PWD);

    # aaa046 display PDO sql error in "dev" mode
    if (DB_MODE == "dev") {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    # aaa047 - persistante connexion if true;
    if (DB_PERSIST) {

        $pdo->setAttribute(PDO::ATTR_PERSISTENT);

    }

# aaa048 if error
} catch (PDOException $e) {

    # aaa049 stop the script et display error code
    die("Error: " . $e->getMessage());
}

# aaa005
// autoload
spl_autoload_register(function ($nameClass) {
    require_once "Model/$nameClass.class.php";
});

# aaa006 pre routing
// if connected
if (isset($_SESSION['monid']) && $_SESSION['monid'] == session_id()) {

    require_once "Controller/AdminController.php";

# aaa007 if public
} else {

    require_once "Controller/PublicController.php";

}