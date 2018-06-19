<?php
# aaa010
/**
 * Mapping table util
 */

class User
{

    private $iduser, $login, $name, $pwd, $permission_idpermission;


    public function __construct(Array $datas)
    {

        $this->hydrate($datas);
    }


    private function hydrate(Array $theDatas)
    {
        foreach ($theDatas as $thekey => $thevalue) {
            $createNameSetter = "set" . ucfirst($thekey);
            if (method_exists($this, $createNameSetter)) {
                $this->$createNameSetter($thevalue);
            } else {
                echo "The setter: $createNameSetter don't exist<br>";
            }
        }

    }

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @return mixed
     */
    public function getPermissionIdpermission()
    {
        return $this->permission_idpermission;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser): void
    {
        $this->iduser =(int) $iduser;
    }

    /**
     * @param mixed $login
     */
    public function setLogin(string $login): void
    {
     $data =  trim(htmlspecialchars(strip_tags($login)),ENT_QUOTES);
        if (!empty($data)) {
            $this->login = $data;
        }}

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $data =  trim(htmlspecialchars(strip_tags($name)),ENT_QUOTES);
        if (!empty($data)) {
            $this->name = $data;
        }}

    /**
     * @param mixed $pwd
     */
    public function setPwd(string $pwd)
    {
        $this->pwd = hash("sha256",$pwd);
    }

    /**
     * @param mixed $permission_idpermission
     */
    public function setPermissionIdpermission($permission_idpermission): void
    {
        $this->permission_idpermission = (int)$permission_idpermission;
    }


}

