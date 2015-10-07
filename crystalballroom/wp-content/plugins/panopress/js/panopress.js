/** PanoPress v.1.2 | Developed by Omer Calev <http://www.omercalev.com/> | Code licensing & documentation <http://www.panopress.org/> **/
var panopress=function(){function ha(){for(var a=0,b=J.length;a<b;a++)try{J[a]()}catch(c){}J=[]}function P(){U||(U=!0,ha())}function ia(a){J.push(a);U&&ha()}function H(a){var b=a.indexOf("-");if(0===b)return a=a.substring(1),a.substring(0,1).toUpperCase(),a.substring(1),H(name);0<b&&(a=a.substring(0,b)+a.substring(b+1,b+2).toUpperCase()+a.substring(b+2));return 0<a.indexOf("-")?H(a):a}function ca(a){a=a.replace(/^\s+|\s+$/g,"").toLowerCase();if(-1!=a.indexOf("rgb")){rgba=a.substring(a.indexOf("(")+ 1,a.indexOf(")")).split(",");a="#";for(var b=0;3>b;b++)a+=parseInt(rgba[b]).toString(16)}return a}function sa(a){a=ca(a);a="#"==a[0]?a.substring(1):a;for(var b=[],c=0,d=0;3>d;d++){var e=3==a.length?a[d]+a[d]:a.substring(c,c+2);b.push(parseInt(e,16));c+=2}return b}function ja(a,b,c){a=document.createElement(a);return b?R(a,b,c):a}function R(a,b,c){return c?b.insertBefore(a,b.firstChild):b.appendChild(a)}function K(a,b){return a.parentNode.replaceChild(b,a)?b:!1}function D(a){if(L&&"object"==a.nodeName)for(var b= 0;b<a.length;b++)"function"==typeof a[b]&&(a[b]=null);return a.parentNode.removeChild(a)}function ta(a){if(a.hasChildNodes())for(;0<a.childNodes.length;)D(a.firstChild);return a}function M(a,b,c){a.style[H(b)]=c;"opacity"==b&&(a.style.filter="alpha( opacity="+100*c+" )");return a}function E(a,b){for(var c in b)M(a,c,b[c]);return a}function v(a,b,c){var d="";if(window.getComputedStyle)d=document.defaultView.getComputedStyle(a,null).getPropertyValue(b);else if(a.currentStyle){var e=H(b),d=a.currentStyle[H(b)]; "auto"==d&&(d="width"==e?a.offsetWidth:a.offsetHeight)}c&&("string"==typeof d&&(e=d.indexOf("px"),-1!=e&&(d=d.substring(0,e))),d="opacity"==b?parseFloat(d):parseInt(d));return d}function da(a,b,c){function d(a){return""==a||"transparent"==a||"rgba(0, 0, 0, 0)"==a}a=a.parentNode;for(var e=v(a,b,c);a&&1==a.nodeType&&d(e);)a=a.parentNode,1==a.nodeType&&(e=v(a,b,c));return e==d(e)?!1:e}function ea(a,b){for(var c=a.split(" "),d=0;d<c.length;d++)""!=c[d]&&b(c[d].replace(/^\s+|\s+$/g,""))}function ua(a, b){var c=!0;ea(b,function(b){RegExp("(^|\\s)"+b+"(\\s|$)","i").test(a.className)||(c=!1)});return c}function C(a,b){ea(b,function(b){ua(a,b)||(cn=a.className,a.className=cn+(cn.length?" ":"")+b)});return a}function ka(a,b){ea(b,function(b){a.className=a.className.replace(RegExp("(^|\\s)"+b+"(\\s|$)","i"),function(a){var b="";/^\s+.*\s+$/.test(a)&&(b=a.replace(/(\s+).+/,"$1"));return b}).replace(/^\s+|\s+$/g,"")});return a}function va(a,b){var c=b?b:["padding","margin","border"],d=["right","left"], e=["top","bottom"],f={width:0,height:0},k;for(k in c){for(var l in d)f.width+=v(a,c[k]+"-"+d[l]+("border"==c[k]?"-width":""),!0);for(var g in e)f.height+=v(a,c[k]+"-"+e[g]+("border"==c[k]?"-width":""),!0)}return f}function S(a,b,c,d){var e="undefined"!=typeof d;document.addEventListener?a.addEventListener(b,e?function(a){c(a,d)}:c,!1):document.attachEvent&&a.attachEvent("on"+b,e?function(a){c(a,d)}:c);return a}function Y(a,b,c){document.removeEventListener?a.removeEventListener(b,c,!1):document.detachEvent&& a.detachEvent("on"+b,c);return a}function y(a,b,c){var d=document.createElement("div");d.innerHTML=a;return b?R(d.firstChild,b,c):d.firstChild}function Q(a,b){b=b||document;return b.getElementsByTagName(a)}function la(a,b){b=b||document;if(document.getElementsByClassName)return b.getElementsByClassName(a);for(var c=[],d=b.getElementsByTagName("*"),e=0;e<d.length;e++)if(d[e]&&1==d[e].nodeType){var f=d[e].className;if(0<f.length)for(var f=f.split(" "),k=0;k<f.length;k++)f[k]==a&&c.push(d[e])}return c} function Z(a,b,c,d,e,f){return new wa(a,b,v(a,b),c,d,e,f)}function wa(a,b,c,d,e,f,k){var l=0,g=$.seq(c,d,e,f),m=this;this.active=!0;this.animate=function(){this.paused||(l==g.length-1&&(this.active=!1,k&&k()),M(a,b,g[l]),l++)};this.paused=!1;this.reset=function(){l=0;m.active=!0}}function ma(a){var b=[],c=this;this.active=!0;this.animate=function(){if(!this.paused){for(var c=0,e=0;e<b.length;e++)b[e].active&&(b[e].animate(),c++);0==c&&(a&&a(),this.active=!1)}};this.add=function(a){b.push(a)};this.paused= !1;this.reset=function(){for(var a=0;a<b.length;a++)b[a].reset();c.active=!0}}function na(a,b,c,d,e){switch(c){case "fast":c=200;break;case "slow":c=600;break;default:c=c||400}e=new ma(e);for(var f in b)e.add(new Z(a,f,b[f],c,d||EASE_IN_OUT));$.add(e)();return e}function I(a,b,c,d,e){return na(a,{opacity:b},c,d||EASE_NONE,e)}function N(a){var b=!1,c;if(L){var d=null;try{d=new ActiveXObject("ShockwaveFlash.ShockwaveFlash")}catch(e){}if(d){var f=null;try{f=d.GetVariable("$version")}catch(k){}f&&(f= f.split(" ")[1].split(","),c=[parseInt(f[0],10),parseInt(f[1],10),parseInt(f[2],10)],b=!0)}}else if(d=navigator.mimeTypes["application/x-shockwave-flash"])if(b="object"==typeof d.enabledPlugin&&"object"==typeof navigator.plugins["Shockwave Flash"])c=[],f=d.enabledPlugin.description,f=f.replace(/^.*\s+(\S+\s+\S+$)/,"$1"),c[0]=parseInt(f.replace(/^(.*)\..*$/,"$1"),10),c[1]=parseInt(f.replace(/^.*\.(.*)\s.*$/,"$1"),10),c[2]=/[a-zA-Z]/.test(f)?parseInt(f.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0;return b? a?(a=a.split("."),c[0]>a[0]?!0:c[0]==a[0]?c[1]>a[1]?!0:c[1]==a[1]?c[2]>a[2]?!0:!1:!1:!1):!0:!1}function xa(a){return N&&r&&a?(a=a.split("."),r[0]>a[0]?!0:r[0]==a[0]?r[1]>a[1]?!0:r[1]==a[1]?r[2]>a[2]?!0:!1:!1:!1):!1}function oa(a){return'<div class="pp-error"><div class="pp-error-msg">'+a+"</div><div>"}function pa(a){return oa(a+'<br><a href="http://www.adobe.com/go/getflashplayer" target="_blank"><img src="'+F+'images/get-flash.png"></a>')}function I(a,b,c,d){na(a,{opacity:b},c,EASE_NONE,d)}function T(a, b){n=new qa(pb_options,b);for(var c=[],d=0;d<u.length;d++)u[d].panobox&&(d==a&&(a=c.length),c.push(d),n.add(function(a){n.show(C(u[c[a]].getContent(n.bgcolor),"pb-content"),null,null,!1,u[c[a]].title)}));n.show(y("<div />"),null,null,!0,u[a].title,function(){n.play(a)})}function ya(a,b,c,d,e,f,k,l,g,m,w,q,z){function n(a,b){var c=y('<div style="width:100%;height:100%;top:0px;left:0px;cursor:pointer;position:absolute;margin:0;padding:0;border:0;" />',a);q&&C(c,"pp-embed-play");c.onclick=function(a){a= a||window.event;pp_oppp&&O!=t&&-1!=O&&u[O].reset();O=t;b(a);"undefined"!=typeof _trackEvent&&_trackEvent("PanoPress","Play",g)};return c}function r(){function a(b){b=b||window.event;var c=b.target,d=0;b.wheelDelta?(d=b.wheelDelta/120,window.opera&&(d=-d)):b.detail&&(d=-b.detail/3);d&&(c.get?(!0!=c.jsmwfix_on&&c.enable_mousewheel_js_bugfix&&(c.enable_mousewheel_js_bugfix(),c.jsmwfix_on=!0),c.externalMouseEvent?(c.externalMouseEvent(d),c.focus()):(d=c.get("view.fov")+5*d,c.call("zoomto("+d+")"))):c.changeFov&& (d=c.getFov()-5*d,c.moveTo(c.getPan(),c.getTilt(),d,1)));b.preventDefault&&b.preventDefault();b.returnValue=!1}var b=null,c=b="",e;for(e in s)b+='<param name="'+e+'" value="'+s[e]+'" />';if(L){for(var f in A)"data"==f.toLowerCase()?b+='<param name="movie" value="'+A[f]+'" />':"styleclass"==f.toLowerCase()?c+=' class="'+A[f]+'"':"classid"!=f.toLowerCase()&&(c+=" "+f+'="'+A[f]+'"');e="tmp_"+d;f=ja("object",Q("body")[0]);f.id=e;f.outerHTML='<object id="'+e+'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" '+ c+">"+b+"</object>";b=document.getElementById(e)}else{for(f in A)c+=" "+f+'="'+A[f]+'"';b=y("<object type=application/x-shockwave-flash"+c+">"+b+"</object>")}window.addEventListener?S(b,/Firefox/i.test(navigator.userAgent)?"DOMMouseScroll":"mousewheel",a):b.onmousewheel=b.onmousewheel=a;return b}function G(){fsrc=e+(-1==e.indexOf("?")?"?":"&");for(var a in l)fsrc+=a+"="+l[a]+"&";return y('<iframe src="'+fsrc+'" marginheight="0" marginwidth="0" frameborder="0" scrolling="no" style="display:none;width:'+ f+";height:"+k+'" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" />')}function B(a,b){return y('<a href="'+a+'" />'+(b||'<img src="'+F+'images/play.png" width="80" height="80" />')+"</a>")}function X(){var b=l.flashvars,d="krpano"==a?"":"externalinterface=1&";if(N)if(xa(c)){for(var q in b)d+=q+"="+b[q]+"&";s={flashvars:d,allowfullscreen:"true",quality:"high",menu:"false",bgcolor:ca(da(h,"background-color"))};for(var V in l)"flashvars"!=V&&(s[V]=l[V]);A={data:e};if(!w&& z)h=K(h,B("javascript:void(0)",g?g:m?m:null)),h.onclick=function(a){a=a||window.event;T(t,a)};else{if("auto"==s.wmode){b="window";"fpp"!=a&&w&&(!z||!pb_options.fullscreen)&&999>v(h,"width",!0)&999>v(h,"height",!0)&&(b="opaque");if("window"==b)for(d=0;d<u.length;d++)if(u[d].panobox){b="opaque";break}s.wmode=b}if(!w&&!pp_oppp||pp_oppp&&0==t&&aa&&!z)aa=!1,pp_oppp&&0==t&&(O=0),h=K(h,r()),E(h,{width:f,height:k}),C(h,"pp-embed-content");else var x=new n(h.parentNode,function(a){z?T(t,a):(h=K(h,r()),E(h, {opacity:"0",display:"block",width:f,height:k}),C(h,"pp-embed-content"),I(h,1,600),D(x))})}}else h.innerHTML=pa("Adobe Flash Player "+c+" or higher needed");else h.innerHTML=fa?oa("This device does not support Adobe Flash."):pa("Adobe Flash Player needed")}function x(){if(!w&&z){var a=B("javascript:void(0)",g?g:m?m:null);a.onclick=function(a){T(t,a)};h=K(h,a)}else if(!w&&!pp_oppp||pp_oppp&&0==t&&aa&&!z)aa=!1,pp_oppp&&0==t&&(O=0),h=K(h,G()),M(h,"display","block"),C(h,"pp-embed-content");else var b= new n(h.parentNode,function(a){if(z)if("5.0"==c&&pb_options.fullscreen){var d=u[t].getContent();R(d,Q("body")[0],!0);M(d,"display","block");d.requestFullscreen?d.requestFullscreen():d.mozRequestFullScreen?d.mozRequestFullScreen():d.webkitRequestFullscreen&&d.webkitRequestFullscreen();S(document,"fullscreenchange",function(){document.fullScreenElement||D(d)});S(document,"mozfullscreenchange",function(){document.mozFullScreenElement||D(d)});S(document,"webkitfullscreenchange",function(){document.webkitFullscreenElement|| D(d)})}else T(t,a);else h=K(h,G()),M(h,"display","block"),C(h,"pp-embed-content"),D(b)})}var s=null,A=null,t=0,h=null,aa=!0;this.title=g;this.panobox=z;this.init=function(a){function c(){w&&M(h.parentNode,"background-image","url("+w+")")}t=a;h=document.getElementById(d);ta(h);switch(b){case "flash":c();X(a);break;case "html":c();x(a);break;case "link":c(),x(a)}};this.reset=function(){h=K(h,y('<div id="'+d+'" />'));this.init(t)};this.getContent=function(a){if("flash"==b){var c=y("<div/>",Q("body")[0]); a&&(s.bgcolor=a);return r(c)}return"html"==b?G():null}}function qa(a,b){function c(a){if(!(a>n.length-1||0>a)){var b=H.childNodes;ka(b[G],"pb-nav-dot-active");C(b[G],"pb-nav-dot-on");G=a;n[G](G);ka(b[G],"pb-nav-dot-on");C(b[G],"pb-nav-dot-active")}}function d(b,c,d,e){J||(J=!0,a.fade?I(s,0,100,function(){D(s)&&I(x,0,50,function(){D(x)&&(Y(window,"keydown",R),Y(window,"resize",ba),Y(window,"orientationchange",ba),J=!1)})}):D(s)&&D(x)&&(Y(window,"keydown",R),J=!1))}function e(b,c){a.fade?(E(b,{display:"block", opacity:0}),K(t.firstChild,b),I(t.firstChild,1,500,c)):(M(b,"display","block"),K(t.firstChild,b),c&&c())}function f(b,c,d,f,g,l,m){var h=(fa?window.innerWidth:document.documentElement.clientWidth)-V.width,w=(fa?window.innerHeight:document.documentElement.clientHeight)-V.height-28,n=null;!P&&b&&(P=b instanceof HTMLImageElement)&&(T=b.width,U=b.height);var r=function(a,b){if(!/[^0-9]/.test(a))return a;var c=a.length-1,d=a.charAt(c),f="h"==b.toLowerCase(),e=function(){if(!n){if(!ga){var a=y('<div style=" width: 1in; height: 1in; position: absolute; left: -100%; top: -100%;"></div>', Q("body")[0]);ga={x:a.offsetWidth,y:a.offsetHeight};D(a)}n=ga}return n[f?"y":"x"]};"%"!=d&&(d=a.substring(--c));c=parseInt(a.substring(0,c));switch(d){case "%":c*=(f?w:h)/100;break;case "em":c*=v(z,"font-size",!0);break;case "ex":c=c*v(z,"font-size",!0)/2;break;case "in":c*=e();break;case "cm":c=c*e()/2.54;break;case "mm":c=c*e()/25.4;break;case "pt":c=c*e()/72;break;case "pc":c=c*e()/6}return Math.round(c)};a.fullscreen?(c=h,d=w):P?(c=T,d=U):(c=r(c||a.width,"w"),d=r(d||a.height,"h"));if(c>h||d>w)f? (f=Math.max(c/h,d/w),c=Math.round(c/f),d=Math.round(d/f)):(c>h&&(c=Math.round(c/(c/h))),d>w&&(d=Math.round(d/(d/w))));f={width:c+"px",height:d+28+"px",top:(w-d)/2+"px",left:(h-c)/2+"px"};var x={width:c+"px",height:d+"px"};if(g){X||E(s,{width:"10px",height:"10px",top:k.clientY+"px",left:k.clientX+"px",display:"block"});g=v(s,"width",!0);r=v(s,"height",!0);duration=Math.round(Math.max(Math.min(c-g,d-r),Math.min(c+g,d+r))/(l/1E3));c=new ma(function(){a.shadow&&C(s,"pb-shadow");b&&(E(b,x),e(b,m))});for(var u in f)c.add(new Z(s, u,f[u],duration,q));if(t.firstChild)for(u in x)c.add(new Z(t,u,x[u],duration,q)),c.add(new Z(t.firstChild,u,x[u],duration,q));$.add(c)()}else f.display="block",E(s,f),E(t,x),a.shadow&&C(s,"pb-shadow"),b&&e(b,m),t.firstChild&&E(t.firstChild,x)}if(b.target)k=b;else{var k={};k.clientX=b.clientX;k.clientY=b.clientY;k.target=b.srcElement}for(var l=0,g=Q("*"),m=0;m<g.length;m++){var w=v(g[m],"z-index",!0);w>l&&"auto"!=w&&(l=w)}var q=EASE_OUT,z=Q("body")[0],n=[],r={},G=0,u=0,X=!1,g="-"+Math.floor(11111* Math.random()),x=y('<div id="overlay'+g+'" style="width:100%;height:100%;position:fixed;z-index:'+(l+1)+';left:0px;top:0px;display:none" class="pb-overlay '+a.style.overlay+'"></div>',z),s=y('<div id="box'+g+'" style="display:none;position:fixed;z-index:'+(l+2)+'" class="pb-box '+a.style.box+'"></div>',z),m='<div id="container'+g+'"><div id="alt'+g+'"></div></div>'+('<div id="close'+g+'" class="pb-close"></div>'),m=m+('<div id="title'+g+'" class="pb-title"></div>'),m=m+('<div id="nav'+g+'" class="pb-nav"><div id="dots'+ g+'" class="pb-nav-dots"></div></div>'),m=m+('<div id="loader'+g+'" class="pb-loader"></div>');s.innerHTML=m;var A=document.getElementById("loader"+g),t=document.getElementById("container"+g),h=document.getElementById("alt"+g),B=document.getElementById("nav"+g),L=document.getElementById("close"+g),O=document.getElementById("title"+g),H=document.getElementById("dots"+g),V=va(s);if("pb-adaptive"==a.style.box){var w=da(k.target,"background-color"),W=sa(w),N=60,m="dark";384<W[0]+W[1]+W[2]&&(N*=-1,m="light"); C(x,"pb-"+m+"-overlay");C(s,"pb-"+m);for(var F="rgb(",m=0;m<W.length;m++)F+=W[m]+N,m<W.length-1&&(F+=",");E(s,{"background-color":w,"border-color":F+")",color:da(k.target,"color")})}var J=!1,P,T,U;this.id=g;this.bgcolor=ca(v(s,"background-color"));this.play=function(a){c(a)};this.add=function(a){n.push(a);a=y('<div class="pb-nav-dot pb-nav-dot-on" />',H);var b="dot_"+u;r[b]=u++;M(H,"width",v(H,"width",!0)+20+"px");a.onclick=function(){c(r[b])}};this.layer=function(a){l++;return y('<div style="width:'+ t.style.width+";height:"+t.style.height+";top:"+v(s,"padding-top")+";left:"+v(s,"padding-left")+";position:absolute;zIndex:"+(l+1)+'" class="'+a+'" />',s)};this.showLoader=function(){var a=v(s,"padding-top",!0)+v(t,"height",!0)/2-v(A,"height",!0)/2+"px",b=v(s,"padding-left",!0)+v(t,"width",!0)/2-v(A,"width",!0)/2+"px";E(A,{top:a,left:b,"z-index":l+1,opacity:0,display:"block"});setTimeout(function(){I(A,1,150)},200)};this.hideLoader=function(){M(A,"display","none")};this.reset=function(){this.hideLoader(); e(h)};this.show=function(b,c,d,e,g,k){O.innerHTML=g||"";g=v(x,"opacity");X?f(b,c,d,e,a.animate,2500,k):(E(x,{opacity:0,display:"block"}),I(x,g,200,function(){f(b,c,d,e,a.animate,2500,function(){var b=a.fade?180:0;I(O,1,b);I(L,1,b);1<n.length&&I(B,1,b);S(window,"keydown",R);S(window,"resize",ba,e);S(window,"orientationchange",ba,e);X=!0;k&&k()})}))};x.onclick=d;L.onclick=d;var R=function(a){27==a.keyCode&&d()},ba=function(a,b){f(null,null,null,b,!1,0)}}var F=function(a){for(var b=Q("script"),c=0,d= "";c<b.length&&""==d;){var e=b[c].src.lastIndexOf(a);-1!=e&&(d=b[c].src.substring(0,e));c++}return d}("panopress.js"),F=F.substring(0,F.lastIndexOf("js")),L=/msie/i.test(navigator.userAgent),fa=/iPhone|iPad|iPod/i.test(navigator.userAgent),U=!1,ra=null,J=[],$=null;(function(){document.addEventListener&&document.addEventListener("DOMContentLoaded",P,!1);if(L&&document.getElementById){var a="r"+Math.random();document.write('<script id="'+a+'" defer src="//:">\x3c/script>');document.getElementById(a).onreadystatechange= function(){"complete"===this.readyState&&P.call(this)}}/KHTML|WebKit|iCab/i.test(navigator.userAgent)&&(ra=setInterval(function(){/loaded|complete/i.test(document.readyState)&&(P.call(this),clearInterval(ra))},10));window.onload=P})();EASE_NONE=[100];EASE_IN=[1,2,4,6,8,9,10,10,10,10,10,10,10];EASE_OUT=[10,10,10,10,10,10,10,9,8,6,4,2,1];EASE_IN_OUT=[1,2,3,4,5,6,7,8,9,10,9,8,7,6,5,4,3,2,1];(function(){var a=[],b=!1,c=null,d=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame|| window.oRequestAnimationFrame||window.msRequestAnimationFrame||null,e=0,f=function(){for(var k=0,l=0;l<a.length;l++)a[l].active&&(a[l].animate(),k++);e++;(new Date).getTime();0==k?(clearInterval(c),c=null,b=!1,list=[],e=0):d&&d(f)};$={start:function(){if(c||b)return!1;b=!0;(new Date).getTime();d?d(f):c=setInterval(f,17)},add:function(b){b.active||b.reset();a.push(b);return this.start},seq:function(a,b,c,d){function e(a){if("string"==typeof a){var b=a.indexOf("px");-1!=b&&(a=a.substring(0,b),f="px"); return parseFloat(a)}return a}var f="",n=[a];a=e(a);b=e(b);var q=a;a=(b-a)/100;c=Math.ceil(c/17/d.length);for(var r=0;r<d.length;r++)for(var v=a*d[r]/c,u=0;u<c;u++)n.push((q+=v)+f);n[n.length]=b+f;return n}}})();/Android/i.test(navigator.userAgent);for(var B=["webkit","moz"],q=0;q<B.length;q++);var u=[],n=null,O=-1,N=!1,r=null,ga=null;if(L){B=null;try{B=new ActiveXObject("ShockwaveFlash.ShockwaveFlash")}catch(za){}if(B){q=null;try{q=B.GetVariable("$version")}catch(Aa){}q&&(q=q.split(" ")[1].split(","), r=[parseInt(q[0],10),parseInt(q[1],10),parseInt(q[2],10)],N=!0)}}else if(B=navigator.mimeTypes["application/x-shockwave-flash"])if(N="object"==typeof B.enabledPlugin&&"object"==typeof navigator.plugins["Shockwave Flash"])r=[],q=B.enabledPlugin.description,q=q.replace(/^.*\s+(\S+\s+\S+$)/,"$1"),r[0]=parseInt(q.replace(/^(.*)\..*$/,"$1"),10),r[1]=parseInt(q.replace(/^.*\.(.*)\s.*$/,"$1"),10),r[2]=/[a-zA-Z]/.test(q)?parseInt(q.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0;ia(function(){for(var a=0;a<u.length;a++)u[a].init(a)}); return{embed:function(a){u.push(new ya(a.viewer,a.type,a.version,a.id,a.file,a.width,a.height,a.params,a.title,a.alt,a.preview,a.button,a.panobox))},imagebox:function(){function a(a,d,k){var l={},g=c[k],m;for(m in pb_options)l[m]=pb_options[m];l.resize=0;l.fullscreen=0;n=new qa(l,d);var w=0;for(d=0;d<g.length;d++)a.href==g[d].href&&(w=d),n.add(function(a){b(g[a].href,g[a].title,a)});d=2*(12+8*g.length+6*a.title.length+32);n.show(y("<div/>"),Math.max(d,300),300,!0,a.title,function(){n.play(w)});return!1} function b(a,b,c){a=L?a+"?r="+Math.random():a;var d=ja("img");n.showLoader();d.onload=function(){n.reset();var a=d.width,e=d.height;d.onclick=function(a){n.play(c+((void 0==a.offsetX?a.layerX:a.offsetX)>a.target.width/2?1:-1))};n.show(d,a,e,!0,b)};d.src=a}var c=[],d=function(b){if(!(1>b.length)){for(var d=[],k=0;k<b.length;k++)d.push(b[k]);var l=c.push(d)-1;for(b=0;b<d.length;b++)d[b].onclick=function(b){return a(this,b||window.event,l)}}};ia(function(){d(la("panobox"));if(pb_options.galleries)for(var a= la("gallery"),b=0;b<a.length;b++)d(Q("a",a[b]))})}}}();
