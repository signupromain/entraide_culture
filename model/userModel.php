<?php
function loginUser ($db,$login,$pwd,$PDO){
    $login = htmlspecialchars(strip_tags(trim($login)),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($pwd)),ENT_QUOTES);
    if (empty($login)||empty($pwd)) return false;
    $sql = "SELECT u.iduser,u.login,u.name,p.name,p.level FROM user u
  INNER JOIN permission p 
        ON u.permission_idpermission = p.idpermission
        WHERE u.login='$login' AND u.pwd='$pwd';";
    $recupLogin = $PDO->query($db,$sql) or die();
    return ($recupLogin->rowcount())?($recupLogin->fetchAll(PDO::FETCH_ASSOC)):false;

}

function userById($db,$id,$PDO){
    $id = (int) $id;
    $sql = "SELECT u.login, u.name AS username, p.name AS permname 
	        FROM user u 
		      INNER JOIN permission p 
		      ON u.permission_idpermission = p.idpermission
		    WHERE u.iduser=$id;";
    $request = $PDO->query($db,$sql);

    return ($request->rowcount()) ? $request->fetchAll(PDO::FETCH_ASSOC):false;
}
