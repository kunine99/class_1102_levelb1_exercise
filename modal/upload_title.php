<h3>更新標題區圖片</h3>
<hr>
<!-- multipart/form-data 一定要記得加 -->
<!-- <form action="api/upload_title.php?id=  < ?=$_GET['id'];?>" method="post" enctype="multipart/form-data"> -->
<form action="api/upload_title.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img" ></td>
        </tr>

    </table>    
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div><input type="submit" value="更新"><input type="reset" value="重置"></div>
    <!-- 按下新增厚資料會傳到api/title.php -->
</form>