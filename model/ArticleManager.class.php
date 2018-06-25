<?php
# aaa032
/**
 * Manager class Article
 */

class ArticleManager
{
    # aaa033
    private $db;

    # aaa034
    public function __construct(PDO $connect)
    {
        # aaa035
        $this->db = $connect;
    }

    # aaa036 Read for article (cRud)

    # aaa037 list all articles
    public function listArticle(){

        # aaa038 - recup all articles without util at the moment
        // $get = $this->db->query("SELECT a.* FROM article a ORDER BY a.thedate DESC;");

        # aaa060 - replace a38 recup all articles with JOIN util
        $get = $this->db->query("SELECT a.*,
          u.idutil,u.thelogin,u.thename 
          FROM article a INNER JOIN util u 
            ON a.utilIdutil = u.idutil
          ORDER BY a.thedate DESC;");

        # aaa039 => one or more result
        if($get->rowCount()){

            # aaa041 - return array assoc's in array index
            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{
            # aaa040 => no result => return false
            return false;
        }
    }
    # aaa063 get one article
    public function oneArticle(int $id){
        $sql = "SELECT a.*,
          u.idutil,u.thelogin,u.thename 
          FROM article a INNER JOIN util u 
            ON a.utilIdutil = u.idutil
          WHERE a.idarticle=?";
        $request = $this->db->prepare($sql);
        $request->bindValue(1,$id,PDO::PARAM_INT);
        $request->execute();
        if($request->rowCount()){
            return $request->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    # aaa103 list all articles by idutil
    public function listArticleUtil(int $idutil){

        $get = $this->db->query("SELECT a.*,
          u.idutil,u.thelogin,u.thename 
          FROM article a INNER JOIN util u 
            ON a.utilIdutil = u.idutil
          WHERE u.idutil = $idutil
          ORDER BY a.thedate DESC;");

        # aaa104 => one or more result
        if($get->rowCount()){

            # aaa105 - return array assoc's in array index
            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{
            # aaa106 => no result => return false
            return false;
        }
    }

    # aaa094 Create (Crud)
    public function createArticle(Article $datas){
        # aaa100 if the idutil is the same as utilIdutil
        if($datas->getUtilIdutil()==$_SESSION['idutil']){

            $sql = "INSERT INTO article (thetitle,thetext,thedate,utilIdutil) VALUES (?,?,?,?)";

            $post = $this->db->prepare($sql);

            $post->bindValue(1,$datas->getThetitle(),PDO::PARAM_STR);
            $post->bindValue(2,$datas->getThetext(),PDO::PARAM_STR);
            $post->bindValue(3,$datas->getThedate(),PDO::PARAM_STR);
            $post->bindValue(4,$datas->getUtilIdutil(),PDO::PARAM_INT);

            $post->execute();

            if($post->rowCount()){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
    
    # aaa119 update article (crUd)
    public function updateArticle(Article $newDatas, int $getIdArticle){
       
        # aaa120 verif if user is creator of article 
        if($newDatas->getUtilIdutil()==$_SESSION['idutil']){
            # aaa121 verif if article is the same in object and url
            if($newDatas->getIdarticle()==$getIdArticle){
                # aaa122 prepare update
                $sql = "UPDATE article SET thetitle=?, thetext=?, thedate=? WHERE idarticle=?";
                $update = $this->db->prepare($sql);
                # aaa123 execute with array for replace bindValue or bindParam without type verification
                $update->execute(
                        [
                            $newDatas->getThetitle(),
                            $newDatas->getThetext(),
                            $newDatas->getThedate(),
                            $newDatas->getIdarticle()
                        ]);
                # aaa124 if update ok
                if($update->rowCount()){
                    return true;
                }else{
                    return false;
                }
                
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    # aaa128 Delete Article (cruD)
    public function deleteArticle(Article $id){
        # aaa129 perpare delete if utilIdutil is the same in SESSION
        $sql = "DELETE FROM article WHERE idarticle=? AND utilIdutil=?";
        $del = $this->db->prepare($sql);
        $del->bindValue(1, $id->getIdarticle(),PDO::PARAM_INT);
        # aaa130 permission user to delete his article
        $del->bindValue(2, $_SESSION['idutil'],PDO::PARAM_INT);
        $del->execute();
        if($del->rowCount()){
            return true;
        }else{
            return false;
        }
    }

}