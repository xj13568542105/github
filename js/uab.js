!function(t,n,a){function o(){var n=t.UA_Opt||UA_Opt;return n.LogVal?t[n.LogVal]||"":""}function e(){var t=setTimeout(function(){o()?(clearTimeout(t),UA_Opt.callback&&UA_Opt.callback()):e()},100)}function r(t,n){function a(){t.onreadystatechange=t.onload=null,t=null,l(n)&&n({from:"script"})}if("onload"in t)t.onload=a;else{var o=function(){/loaded|complete/.test(t.readyState)&&a()};t.onreadystatechange=o,o()}}function c(t){return function(n){return{}.toString.call(n)=="[object "+t+"]"}}Array.isArray||c("Array");var l=c("Function");!function(t,o){var c=n.createElement(a);c.async=!0,c.src=t,c.id=o,r(c,e);var l=n.getElementsByTagName(a)[0];l.parentNode.insertBefore(c,l)}(function(t){return"file:"===location.protocol&&/^\/\//.test(t)&&(t="https:"+t),t}("//aeu.alicdn.com/js/cj/98.js"),"sd-collina-acjs"),t.UA_Opt&&!UA_Opt.reload&&(UA_Opt.reload=function(){}),t.acjs=1}(window,document,"script");