function inString(e,i){return-1!==e.indexOf(i)}function isMobile(e){var i=window.innerWidth/obj.variables.fontSize,n=document.documentElement.clientWidth/obj.variables.fontSize,r=document.body.clientWidth/obj.variables.fontSize;return e>=(i||n||r)}function debounce(e,i,n){var r;return function(){var t=this,a=arguments,o=function(){r=null,n||e.apply(t,a)},d=n&&!r;clearTimeout(r),r=setTimeout(o,i),d&&e.apply(t,a)}}function addBrowserClass(){var e=navigator.userAgent.toLowerCase(),i=jQuery("html");e.match(/(iphone|ipod|ipad)/)&&i.addClass(obj.prefix+"-ios mobile"),inString(e,"msie")?i.addClass(obj.prefix+"-ie"):inString(e,"chrome")?i.addClass(obj.prefix+"-chrome"):inString(e,"firefox")?i.addClass(obj.prefix+"-firefox"):inString(e,"safari")&&e.search("chrome")<0?i.addClass(obj.prefix+"-safari"):inString(e,"opera")&&i.addClass(obj.prefix+"-opera")}function addWidgetContainer(){var e=jQuery(".widget");e&&e.length&&e.each(function(){var e=jQuery(this);e.wrapInner('<div class="widget-content"></div>');var i=e.find(".widget-title");i&&i.length&&i.prependTo(e)})}var prefix="dcbase",obj={lang:"dcbase",prefix:prefix,classes:{},variables:{bottom:document.body.scrollHeight+window.innerHeight,fontSize:16}};jQuery(document).ready(function(e){addBrowserClass(),addWidgetContainer()});