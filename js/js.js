// JavaScript Document
// ready瀏覽器歐執行完後開始去執行程式，不想家的話就把ready放在body的前面還後面忘了
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			//this".mainmu"
			//children只能抓到第一層不能抓第二層    a標籤不能包a標籤
			$(this).children(".mw").show()		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	// 上面這個東西先淡出  
	$(x).fadeIn()
	
	if(y)
	$(y).fadeIn()

	// y  url都在的話去執行一段指令叫$(y).load(url)
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}