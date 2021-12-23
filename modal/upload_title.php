
<?php
include_once "../base.php";
?>

<h3>更新<?=$DB->upload;?></h3>
<hr>
<!-- multipart/form-data 一定要記得加 -->
<!-- <form action="api/upload_title.php?id=  < ?=$_GET['id'];?>" method="post" enctype="multipart/form-data"> -->
<form action="api/upload.php?do=<?=$DB->table;?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><?=$DB->upload;?>：</td>
            <td><input type="file" name="img" ></td>
        </tr>

    </table>    
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div><input type="submit" value="更新"><input type="reset" value="重置"></div>
    <!-- 按下新增厚資料會傳到api/title.php -->
</form>