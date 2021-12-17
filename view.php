<?php
// 因為用網址的方式傳過來所以用get
switch ($_GET['do']) {
    case "title":
        echo "新增標題影片";
        break;
    case "ad":
        echo "動態文字廣告";
        break;
}
