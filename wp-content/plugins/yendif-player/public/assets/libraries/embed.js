/* Copyright (c) 2013 Yendif! Technologies Ltd */
(function(f,b){if("undefined"==typeof isYendif){var h=function(c,e,d){if(c)return d(c);done=!1;var a=b.createElement("script");a.onload=a.onreadystatechange=function(){if(!(done||a.readyState&&"loaded"!=a.readyState&&"complete"!=a.readyState))return done=!0,a.onload=a.onreadystatechange=null,d()};a.async=!0;a.src=e;g.appendChild(a)},g=b.getElementsByTagName("head")[0],k="undefined"!=typeof jQuery?parseFloat(jQuery().jquery):0,c=b.currentScript||b.scripts[b.scripts.length-1];_source=c.src;_base=_source.split("embed.js")[0];
_yflib=_base+"yendifplayer.js";_yfskin=_base+"yendifplayer.css";h(1.7<=k,"//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js",function(f){h("undefined"!=typeof yendifplayer,_yflib,function(e){e=_yfskin;var d=b.createElement("link");d.rel="stylesheet";d.type="text/css";d.href=e;g.appendChild(d);c.parentNode.removeChild(c)});jQuery.noConflict()});f.isYendif=!0}else c=b.currentScript||b.scripts[b.scripts.length-1],c.parentNode.removeChild(c)})(window,document);