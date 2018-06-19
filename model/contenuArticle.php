<?php
/**
 * Created by PhpStorm.
 * User: kevin.kinanga
 * Date: 13/06/2018
 * Time: 12:00
 */

class contenuArticle
{
    private $idarticle,$title,$content,$publication,$visible,$user_iduser;

    /**
     * contenuArticle constructor.
     */
    public function __construct(Array $datas)
    {
        $this->hydrate($datas);
    }
    private function hydrate (Array $datas){
        foreach ($datas as $key => $value){
            $methode = "set".ucfirst($key);
            if (method_exists($this,$methode)){
               $this->$methode($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdarticle()
    {
        return $this->idarticle;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return html_entity_decode($this->title);
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return html_entity_decode($this->content);
    }

    /**
     * @return mixed
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * @return mixed
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @return mixed
     */
    public function getUserIduser()
    {
        return $this->user_iduser;
    }


    /**
     * @param mixed $idarticle
     */
    public function setIdarticle($idarticle)
    {   if (is_numeric($idarticle)) {
        $this->idarticle = (int)$idarticle;
        }
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = htmlspecialchars(strip_tags(trim($title)));
        if (empty($this->title)){
            die("Impossible d'inserer cet article");
        }
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = htmlspecialchars(strip_tags(trim($content)));
        if (empty($this->content)){
            die("Impossible d'inser cet article");
        }
    }

    /**
     * @param mixed $publication
     */
    public function setPublication($publication)
    {
        if (!empty($publication)) {
            $this->publication = $publication;
        }else {
            $this->publication= date("Y-m-d H:i:s");
        }
    }

    /**
     * @param mixed $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @param mixed $user_iduser
     */
    public function setUserIduser($user_iduser)
    {   if (is_null($user_iduser)) {
        $this->user_iduser = (int)$user_iduser;
    }}






}