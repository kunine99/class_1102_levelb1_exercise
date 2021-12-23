<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $DB->title; ?></p>
    <form method="post" action="api/edit.php?do=<?= $DB->table; ?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?= $DB->header; ?></td>
                    <td width="23%"><?=$DB->append;?></td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $rows = $DB->all();
                foreach ($rows as $row) {
                    // 在迴圈開始前設一個變數名checked，如果sh是1的話，就把放checked，如果沒有就空字串
                    $checked = ($row['sh'] == 1) ? 'checked' : '';
                ?>
                    <tr>
                        <td width="45%">
                            <img src="./img/<?= $row['img']; ?>" style="width:300px;height:30px">
                        </td>
                        <td width="23%">
                            <input type="text" name="text[]" value="<?= $row['text']; ?>">
                        </td>
                        <td width="7%">

                            <input type="radio" name="sh" value="<?= $row['id']; ?>" <?= $checked; ?>>
                        </td>
                        <td width="7%">
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <!-- id因為會加多筆資料所以要用陣列的方式送出多筆資料 -->
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            <!-- 只要是更新就一定要知道對象是誰 -->
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/upload_title.php?id=<?= $row['id']; ?>&#39;)" value="更新圖片">
                            <!-- 按下後去modal_upload -->
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <!-- <input type="button" 
                        onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/
                        title.php&#39;)" 
                        value="< ?= $DB->button; ?>"> -->
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?= $DB->table; ?>.php?table=<?= $DB->table; ?>&#39;)" value="<?= $DB->button; ?>">

                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>