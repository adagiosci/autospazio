var timer_banner_1;
var px1=0;
var px2=73;
var px3=-32;
var timer;
var aux;
$(document).ready(function(e){
	var size_img = $("#home .banner img").size()
	$("#home .banner img").eq(0).addClass('on')
	var height = $("#home .banner img").eq(size_img-1).attr('height')
	height = Number(height) + 7;
	$("#home .banner").height(height)
	timer_banner_1=setTimeout("init_move_banner1()",6000);

      $("#contact #form1").submit(function(e){
            e.preventDefault();
            $.post($(this).attr("action"),{
                  subject : $("#subject").val(),
                 	Message : $("#Message").val(),
                  Email : $("#Email").val(),
                 	Name : $("#Name").val()   
           	},function(r){
                  $(".note").hide();
                  $("." + r).show();
           });
     });	

	$(".check-field").focus(function(e){
		if($(this).hasClass("empty")){
			$(this).val("").addClass("full");
		}
		if($(this).hasClass("label")){
			$(this).prev().addClass("hidden");
		}
	}).focusout(function(e){
		var val = $.trim($(this).val());
		if(val == ""){
			$(this).val($(this).attr("title"));
			$(this).addClass("empty").removeClass("full");
			if($(this).hasClass("label")){
				$(this).prev().removeClass("hidden");
			}
		}else{
			$(this).addClass("full").removeClass("empty");
		}
	});

	$(".check-field").addClass("empty");

	$('#home .box-bullets a.bullets').click(function(e){
		e.preventDefault()
		var next = $(this).index()
		clearTimeout(timer_banner_1);
		$('#home .box-bullets .bullets.on').removeClass('on')
		$('#home .box-bullets .bullets').eq(next-1).addClass('on')

		var imgs = $(".banner.style1 img");
		var actual= $(".banner.style1 img.on").index(".banner.style1 img");
		imgs.eq(next-1).fadeIn(1000);
		imgs.eq(actual).fadeOut(1000,function(){
				timer_banner_1=setTimeout("init_move_banner1()",6000);
				imgs.removeClass("on")
				imgs.eq(next).addClass("on")
		});		
	})

	$('#home .box-bullets .arrow-right').click(function(e){
		e.preventDefault()
		move_banner1();
	})

	$('#home .box-bullets .arrow-left').click(function(e){
		e.preventDefault()
		move_banner1(true);
	})
	$("body").on("click",'#see-link',function(e){
		e.preventDefault();
		$('#sharelink').removeClass('hidden');
		$('#link-share').selectText();
		//$(this).addClass('hidden');
		//$('#copy-link2').removeClass('hidden');
		//$('#input-link').removeClass('hidden');
		//$('#input-link2').focus();
		//$('#input-link2').select();
	});
	$('#sharelink .close').click(function(e){
		e.preventDefault();
		$('#sharelink').addClass('hidden');
	});
});
jQuery.fn.selectText = function(){
   var doc = document;
   var element = this[0];
   console.log(this, element);
   if (doc.body.createTextRange) {
       var range = document.body.createTextRange();
       range.moveToElementText(element);
       range.select();
   } else if (window.getSelection) {
       var selection = window.getSelection();        
       var range = document.createRange();
       range.selectNodeContents(element);
       selection.removeAllRanges();
       selection.addRange(range);
   }
};
function init_move_banner1(){
	move_banner1(true);
}
function move_banner1(right){
	clearTimeout(timer_banner_1);
	var imgs = $(".banner.style1 img");
		var size =imgs.size();
		//if(size>1){
			var actual= $(".banner.style1 img.on").index(".banner.style1 img");
			var next =right?(actual+1)%size:actual-1;
			next=next<0?size-1:next;
			imgs.eq(next).fadeIn(1000);
			imgs.eq(actual).fadeOut(1000,function()
			{
				$(this).removeClass("on");
				$('#home .box-bullets .bullets.on').removeClass('on')
				$('#home .box-bullets .bullets').eq(next).addClass('on')
				imgs.eq(next).addClass("on");
				timer_banner_1=setTimeout("init_move_banner1()",6000);
			});
		//}
}

