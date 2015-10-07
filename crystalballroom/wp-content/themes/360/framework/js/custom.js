jQuery(function($){
$(document).ready(function(){

//SUPERFISH			
$("ul.sf-menu").supersubs({ 
	minWidth:    12,   
	maxWidth:    27,   
	extraWidth:  1     
	}).superfish({
	autoArrows: true,
	delay:  800, 
	speed:  'fast',
	animation:  {opacity:'show', height:'show'}
	}
);

//TOOLTIP
$('.demo-tip-twitter').poshytip({
	className: 'tip-twitter',
	showTimeout: 1,
	alignTo: 'target',
	alignX: 'right',
	offsetY: -23,
	offsetX:20,
	allowTipHover: false,
	fade: false,
	slide: false
});

//TOOLTIP
$('.mainControls').poshytip({
	className: 'tip-twitter',
	showTimeout: 1,
	alignTo: 'target',
	alignX: 'right',
	offsetY: -38,
	offsetX:15,
	allowTipHover: false,
	fade: false,
	slide: false
});

$('.thumbnail-panels').poshytip({
	className: 'tip-twitter',
	showTimeout: 1,
	alignTo: 'target',
	alignX: 'top',
	offsetY: 25,
	offsetX:-60,
	allowTipHover: false,
	fade: false,
	slide: false
});

//FRED CAROUSEL
$('#carousel ul').carouFredSel({
	prev: '#prev',
	next: '#next',
	pagination: "#pager",
	auto: true,
	scroll: 800,
	pauseOnHover: true
});

//FLEXSLIDER
$('.flexslider').flexslider({
	animation: "slide"
});
	    
//TOGGLE
$('#slide_info_toggle').toggle(function(){

$(this).addClass('closed');

$('#slidecaption, #slidedescription').hide();
	}, function () {

$(this).removeClass('closed');

$('#slidecaption, #slidedescription').show();

});

//TOGGLE SHORTCODE	
$(".toggle_container").hide(); 
$("h3.trigger").click(function(){
$(this).toggleClass("active").next().slideToggle("normal");
	return false;
});
     
//FITVIDS
$(".container").fitVids();

$("ul.sf-menu ul li").removeClass("current-menu-item");

//RESPONSIVE MENU
$("<select />").appendTo("#nav");
$("<option />", {
	"selected": "selected",
	"value"   : "",
	"text"    : "Menu"
}).appendTo("#nav select");

$("#nav a").each(function() {
	var el = $(this);

$("<option />", {
	"value"   : el.attr("href"),
	"text"    : el.text()
}).appendTo("#nav select");
});
		
//REMOVE OPTIONS WITH #
$("#nav option").each(function() {
var navOption = $(this);
if( navOption.val() == '#' ) {
navOption.remove();
}
});
		
$("#nav select").change(function() {
 window.location = $(this).find("option:selected").val();
});
		
//UNIFORM
$(function(){
 $("#nav select").uniform();
});	

Shadowbox.init({
    handleOversize: "drag",
    modal: true
});

}); // END doc ready
}); // END function