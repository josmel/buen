(function(){define(function(){"use strict";function n(n){var t;for(t=0;t<n.length;t+=1)n[t](r)}function t(){var t=u;a&&t.length&&(u=[],n(t))}function e(){a||(a=!0,c&&clearInterval(c),t())}function o(n){return a?n(r):u.push(n),o}var d,i,c,l="undefined"!=typeof window&&window.document,a=!l,r=l?document:null,u=[];if(l){if(document.addEventListener)document.addEventListener("DOMContentLoaded",e,!1),window.addEventListener("load",e,!1);else if(window.attachEvent){window.attachEvent("onload",e),i=document.createElement("div");try{d=null===window.frameElement}catch(f){}i.doScroll&&d&&window.external&&(c=setInterval(function(){try{i.doScroll(),e()}catch(n){}},30))}"complete"===document.readyState&&e()}return o.version="2.0.1",o.load=function(n,t,e,d){d.isBuild?e(null):o(e)},o})}).call(this);