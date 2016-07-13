//v3-b11
$(function(){
	var article_id = GetQueryString('article_id')
	
	if (article_id=='') {
    	window.location.href = WapSiteUrl + '/index.html';
    	return;
	}
	else {
		$.ajax({
			url:"../../mobile/index.php?act=index&op=special&special_id=2",
			type:'get',
			data:{},
			jsonp:'callback',
			dataType:'jsonp',
			success:function(result){
				var data = result.datas;
				var html = template.render('article', data);				
				console.log(data);
				$("#article-content").html(html);
				$(".article-content").html(data.article_content);
			}
		});
	}	
});