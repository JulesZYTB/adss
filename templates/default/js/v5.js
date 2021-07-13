
function iOSversion() {
  if (/iP(hone|od|ad)/.test(navigator.platform)) {
    // supports iOS 2.0 and later: <http://bit.ly/TJjs1V>
    var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
    return [parseInt(v[1], 10), parseInt(v[2], 10), parseInt(v[3] || 0, 10)];
  }
}



jQuery.extend(jQuery.fn,{

/*
** Year selection plugin
** Sample usage
** $('#yearpicker').years(2007, 2017);
**
** HTML
** <select name="yearpicker" id="yearpicker"></select>
*/
years: function(start, end) {
    for (i = end; i >= start; i--)
    {
        $(this).append($('<option />').val(i).html(i));
    }
}

});

var thisyear= new Date().getFullYear();
thisyear++;

$(document).ready(function() {




var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

var viewportWidth  = $(window).width();


if ((ua.indexOf("blackberry") >= 0) ||  ua.indexOf("bb10") >= 0) {
	//alert('1');

	 $(".table-responsive").css("direction","ltr");
    $(".table-responsive table.table").css("direction","rtl");
    $( ".table-responsive" ).scrollLeft( 400 );
       $(".img_carousel").css("direction","ltr");
       $(".img_carousel ul").css("direction","ltr");

}

	if(viewportWidth <400){



		if($( ".side-col" ).hasClass( "sidebarhide" )){
				$(".side-col").show();

		}

	}

$(".showhideside").click(function(){
    $(".sidebarhide").show();
    $(".showhideside").hide();
  });

  $(".removetouch").css("-webkit-overflow-scrolling","auto");



if(isAndroid) {
  // Do something
  //$(".table-responsive").css("-webkit-overflow-scrolling","auto");
  $(".img_carousel ul").css("-webkit-overflow-scrolling","auto");
    $(".img_carousel").css("direction","rtl");
    $(".hideandroid").hide();

    $(".tableAds   td:nth-child(2)  a:link").css("font-weight","normal");

if (document.documentElement.clientWidth > 600) {
  $(".tableAds   td:nth-child(2)  a:link").css("font-size","23px");
}
  
     $(".table-responsive").css("direction","ltr");
    $(".table-responsive table.table").css("direction","rtl");
  $( ".table-responsive" ).scrollLeft( 400 );

  
}
	
  ver = iOSversion();
if(ver){
if (ver[0] <= 6) {
  //alert('This is running iOS 5 or later.');
//$(".table-responsive ").css("-webkit-overflow-scrolling","auto");
//$(".table-responsive > *").css("-webkit-overflow-scrolling","touch");
  $(".img_carousel").css("direction","ltr");
    //$(".img_carousel ul").css("direction","rtl");
  $(".table-responsive").css("direction","ltr");
    $(".table-responsive table.table").css("direction","rtl");
  $( ".table-responsive" ).scrollLeft( 400 );
  // $('.table-responsive table.table').css({"-webkit-transform":"translateZ(0px)"});​
 //  $('.table-responsive > *').css('-webkit-transform', 'translateZ(0px)');
} else {
	$(".img_carousel").css("direction","ltr");
	$(".img_carousel ul").css("direction","rtl");
}
}


	$('.moreelementsinmain').hide();
	$('#year').years(1970, thisyear);
 
 
 $('.showmoreoptions').click(function () {
	$('.moreelementsinmain').show();
	$('.showmoreoptions').hide();
	$('#year').hide();
	

	
	
	
 });
 
 $('#startmodel').years(1970, thisyear);
 $('#startmodel').on('change', function() {
   //alert( this.value ); // or $(this).val()
   $('#endmodel')
       .find('option')
       .remove()
       .end()
       .append('<option value="'+$(this).val()+'">إلى موديل</option>')
       
   ;

   
   
   var lastmodel = $(this).val() + 5;
   if(lastmodel > thisyear){
   	lastmodel=thisyear;
   }
   $('#endmodel').years($(this).val(), lastmodel);
 });
 
 
 
 
 
 
$(function(){
        var el=$('input:checkbox[name="models[]"]');
		
        el.live('change', function(e){
			
			
		
			
			var optionvalue =$(".subcity option:selected").val();
			
			if( optionvalue !=''){
				
			
            if($(this).val()!='allmodels')
            {
                if($(this).is(':checked'))
                    $('#allmodels').prop('checked', false);
            }
            else
            {
                if($(this).is(':checked'))
                    el.not($(this)).prop('checked', false);
            }
			} else {
				
				 $(this).prop('checked', false);
				 alert('نرجو أختيار نوع السيارة أولا');

				//  $('#choosemodelpopover').popover('destroy');
 				
				 
				 $('.subcity').focus();
				 
				 
			}
			
			
			
			if ($('input:checkbox[name="models[]"]:checked').length == 0)
			{
			    // any one is checked
				
				 $('#allmodels').prop('checked', true);
			}
			
			//check if there is checked value 
			// if not check all
        });
    });
	
	$(function(){
	        var el=$('input:checkbox[name="cities[]"]');
	        el.live('change', function(e){
				
				
	            if($(this).val()!='allcities')
	            {
	                if($(this).is(':checked'))
	                    $('#allcities').prop('checked', false);
	            }
	            else
	            {
	                if($(this).is(':checked'))
	                    el.not($(this)).prop('checked', false);
	            }
				
				//check if there is checked value 
				// if not check all
				
				if ( $('input:checkbox[name="cities[]"]:checked').length ==0)
				{
				    // any one is checked
					 $('#allcities').prop('checked', true);
				}
				
				
				
				
	        });
	    });
		
		
   	 $(".moreModels").live("click", function(){
   	 
   	   	var lastYear = $(this).attr("rel");
   	 	start =parseInt(lastYear) - 1;
   	 	var end = start - 5;
   	 	for (start;start>end;start--){  
   	 	  
		   
			$('<div class="checkbox"> <label>  <input name="models[]" type="checkbox"  value="'+start+'">'+start+'</label></div>').insertBefore(this);
   	 	} 
		
		$('<div class="checkbox"> <label>  <input name="models[]" type="checkbox"  value="'+end+'">'+end+'</label></div>').insertBefore(this);
		
		$(this).attr('rel', end);
		if(end < 1970){
			$(this).remove();
		}
	
   	 
   
   	 });

   	 $(".moreTags").live("click", function(){
   	 	$(".showTags").show();
   	    $(this).remove();
   	 });


   	 $(".moreCities").live("click", function(){
   	 	$(".showCities").show();
   	    $(this).remove();
   	 });
	 
	 $(".moreModels2").live("click", function(){
   	 $(".showModels2").show();
   	 $(this).remove();
   	 });
		
		



//####### copy from edit2

	$("#tagselect select").live('change',function(){
		var name=$(this).val();
		var referal = $("[name='referal']").val();

		var level=parseInt($(this).attr('id'));
		if(level==1){
			$("#model").remove();
		}
		
		$('#'+level).nextAll('select').remove();
		
		if(name){	
			
			name =encodeURIComponent(name);	
			
		$.ajax({
		  url: "/getSectionv5.php?name="+name+"&level="+level+"&referal="+referal,
		  cache: false
		}).done(function( html ) {
		  $("#tagselect").append(html);
		});
		}
	});
	
	
	





$('input[name="ads_title"]').keyup(function() {
		if (this.value.match(/[^a-zA-Z\(\).0-9ضصثقفغعهخحجدذشسيبلاتنمكطئءؤرلاىةوزظَآإأـى٠١٢٣٤٥٦٧٨٩_ -]/g)) {
          this.value = this.value.replace(/[^a-zA-Z\(\).0-9ضصثقفغعهخحجدذشسيبلاتنمكطئءؤرلاىةوزظَآإأـى۰۱۲۳٤٥٦٧۸۹_ -]/g, '');
      }
  });


 $("#fileupload").submit(function() {
	 var error=false;
	  var length= $('input[name="ads_title"]').val().length;
	  if(length < 5){
		  alert("العنوان قصير جدا");
		  $('input[name="ads_title"]').focus();
		  error=true;
		  return false;
	  }
	  
	  var length= $('select[name="ads_city"]').val().length;
	 
	  if(length < 3){
		  alert("نرجو إختيار المدينة");
		  $('select[name="ads_city"]').focus();
		  error=true;
		  return false;
	  }
	  
	  
	 
	  
	  
	  var length= $('select[name=ads_tags\\[\\]]').val().length;
 	  if(length < 2){
 		  alert("نرجو ذكر القسم المناسب");
 		  $('select[name=ads_tags\\[\\]]').focus();
 		  error=true;
 		  return false;
 	  }
	  
	  var length= $('input[name="ads_contact"]').val().length;
	  if(length < 5){
		  alert("نرجو ذكر رقم جوالك أو وسيلة إتصالك");
		  $('input[name="ads_contact"]').focus();
		  error=true;
		  return false;
	  }
	  
	  
	 /* var length= $('textarea[name="ads_body"]').val().length;
	  if(length < 5){
		  alert("نرجو كتابة كل تفاصيل الإعلان");
		  $('textarea[name="ads_body"]').focus();
		  error=true;
		  return false;
	  }
	  */
	
	  if(!error){
		   return true;
	  }
	
	
	 });
	 
	 
	
	 
	 $("#changesection").click(function() {
	 
	 $('#tagselect').replaceWith(' <div id="tagselect"><select class="form-control  ads_tags modonly" id="1" name="ads_tags[]">\
						   			 <option value="">أختر القسم المناسب</option>\
					    			 <option value="حراج السيارات">حراج السيارات</option>\
									 <option value="حراج العقار">حراج العقار</option>\
									 <option value="حراج الأجهزة">حراج الأجهزة</option>\
									 <option value="كل الحراج">أخرى</option>\
			</select></div>');
	 });




//############ copy from edit2



	var numbers = ["الرياض", "الشرقيه", "جده", "مكه", "ينبع", "حفر الباطن", "المدينة", "الطايف", "تبوك", "القصيم", "حائل", "أبها", "الباحة", "جيزان", "نجران", "الجوف", "عرعر", "الكويت", "الإمارات", "قطر", "البحرين"];

	for (i=0;i<numbers.length;i++){
	   $('<option/>').val(numbers[i]).html(numbers[i]).appendTo('.cities');
	}


 $('.reportUser button').live('click',function() {			
		   var report_value=$(this).attr("value");
		    var report_remove_id=$(this).attr("rel");
		   $.get("/AJAXreportuser.php", { value: report_value} );
		  
			$('#'+report_remove_id).parent().html('<span class="label label-success">تم الإبلاغ. شكرا لك</span>');
			$(this).parent().parent().parent().parent().remove();


        });

 $('.loadMoreComments').live('click',function() {			
			    var rel=$(this).attr("rel");
				//$(".allComments").html('<div align="center"><br />جاري التحميل</div>');
				//$(".allComments").load("/AJAXloadComments.php?value="+rel);

				$( ".commentbtndiv" ).remove();

				var content;
$.get("/AJAXloadComments.php?value="+rel, function(data){
    content= data;
    $(".allComments").prepend(content);
});

	        });
			



		$(function() {
	   
		      // Create the dropdown base
		      $('<select class="form-control" />').appendTo("nav:first");
      
		   
      
		      // Populate dropdown with menu items
			  var activeText = $('nav ul li.active a').text();

			  var activeHref = $('nav ul li.active a').attr('href');

		      $("nav a").each(function() {
		       var el = $(this);
			   
			   
			 
			  
			   if(activeHref == el.attr("href")){
			       $("<option />", {
					   "selected": "selected",
			           "value"   : el.attr("href"),
			           "text"    : el.text()
			       }).appendTo("nav select");
			   }else {
			   
		       $("<option />", {
		           "value"   : el.attr("href"),
		           "text"    : el.text()
		       }).appendTo("nav select");
			   }
			   
		      });

		      $("nav select").change(function() {
		        window.location = $(this).find("option:selected").val();
		      });
	 
			 });



if(viewportWidth <770){
 $(".tableAds").find("td:nth-child(2)").each(function () {

   if ($(this)[0].scrollWidth >  $(this).innerWidth()) {

   	var maketextlinkshort=$(this).find('a:first').text();
   	//alert(maketextlinkshort.substring(0,14));
   	$(this).find('a:first').text(maketextlinkshort.substring(0,30));
}
});
}
 

$('.nextad').on('click', function() {
  ga('send', 'event', 'link', 'nextad');
});

$('.sidebar.page-left-content').on('click', function() {
  ga('send', 'event', 'link', 'similarads');
});

$('a.tag.fromad').on('click', function() {
  ga('send', 'event', 'tag', 'tagfromads');
});


$('a.tag.fromoldad').on('click', function() {
  ga('send', 'event', 'tag', 'tagfromadsold');
});

$('a.tag.fromoldad').on('click', function() {
  ga('send', 'event', 'tag', 'tagfromadsold');
});
$('iframe').on('click', function() {
  ga('send', 'event', 'like');

});
$('#follow').on('click', function() {
  ga('send', 'event', 'follow', tag);
  //alert(tag);
});
$('#unfollow').on('click', function() {
  ga('send', 'event', 'unfollow', tag);
  //alert(tag);
});




$('.note_replay').on('click', function() {
  ga('send', 'event', 'note', 'note_replay');
});



$('.note_follow_tag').on('click', function() {
  ga('send', 'event', 'note', 'note_follow_tag');
});



$('.note_follow_seller').on('click', function() {
  ga('send', 'event', 'note', 'note_follow_seller');

});



$('.hideandroid').on('click', function() {
  ga('send', 'event', 'whatsapp');


});






});

 








	
	  

	
	 

