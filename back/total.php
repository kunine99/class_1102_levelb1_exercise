<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進佔總人數管理</p>
    <!-- 刪除target="back"  原本可能是跟iframe連接的-->
    <form method="post"  action="?do=tii">
        <table width="50%" style="margin:auto">
        <!--  width="50%" style="margin:auto" 有空再改 -->
            <tbody>
                <tr class="yel">
                    <td width="50%">進佔總人數:</td>
                    <td width="50%">
                        <input type="number" name="total" value="<?=$Total->find(1)['total']?>">
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        

                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>