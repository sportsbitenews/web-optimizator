(function(){
var _=function(a,b){b=b||_.doc;if(/^[\w#.]\w*$/.test(a)){var c=0,d=[];switch(a.charAt(0)){case '#':c=a.slice(1);d=_.doc.getElementById(c);if(_.doc.all&&d&&d.id!==c){d=_.doc.all[c]}return d?[d]:[];case '.':var e=a.slice(1);if(_.k){return (c=(d=b.getElementsByClassName(e)).length)?d:[]}else{e=' '+e+' ';var g=b.getElementsByTagName('*'),i=0,f;while(f=g[i++]){if((' '+f.className+' ').indexOf(e)!=-1){d[c++]=f}}return c?d:[]}default:return (c=(d=b.getElementsByTagName(a)).length)?d:[]}}else{if(_.q){return b.querySelectorAll(a)}else{var c=0,d=a.split(/ *, */),e,f=[],g,k,i,l,m,n,j,o,p,h,q,r,s,t,u;while(e=d[c++]){g=e.split(/ +/);m=u=[];h=n=j=i=0;while(k=g[i++]){k=/([^[:.#]+)?(?:#([^[:.#]+))?(?:\.([^[:.]+))?(?:\[([^!~^*|$[:=]+)([!$^*|]?=)?([^:\]]+)?\])?(?:\:([^(]+)(?:\(([^)]+)\))?)?/.exec(k);u[h++]=[k[1]?k[1].toLowerCase():'',k[2],k[3]?' '+k[3]+' ':'']}p=u[h-1];s=p[0];q=p[1];r=p[2];if(q){l=[_.doc.getElementById(q)];if(_.doc.all&&l[0].id!==q){l=_.doc.all[n]}while(o=l[j++]){if((!s||o.nodeName.toLowerCase()===s)&&(!r||(' '+o.className+' ').indexOf(r)!=-1)){if(i==1){o.yeasss=1}m[n++]=o}}}else{if(_.k&&r){l=_.doc.getElementsByClassName(r);while(o=l[j++]){if((!s||o.nodeName.toLowerCase()===s)&&(!q||o.id===q)){if(i==1){o.yeasss=1}m[n++]=o}}}else{l=_.doc.getElementsByTagName(s||'*');while(o=l[j++]){if((!q||o.id===q)&&(!r||(' '+o.className+' ').indexOf(r)!=-1)){if(i==1){o.yeasss=1}m[n++]=o}}}}i=h;if(i--){l=m;n=j=0;m=[];while(o=l[j++]){h=i-1;t=o;while((p=u[h--])&&t&&(t=t.parentNode)){s=p[0];q=p[1];r=p[2];while(t&&((s&&t.nodeName.toLowerCase()!==s)||(q&&t.id!==q)||(r&&(' '+t.className+' ').indexOf(r)==-1))){t=t.parentNode}}if (b&&b!==_.doc){while((t=t.parentNode)&&t!==b){}}if (o&&t&&!o.yeasss){o.yeasss=1;m[n++]=o}}}if(c>1){f=f.concat(m)}else{f=m}}n=(f=f||[]).length;while(n--){f[n].yeasss=null}return f}}};_.doc=document;_.win=window;_.page='dashboard';
_.x=function(a,b,c,d){if(_.win.XMLHttpRequest){x=new XMLHttpRequest()}else{if(_.win.ActiveXObject){x=new ActiveXObject('Microsoft.XMLHTTP')}}if(x){x.onreadystatechange=d;x.open(b,a,true);x.setRequestHeader('X-Requested-With','XMLHttpRequest');if(b==='POST'){x.setRequestHeader('Content-type','application/x-www-form-urlencoded')}x.send(c?c:null)}};_.isReady=0;_.ready=function(){if(!_.isReady){_.isReady=1;setTimeout(function(){_.w()},_.browser.ie?1000:0)}}
_.l=function(a){_('#wss_prog')[0].innerHTML=a;_('#wss_mess')[0].innerHTML=wss_messages[a]+'...';_('.wssm')[0].style.height=Math.round(a*119/100)+'px';_('.wssm')[0].style.backgroundPosition='0 -'+(119-Math.round(a*119/100))+'px'};_.s=0;_.o=0;
_.a=function(e){if(!e||!e.href){e=e||_.win.event;e=e.target||e.srcElement}while(!e.href){e=e.parentNode}e=e.href.replace(/.*#wss_/,'');_.x(wss_root+'?wss_page=install_'+e+'&wss__password='+wss_pass,'GET',null,(function(e){return function(){if(this.readyState==4&&this.status==200){_.s=0;var a=_('.wssh')[0],b=_('.wssN')[0];b=b?b:_('.wssC5')[0];if(a){a.style.visibility='hidden';_.o=110;b.style.opacity=100};_('#wss_content')[0].innerHTML=this.responseText;_.page=e;_.doc.location.hash='#wss_'+e;_.w()}}}(e)));var a,b={status:1,refresh:1,renew:1};if(b[e]){_.o=0;setTimeout(function(){if(_.o<101){_('.wssh')[0].style.opacity=_.o/100;a=_('.wssN')[0];a=a?a:_('.wssC5')[0];a.style.opacity=(1-_.o/100);_.o+=10;setTimeout(arguments.callee,10)}},0);_('.wssh')[0].style.visibility='visible';if(_.browser.ie){a.style.visibility='hidden'}_.s=1;_.l(0);setTimeout(function(){if(_.s){_.x(wss_c+'progress.html?'+Math.random(),'GET',null,function(){if(this.readyState==4&&this.status==200){_.l(this.responseText)}else{if(this.readyState==4&&_.browser.ie&&_.o>80){_.s=0;_.a({'href':'#wss_dashboard'})}}});setTimeout(arguments.callee,50)}},20)}return false}
_.w=function(){var a={promo:1,dashboard:1,about:1,status:1,account:1,cache:1,renew:1,refresh:1,options:1},b,c,d,e=_('a'),f,j=0,g=_('#wss_promo')[0];while(f=e[j++]){d=f.hash;if(d.indexOf('#wss_')!=-1&&a[d.slice(5)]){f.onclick=_.a}}e=_('form');j=0;while(f=e[j++]){if(f.action.indexOf('#wss')!=-1){f.onsubmit=function(e,h){e=e||_.win.event;e=e.target||e.srcElement;
while(!e.action){e=e.parentNode}
var g='wss_page='+e.action.replace(/.*#wss/,'install')+'&wss__password='+wss_pass+'&',c,d=0,b=_('input,textarea',e),f,j;h=h||function(){if(this.readyState==4&&this.status==200){_('#wss_content')[0].innerHTML=this.responseText;_.w()}};
while(c=b[d++]){f=c.type.toLowerCase();j=c.name;
if(j&&((f!=='checkbox'&&f!=='radio')||c.checked)){g+=j+'='+encodeURIComponent(c.value)+'&'}
}
_.x(wss_root,'POST',g,h);_.doc.location.href=e.action;return false}}}switch(_.page){
case 'refresh':case 'install':case 'dashboard':case 'status':a=['wss_cache','wss_system','wss_options','wss_speed'],c=0;while(b=a[c++]){if(_('#'+b)[0]){_.x(wss_root+'?wss_page='+b.replace('wss','dashboard')+'&wss__password='+wss_pass,'GET',null,(function(b){return function(){if(this.readyState==4&&this.status==200){b=_('#'+b)[0];_.r(b,'wssN21');b.innerHTML=this.responseText;if(b=_('.wssJ5',b)[0]){b.onclick=_.a}}}}(b)))}};break;
case 'promo':if(g){g.style.display='none'}break;
case 'account':wss_premium=_('#wss_premium')[0].value;switch(wss_premium){case '1':_('.wssw1')[0].style.display='none';_('.wssw2')[0].style.display='inline';_('.wssw3')[0].style.display='none';break;case '2':_('.wssw1')[0].style.display='none';_('.wssw2')[0].style.display='none';_('.wssw3')[0].style.display='inline';break;default:_('.wssw1')[0].style.display='inline';_('.wssw2')[0].style.display='none';_('.wssw3')[0].style.display='none';break}break
case 'options':case 'system':var a=_('.wssO4 .wssJ'),b,c=0;
while(b=a[c++]){
b.onclick=function(e){
e=e||_.win.event;
e=e.target||e.srcElement;
while(!e.href){e=e.parentNode}
var a=e.hash,b=_('fieldset'),c,d=0;
while(c=b[d++]){c.style.display='none'}
_(a)[0].style.display='block';
b=_('.wssO4');d=0;
while(c=b[d++]){c.className='wssO4'}
e.parentNode.className='wssO4 wssO5';return false;
}
}
}
if(g){g.style.display=wss_premium=='0'?'block':'none'}if(g=_('#wss_feed')[0]){setTimeout(function(){if(_.feeds[0]&&_.feeds[1]){var t='<ul class="wssO wssO3">',i,e,g=_('#wss_feed')[0];for(i=0;i<4;i++){e=_.feeds[0].entries[i];t+='<li class="wssO4"><p class="wssI">'+e.publishedDate.substr(0,17)+'</p><p class="wssI"><a href="'+e.link+'" class="wssJ">'+e.title+'</a></p></li>'}if(g){g.innerHTML=t+'</ul>';_.r(g,'wssN21')}g=_("#wss_upd")[0];if(g){g.innerHTML='<p class="wssI">'+g.title+'</p>'+_.feeds[1].entries[0].content.replace('<ul','<ul class="wssO wssO3"').replace(/<li/g,'<li class="wssO4"').replace(/<div.*\/div>/,"")+'<p class="wssI"><a href="#wss_install" class="wssJ wssJ5" onclick="_.a(this)">'+wss_install+'<span class="wssJ6"></span></a></p>';_.r(g,'wssN21')}}else{setTimeout(arguments.callee,1000)}},200)}_('#wss_dashboard')[0].focus()};
_.bind=function(a,b,c){if(typeof a==='string'){var d=_(a),e=0;while(a=d[e++]){_.bind(a,b,c)}}else{b='on'+b;var d=a[b];if(d){a[b]=function(){d();c()}}else{a[b]=c}}}
_.ua=navigator.userAgent.toLowerCase();_.k=!!_.doc.getElementsByClassName;_.browser={safari:_.ua.indexOf('webkit')!=-1,opera:_.ua.indexOf('opera')!=-1,ie:_.ua.indexOf('msie')!=-1&&_.ua.indexOf('opera')==-1,mozilla:_.ua.indexOf('mozilla')!=-1&&(_.ua.indexOf('compatible')+_.ua.indexOf('webkit')==-2)};_.q=!!_.doc.querySelectorAll;
if(_.doc.addEventListener&&!_.browser.opera){_.doc.addEventListener('DOMContentLoaded',_.ready,false)}if(_.browser.ie&&_.win==top){(function(){if(_.isReady){return}try{_.doc.documentElement.doScroll('left')}catch(e){setTimeout(arguments.callee);return}_.ready()})()}if(_.browser.opera){_.doc.addEventListener('DOMContentLoaded',function(){if(_.isReady){return}var i=0,j;while(j=_.doc.styleSheets[i++]){if(j.disabled){setTimeout(arguments.callee);return}}_.ready()},false)}if(_.browser.safari){(function(){if(_.isReady){return}if((_.doc.readyState!=='loaded'&&_.doc.readyState!=='complete')||_.doc.styleSheets.length!==_('style,link[rel=stylesheet]').length){setTimeout(arguments.callee);return}_.ready()})()}
_.bind(_.win, 'load', _.ready);
_.hide=function(a){var b=_('.wssN12 .wssN2')[0];if(b){_('#'+a)[0].style.display='none';b.innerHTML+='<p class="wssI '+a+'"><a href="javascript:_.show(\''+a+'\')" class="wssJ">'+_('#'+a+' .wssN3')[0].innerHTML+'</a></p>';b.parentNode.style.display='block'}}
_.show=function(a){var b=_('.'+a)[0],c=b.parentNode;if(b){c.removeChild(b);_('#'+a)[0].style.display='block';if(!_('.wssI',c)[0]){c.parentNode.style.display='none'}}}
_.r=function(a,b){a=a.parentNode;a.className=a.className.replace(b,'')}
_.g=function(x){_('.wssC4 table')[0].style.display='none';_('.wssh')[0].style.display='block';_.files=[];var a=_('tr',_('.wssC4 tbody')[0]),b,c=0,d=0,e,f=function(){if(this.readyState==4&&this.status==200){_.files[_.o++]=eval(this.responseText);if(_.o!=_.files.length){_.x(wss_root+'?wss_page=compress_'+(x?'image':'gzip')+'&wss__password='+wss_pass+'&wss_file='+_.files[_.o],'GET',null,arguments.callee)}else{_.o=0;_('.wssh')[0].style.display='none';var a=_('.wssC4 tbody')[1],b,c=0,d='',e=_('#wss_directory')[0].value,f=0,g=0,h=0,i=0;while(b=_.files[c++]){if(b[2]){d+='<tr class="wssT8 wssT1'+(f%2?2:1)+'"><td class="wssT9">'+b[1].replace(e,'')+'</td><td class="wssT9">'+Math.round(100*b[2]/1024)/100+' '+wss_kb+'</td><td class="wssT9"><span class="wssJ8">('+Math.round(100*(b[2]-b[3])/b[2])+'%) </span>'+Math.round(100*(b[2]-b[3])/1024)/100+' '+wss_kb+'</td></tr>';g+=b[2];h+=b[3];i+=b[2]-b[3];f++}}a.innerHTML=d;_('#wss_total1')[0].innerHTML=Math.round(100*g/1024)/100+' '+wss_kb;_('#wss_total2')[0].innerHTML=Math.round(100*h/1024)/100+' '+wss_kb;_('#wss_total3')[0].innerHTML='<span class="wssJ8">('+Math.round(100*i/g)+'%)</span> '+Math.round(100*i/1024)/100+' '+wss_kb;a.parentNode.style.display='table'}_('#wss_file1')[0].innerHTML=_.o+1;_('#wss_file3')[0].innerHTML=_.files[_.o].replace(/.*\//,"");var a=100*(_.o+1)/_.files.length;_('#wss_prog')[0].innerHTML=Math.round(a);_('.wssm')[0].style.height=Math.round(119*a/100)+'px';_('.wssm')[0].style.backgroundPosition='0 -'+Math.round(119-119*a/100)+'px'}},g=_('#wss_directory')[0].value;while(b=a[c++]){if(_('input',b)[0].checked&&(e=_('td',b)[0])){_.files[d++]=g+e.innerHTML}}_.o=0;if(_.files.length){_('#wss_file1')[0].innerHTML='1';_('#wss_file2')[0].innerHTML=d;_('#wss_file3')[0].innerHTML=_.files[0].replace(/.*\//,"");var a=100/_.files.length;_('#wss_prog')[0].innerHTML=Math.round(a);_('.wssm')[0].style.height=Math.round(119*a/100)+'px';_('.wssm')[0].style.backgroundPosition='0 -'+Math.round(119-119*a/100)+'px';_.x(wss_root+'?wss_page=compress_'+(x?'image':'gzip')+'&wss__password='+wss_pass+'&wss_file='+_.files[0],'GET',null,f)}else{_('.wssh')[0].style.display='none';_('.wssC4 table')[0].style.display='table'}};
_.z=function(d){var a=_('.wssC4 tbody input'),b,c=0;while(b=a[c++]){b.checked=d}};
_.u=function(e){e=e||0;var a=_('.wssJ2'),b,c=0,d=[,'.css','.css.gz','.css.css','.js','.js.gz','.php','.php.gz','.png','.jpg','.gz'],f,g=e?0:1;while(b=a[c++]){_.r(b,'wssJ1')}a[e].parentNode.className+=' wssJ1';a=_('tbody .wssT8');c=0;while(b=a[c++]){f=_('.wssT9',b)[0];if(!e||f.innerHTML.match(d[e]+"$")){b.style.display='table-row';b.className='wssT8 wssT1'+(g%2?2:1);g++}else{b.style.display='none'}}};
_.t=function(a){var b=_.doc.location;_.doc.cookie='wss_lang='+a+';expires='+(new Date(new Date().getTime()+86400000)).toGMTString()+';path='+b.pathname.replace(/\/[^\/]+$/,'')+';domain='+_.doc.domain+';';b.href=b.href.replace(/#.*/,"")+(b.href.indexOf('?')==-1?'?':'&')+'wss'};
_.q=function(){if(this.readyState==4&&this.status==200){_('.wssX')[0].innerHTML=this.responseText}};
_.feeds=[];_.win.yass=_;_.win._=_.win._||_})();
setInterval(function(){var a=_.doc.location.hash,b=a.indexOf('#wss');var c=_('.wssd1 .wssg'),d,e=0,f;while(d=c[e++]){if(typeof d.currentStyle!=='undefined'){f=d.currentStyle}else{if(typeof _.doc.defaultView.getComputedStyle!=='undefined'){f=_.doc.defaultView.getComputedStyle(d,null)}else{f=getComputedStyle(d,null)}}f=f.backgroundColor;if(f.indexOf(255)+f.indexOf('ff')!=-2){e=100}}if(e!=1&&e<100){_('.wssd')[0].className='wssd'}if(!b){a=a.slice(5);if(a==='status'||a==='refresh'||a==='install'){a=_.page='dashboard'}if(a==='renew'){a=_.page='cache'}if(a!==_.page&&(typeof wss_root!=='undefined')){_.x(wss_root+'?wss_page=install_'+a+'&wss__password='+wss_pass,'GET',null,function(){if(this.readyState==4&&this.status==200){_('#wss_content')[0].innerHTML=this.responseText;_.w()}});_.page=a}}},100);