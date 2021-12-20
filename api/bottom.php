<?php include_once "../base.php";

// $view=$_POST['total'];
// // echo "views=>".$views;
// $total-$Total->find(1);
// $total['total']=$views;
// $Total->save($total);

$Bottom->save(['id'=>1,'bottom'=>$_POST['bottom']]);

to("../back.php?do=bottom");
