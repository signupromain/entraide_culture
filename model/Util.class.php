<?php
# aaa010
/**
 * Mapping table util
 */

class Util
{
    # aaa011
    private $idutil, $thelogin, $thename, $thepwd, $themail;

    # aaa012
    public function __construct(Array $datas)
    {
        # aaa014
        $this->hydrate($datas);
    }

    # aaa013
    private function hydrate(Array $theDatas){
        foreach ($theDatas as $thekey => $thevalue){
            $createNameSetter = "set".ucfirst($thekey);
            if(method_exists($this,$createNameSetter)){
                $this->$createNameSetter($thevalue);
            }else{
                echo "The setter: $createNameSetter don't exist<br>";
            }
        }
    }


    # aaa015 Setters

    public function setIdutil($idutil)
    {
        # aaa017 protected setters
        $this->idutil = (int) $idutil;
    }

    public function setThelogin(string $thelogin)
    {
        $data = trim(htmlspecialchars(strip_tags($thelogin)),ENT_QUOTES);
        if(!empty($data)) {
            $this->thelogin = $data;
        }
    }

    public function setThename(string $thename)
    {
        $data = trim(htmlspecialchars(strip_tags($thename)),ENT_QUOTES);
        if(!empty($data)) {
            $this->thename = $data;
        }
    }

    public function setThepwd(string $thepwd)
    {
        $this->thepwd = hash("sha256",$thepwd);
    }

    public function setThemail(string $themail)
    {
        $mail = filter_var($themail,FILTER_VALIDATE_EMAIL);
        if($mail) {
            $this->themail = $themail;
        }
    }

    # aaa016 getters

    public function getIdutil()
    {
        return $this->idutil;
    }

    public function getThelogin()
    {
        # aaa018 format getters
        return html_entity_decode($this->thelogin);
    }

    public function getThename()
    {
        return html_entity_decode($this->thename);
    }

    public function getThepwd()
    {
        return $this->thepwd;
    }

    public function getThemail()
    {
        return $this->themail;
    }
}
