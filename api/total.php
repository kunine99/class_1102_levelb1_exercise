<?php include_once "../base.php";

// $view=$_POST['total'];
// // echo "views=>".$views;
// $total-$Total->find(1);
// $total['total']=$views;
// $Total->save($total);

$Total->save(['id'=>1,'total'=>$_POST['total']]);

to("../back.php?do=total");
