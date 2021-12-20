<?php
include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
    $data['id']=$_POST['id'];
    $Title->save($data);
}

to("../back.php?do=".$Title->table);

?>