window.progress=0;window.yass_progress=function(){if(window.started){var d=document,s,i='yass.progress';if(s=d.getElementById(i)){s.parentNode.removeChild(s)}s=d.createElement('script');s.type='text/javascript';s.src='cache/progress.js?'+Math.random();s.id=i;d.body.appendChild(s);s.onload=s.onreadystatechange=function(){var a=this.readyState,d=document;if(!a||a==='complete'||a==='loaded'){d.getElementById('bar').style.width=Math.round(244*(d.getElementById('cent').innerHTML=window.progress)/100)+'px'}}}setTimeout(function(){window.yass_progress()},500)};setTimeout(function(){window.yass_progress()},10);(function(){var d=document,a=d.getElementById('express'),l=d.links,m,i=0,h=location.hash,r=function(){var l=document.links,m,i=0;while(m=l[i++]){if(m.className==='z'){m.className=''}}};if(a){a.onclick=function(){window.started=1}};while(m=l[i++]){if(m.parentNode.nodeName.toLowerCase()==='label'){var n=m.getElementsByTagName('input')[0];n.style.visibility='hidden';n.parentNode.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement;if(t.nodeName.toLowerCase()==='a'){t.firstChild.click()}return false};n.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement,c=t.parentNode.className,d='w';switch(c){case 'r':case 'y':var l=t.parentNode.parentNode.parentNode.getElementsByTagName('a'),m,i=0;while(m=l[i++]){if(m.className==='y'){m.className='r'}}d='y';var x=t.value.split('#');t.form["user["+x[0]+"]["+t.name+"]"].value=x[1];break;case 'w':d='s';case 's':t.checked=true;t.value=d==='s'?0:1;break}t.parentNode.className=d;e.cancelBubble=true;if(e.stopPropagation){e.stopPropagation()}}}else{if(m.href.replace(/.*#/,"#")===h){r();m.className='z'}if(m.className==='x'){m.onclick=function(){document.forms[0].submit();return false}}else{if(m.parentNode.nodeName.toLowerCase()==='li'){m.onclick=function(e){e=e||window.event;var t=e.target||e.srcElement;r();t.className='z'}}else{if(m.parentNode.parentNode.className==='o'){m.target='_blank'}}}}}})()