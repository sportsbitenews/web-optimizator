window.yp=function(){if(window.started){var d=document,s,i='yass.progress';d.body.id='i';if(s=d.getElementById(i)){s.parentNode.removeChild(s)}s=d.createElement('iframe');s.src=window.wc+'progress.html?'+Math.random();s=d.body.appendChild(s)}setTimeout(function(){window.yp()},500)};setTimeout(function(){window.yp()},10);window.lp=function(a){var d=document;d.getElementById('d').style.left=15*Math.round(0.57*(d.getElementById('e').innerHTML=a))+'px';d.getElementById('b').style.width=Math.round(8.55*a)+'px'};(function(){var d=document,a=d.getElementById('express'),l=d.links,n,m,i=0,h=location.hash,r=function(){var l=document.links,m,i=0;while(m=l[i++]){if(m.className==='z'){m.className=''}}};if(a){a.onclick=function(){window.started=1}};while(m=l[i++]){if(m.parentNode.nodeName.toLowerCase()==='label'){var n=m.getElementsByTagName('input')[0];n.style.visibility='hidden';n.parentNode.parentNode.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement;if(/MSIE/.test(navigator.userAgent)){t.firstChild.firstChild.click()}};n.parentNode.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement;if(t.nodeName.toLowerCase()==='a'){t.firstChild.click()}return false};n.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement,c=t.parentNode.className,d='w';switch(c){case 'r':case 'y':var l=t.parentNode.parentNode.parentNode.getElementsByTagName('a'),m,i=0;while(m=l[i++]){if(m.className==='y'){m.className='r'}}d='y';var x=t.value.split('#');t.form["user["+x[0]+"]["+t.name+"]"].value=x[1];break;case 'w':d='s';case 's':t.checked=true;t.value=d==='s'?0:1;break}t.parentNode.className=d;e.cancelBubble=true;if(e.stopPropagation){e.stopPropagation()}}}else{if(m.href.replace(/.*#/,"#")===h){r();m.className='z';window.Q=m.name}if(m.className==='x'){m.onclick=function(){var d=document;d.forms[0].submit();if(d.getElementById('exp')){window.started=1}return false}}else{if(m.parentNode.nodeName.toLowerCase()==='li'){if(m.name){m.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement;t=t.href?t:t.parentNode;r();t.className='z';window.O=window.Q-t.name;window.Q=t.name;(function(f){var w=window,a=w.O,b=w.Q,d=document,c=d.getElementById('dirs').style;if(a>.2||a<-.2){c.marginTop=(-a-b+1)*444+'px';w.O=a/1.2;setTimeout(arguments.callee,20)}else{c.marginTop=(b-1?-10:0)-(b-1)*444+'px'}})();return false}}else{m.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement;r();t.className='z'}}}else{if(m.parentNode.parentNode.className==='o'){m.target='_blank'}}}}};if(n=d.getElementById('hideme')){n.style.display='none'};if(n=d.getElementById('showme')){n.style.display='block'}window.Q=1})()