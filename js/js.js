// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
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