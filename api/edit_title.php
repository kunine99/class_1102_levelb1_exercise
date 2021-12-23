<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        //刪除   檢查有沒有這個陣列存在，如果有大表要被刪除，如果沒有就表示沒有要被刪除
        $Title->del($id);
        
        // in_array(); 主要的功能在於查詢是否存在，若存在則回傳TRUE，若是不存在則回傳FLASE，它單純是一個用來判斷條件是否純在陣列的功能，而且使用的方法也相當的簡單。
        // in_array(要搜尋的值,被搜尋的陣列);
        // in_array的回傳值是布林值，也就是TRUE或是FALSE，因此可以直接丟進判斷式作為使用

    }else{
        //更新
        // $data['id']=$id;// Save陣列有個特色，沒有id就新增
        // 既然我要更新我就用id去把資料撈出來，用一微陣列這個陣列會有這筆資料的相應內容
        
        $data['text']=$_POST['text'][$key];
        $data['sh']=($_POST['sh']==$id)?1:0;
        $Title->save($data);
        // 1. if($_POST['sh']==$id){   
        // sh是固定的值，不是陣列   如果相同的話就回傳1，不同回傳0
        // 2. $data['sh']=1;     
        }
        // else{
        // 3.    $data['sh']=0;    
        // }
    
}

// 表單的欄位會被放到
// dd($_POST);

// 先判斷這個值在不在

// 這是一個防護，如果沒有做的話就會有一個notice錯誤訊息
// if(isset($_POST['id'])){}
to("../back.php?do=".$Title->table);



?>