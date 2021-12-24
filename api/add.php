<?php
include  "../base.php";
// 如果isset 這個file是存在的，就表示檔案上傳是成功的
//如果上傳成功就把檔案移動到當前api目錄外面的img資料夾
//然後改名成$_FILES['img']['name']
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    //因為要放到資料庫裏面所以取一個變數data裡面要放一個img
    $data['img']=$_FILES['img']['name'];

}else{
    if($DB->table!='admin' && $DB->table!='menu'){
        $data['img']='';
    }
}
switch($DB->table){
    case "title":
//第1筆資料顯示，後面不顯示...?   但很麻煩所以全部預設不顯示
$data['text']=$_POST['text'];
$data['sh']=0;
break;
    case "admin":
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case "menu":
        $data['name']=$_POST['name'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
        $data['parent']=0;
    break;




// 不是title的話就要去判斷有沒有欄位
    default:
        $data['text']=$_POST['text']??'';
        $data['sh']=1;
    break;

}



$DB->save($data);
to("../back.php?do=".$DB->table);

// dd($_POST);

// dd($_FILES); 
