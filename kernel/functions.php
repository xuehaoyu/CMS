<?php
class tree {
    public $str = "";
    public $ul = "";
    public $conStr= "";
    /*构建分类树*/
    public function createTree ($pid,$db,$table,$step,$flag,$currentcid) {
        $currentpid = "";
        if($currentcid){
            $sql = "select * from ".$table." where cid=".$currentcid;
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $result->fetch();
            $currentpid = $rows["pid"];
        }
        $sql = "select * from ".$table." where pid=".$pid;
        $step+=1;
        $indexFlag = str_repeat($flag,$step);
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($rows = $result->fetch()){
            $cid = $rows["cid"];
            $cname = $rows["cname"];
            if($currentpid == $cid){
                $this->str.="<option value='$cid' selected>".$indexFlag.$cname."</option>";
            }else{
                $this->str.="<option value='$cid'>".$indexFlag.$cname."</option>";
            }
            $this->createTree($cid,$db,$table,$step,$flag,$currentcid);
        }
    }
    /*展示分类*/
    public function cateShowTree ($pid,$db,$table){
        $sql = "select * from ".$table." where pid=".$pid;
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($rows = $result->fetch()){
            $cid = $rows["cid"];
            $cname = $rows["cname"];
            $this->ul.="<ul class='lists'>";
            $this->ul.= "<li>".$cname."<a class='edit' href='editCategory.php?cid={$cid}'>编辑</a><a class='delete' href='delCategory.php?cid={$cid}'>删除</a></li>";
            $this->cateShowTree($cid,$db,$table);
            $this->ul .= "</ul>";
        }
    }
    public function delCategory ($cid,$db,$table){
        /*通过传入的cid判断他下面有没有子分类*/
        $sql = "select * from ".$table." where pid=".$cid;
        $result = $db->query($sql);
        /*判断没有子分类*/
        if($result->rowCount() == 0){
            /*通过cid找出要删除的子类的pid,即他上一级的cid*/
            $sqlT = "select * from ".$table." where cid=".$cid;
            $resultT = $db->query($sqlT);
            $resultT->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $resultT->fetch();
            $pid = $rows["pid"];
            /*删除已经没有子分类的分类*/
            $sql = "delete from ".$table." where cid=".$cid;
            if($db->exec($sql)){
                /*删除成功后判断他上一级分类还有没有子分类*/
                $sqlF = "select * from ".$table." where pid=".$pid;
                $resultF = $db->query($sqlF);
                if($resultF->rowCount() == 0){
                    /*如果没有，则将删除的类的上一级分类的状态变为0*/
                    $sqlS = "update ".$table." set state=0 where cid=".$pid;
                    if($db->exec($sqlS)){
                        echo "<script>alert('删除成功');location.href='showCategory.php'</script>";
                    }
                }else{
                    /*如果仍存在子分类，则保持状态1*/
                    echo "<script>alert('删除成功');location.href='showCategory.php'</script>";
                }
            }
        }else{
            echo "<script>alert('该分类拥有子类，无法删除');location.href='showCategory.php'</script>";
        }
    }
    /*内容所属分类展示树*/
    public function conCateTree ($pid,$db,$table,$step,$flag,$currentcid){
        $sql = "select * from ".$table." where pid=".$pid;
        $step+=1;
        $indexFlag = str_repeat($flag,$step);
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($rows = $result->fetch()){
            $cid = $rows["cid"];
            $cname = $rows["cname"];
            if($currentcid && $currentcid == $cid){
                $this->conStr.="<option value='$cid' selected='selected'>".$indexFlag.$cname."</option>";
                var_dump($this->conStr);
            }else{
                $this->conStr.="<option value='$cid'>".$indexFlag.$cname."</option>";
            }
            $this->conCateTree($cid,$db,$table,$step,$flag,$currentcid);
        }
    }
}
?>