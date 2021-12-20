<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=web11_lv1";
    protected $user="root";
    protected $pw='';
    protected $pdo;
    protected $table;
    //ptotected 不能被改，所以要改成public公開才能，但要小心能改=會不小心改錯
    public $title;
    public $button;
    public $header; //校園映像圖片
    public $append;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
        // switch case 後臺功能標題本來可以放在這裡，但這樣不好我們希望建構式簡短不要塞東西
        // 我在建立資料表的時候請去執行setstr，然後要把table放進去
        $this->setStr($table);
    }
    
    // 設定文字
    private function setStr($table){;
        switch($table){
            case "title";
                $this->title="網站標題管理";
                $this->button="新增網站標題圖片";
                $this->header="網站標題";
            break;
            case "ad";
            $this->title="動態文字廣告管理";
            $this->button="新增動態文字廣告";
            $this->header="動態文字廣告";
            break;
            case "mvim";
            $this->title="動畫圖片管理";
            $this->button="新增動畫圖片";
            $this->header="動畫圖片";
            break;
            case "image";
            $this->title="校園映像資料管理";
            $this->button="新增校園映像圖片";
            $this->header="校園映像資料圖片";
            break;
            case "total";
            $this->title="進站總人數管理";
            $this->button="";
            $this->header="進站總人數:";
            break;
            case "bottom";
            $this->title="頁尾版權資料管理";
            $this->button="";
            $this->header="頁尾版權資料";
            break;
            case "news";
            $this->title="最新消息資料管理";
            $this->button="新增最新消息資料";
            $this->header="最新消息資料內容";
            break;
            case "admin";
            $this->title="管理者帳號管理";
            $this->button="新增管理者帳號";
            $this->header="帳號";
            $this->append="密碼";
            break;
            case "menu";
            $this->title="選單管理";
            $this->button="新增主選單";
            $this->header="主選單名稱";
            $this->append="選單連結網址";
            break;
        }
    }

    public function find($id){
        $sql="SELECT * FROM $this->table WHERE ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .= " `id`='$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";

        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql .=" WHERE ".implode(" AND ".$arg[0])." ".$arg[1];

            break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " WHERE ".implode(" AND ".$arg[0]);
                }else{
                    $sql .= $arg[1];
                    
                }
            break;
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function math($method,$col,...$arg){
        $sql="SELECT $method($col) FROM $this->table ";

        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql .=" WHERE ".implode(" AND ".$arg[0])." ".$arg[1];

            break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " WHERE ".implode(" AND ".$arg[0]);
                }else{
                    $sql .= $arg[1];
                    
                }
            break;
        }


        return $this->pdo->query($sql)->fetchColumn();
    }
    public function save($array){
        if(isset($array['id'])){
            //update
            foreach($array as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql="UPDATE $this->table 
                     SET ".implode(",",$tmp)."
                   WHERE `id`='{$array['id']}'";
        }else{
            //insert

            $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($array))."`) 
                                     VALUES('".implode("','",$array)."')";
        }

        return $this->pdo->exec($sql);
    }
    
    public function del($id){
        $sql="DELETE FROM $this->table WHERE ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .= " `id`='$id'";
        }

        return $this->pdo->exec($sql);
    }
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


}


function to($url){
    header("location:".$url);
}

$Total=new DB('total');
$Bottom=new DB('bottom');
$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$News=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');

// 因為do可能不存在，所以不要用DB,前面先隨便發一個變數
//$tt=(isset($_GET['do']))?$_GET['do']:'';
//$tt=isset($_GET['do'])??'';
// 當你有db這些東西的時候吧我把db的變數轉為相應的內容
$tt=$_GET['do']??'';

switch($tt){
    case "title":
        $DB=$Title;
    break;
    case "ad":
        $DB=$Ad;
    break;
    case "mvim":
        $DB=$Mvim;
    break;
    case "image":
        $DB=$Image;
    break;
    case "total":
        $DB=$Total;
    break;
    case "bottom":
        $DB=$Bottom;
    break;
    case "news":
        $DB=$News;
    break;
    case "admin":
        $DB=$Admin;
    break;
    case "menu":
        $DB=$Menu;
    break;
}

// $total=$Total->find(1);

// // echo $Total->find(1)['total'];
// echo $total['total'];

// print_r($Total->all());

if(isset($_SESSION['total'])){
    // 把total拿出來，資料庫改變，再存進去
    $total=$Total->find(1);
    $total['total']++;
    $Total->save($total);
    $_SESSION['total']=$total['total'];

}

// // 把功能項目放到這裡做在在各地table叫出來，但這樣還是容易改錯，所以不建議
// $titleSer={
//     'title'=>"網站標題管理";
//     'ad'=>"動態文字廣告";
//     'mvim'=>"動畫圖片管理";

// } -->
?>