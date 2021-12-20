<?php
include  "../base.php";
// 如果isset 這個file是存在的，就表示檔案上傳是成功的
//如果上傳成功就把檔案移動到當前api目錄外面的img資料夾
//然後改名成$_FILES['img']['name']
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    //因為要放到資料庫裏面所以取一個變數data裡面要放一個img
    $data['img']=$_FILES['img']['name'];

}
//第1筆資料顯示，後面不顯示...?   但很麻煩所以全部預設不顯示
$data['text']=$_POST['text'];
$data['sh']=0;
$DB->save($data);
to("../back.php?do=".$DB->table)

// dd($_POST);

// dd($_FILES); 
?>