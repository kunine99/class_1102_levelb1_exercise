<div class="di"
style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<!-- 這張ad資料表裡 sh1 的才是我要顯示出來的 -->
<?php include "marquee.php";?>
<div style="height:32px; display:block;"></div>
<!--正中央-->
<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
    </div>
</div>

<script>
    var lin = new Array();

    <?php
        //撈出所有要顯示的動畫圖片並放入JS陣列中
        $mvs=$Mvim->all(['sh'=>1]);
        foreach($mvs as $mv){
        ?>
            lin.push('<?="img/{$mv['img']}";?>')
        <?php    
        }

    ?>
var now = 0;
ww()   //先執行一次

    if (lin.length > 1) {
        setInterval("ww()", 3000);
        now = 1;
    }
    
    function ww() {
        // 僅字號代表id ..代表      .html 代表在選擇棄宣告的東西裡面放什麼東西的內榮
        $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        if (now >= lin.length)
            now = 0;
    }
    </script>
    <div
        style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區

        <?php 
                if($News->math('count','*',['sh'=>1])>5){
                    echo "<a href='?do=news' style='float:right'>More...</a>";
                }
            ?>
<!--  echo mb_substr($n['text'],0,20);整串文字不管多長，幫我從開始抓數字 -->


        </span>
        <ul class="ssaa" style="list-style-type:decimal;">
        <?php
            $news=$News->all(['sh'=>1]," LIMIT 5");
            foreach($news as $n){
                echo "<li>";
                echo mb_substr($n['text'],0,20);
                echo "<div class='all' style='display:none'>{$n['text']}</div>";
                echo "</li>";
            }

        ?> 
    </ul>
        <div id="altt"
            style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
        </div>
        <script>
            // .m.n　表示這兩個樣式是寫在一起的　像是＜div class="m n"＞,在設定時會用.m.n去寫
            // .m .n 代表上一層標籤是m 下一層標籤是n ，這是全部的下一層都套用
            //.m > .n 只有這一層?
        $(".ssaa li").hover(
            // 一般摳被function都有名稱，但這個沒有，通常是動作的當下只執行一次
            function() {
                //$(this)只li，指的就是當下你移上去的li裡面的child
                $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                $("#altt").show()
            }
        )
        $(".ssaa li").mouseout(
            function() {
                $("#altt").hide()
            }
        )
        </script>
    </div>
</div>