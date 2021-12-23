<!-- 
// 如果有id這個值就是要用現有的編號進行編輯


// 如果你有勾刪除我再去刪 沒有的話就不刪除

// 次選單依附在主選單之下，如果主選單沒有顯示 次選單就不會show出來

// 上面是編輯 下面是新增

// 你的值就是get  main裡面的值
// id=0 主選單
// id=1 ,id=3 就是id1或3的次選單 -->

<?php  include_once "../base.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $key=>$id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $sub=$Menu->find($id);
            $sub['name']=$_POST['name'][$key];
            $sub['href']=$_POST['href'][$key];
            $Menu->save($sub);
        }
    }
}

if(isset($_POST['name2'])){
    foreach($_POST['name2'] as $key=>$name){
        if($name!=''){
            $Menu->save(['name'=>$name,
                         'href'=>$_POST['href2'][$key],
                         'sh'=>1,
                         'parent'=>$_GET['main']]);
        }
    }
}

to("../back.php?do=".$Menu->table);



?>