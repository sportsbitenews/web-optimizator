(function(){
var _=function(a,b){b=b||_.doc;if(/^[\w#.]\w*$/.test(a)){var c=0,d=[];switch(a.charAt(0)){case '#':c=a.slice(1);d=_.doc.getElementById(c);if(_.doc.all&&d&&d.id!==c){d=_.doc.all[c]}return d?[d]:[];case '.':var e=a.slice(1);if(_.k){return (c=(d=b.getElementsByClassName(e)).length)?d:[]}else{e=' '+e+' ';var g=b.getElementsByTagName('*'),i=0,f;while(f=g[i++]){if((' '+f.className+' ').indexOf(e)!=-1){d[c++]=f}}return c?d:[]}default:return (c=(d=b.getElementsByTagName(a)).length)?d:[]};}else{if(_.q){return b.querySelectorAll(a)}else{var c=0,d=a.split(/ *, */),e,f=[],g,k,i,l,m,n,j,o,p,h,q,r,s,t,u;while(e=d[c++]){g=e.split(/ +/);m=u=[];h=n=j=i=0;while(k=g[i++]){k=/([^[:.#]+)?(?:#([^[:.#]+))?(?:\.([^[:.]+))?(?:\[([^!~^*|$[:=]+)([!$^*|]?=)?([^:\]]+)?\])?(?:\:([^(]+)(?:\(([^)]+)\))?)?/.exec(k);u[h++]=[k[1]?k[1].toLowerCase():'',k[2],k[3]?' '+k[3]+' ':'']}p=u[h-1];s=p[0];q=p[1];r=p[2];if(q){l=[_.doc.getElementById(q)];if(_.doc.all&&l[0].id!==q){l=_.doc.all[n]}while(o=l[j++]){if((!s||o.nodeName.toLowerCase()===s)&&(!r||(' '+o.className+' ').indexOf(r)!=-1)){if(i==1){o.yeasss=1}m[n++]=o}}}else{if(_.k&&r){l=_.doc.getElementsByClassName(r);while(o=l[j++]){if((!s||o.nodeName.toLowerCase()===s)&&(!q||o.id===q)){if(i==1){o.yeasss=1}m[n++]=o}}}else{l=_.doc.getElementsByTagName(s||'*');while(o=l[j++]){if((!q||o.id===q)&&(!r||(' '+o.className+' ').indexOf(r)!=-1)){if(i==1){o.yeasss=1}m[n++]=o}}}}i=h;if(i--){l=m;n=j=0;m=[];while(o=l[j++]){h=i-1;t=o;while((p=u[h--])&&t&&(t=t.parentNode)){s=p[0];q=p[1];r=p[2];while(t&&((s&&t.nodeName.toLowerCase()!==s)||(q&&t.id!==q)||(r&&(' '+t.className+' ').indexOf(r)==-1))){t=t.parentNode}}if (b&&b!==_.doc){while((t=t.parentNode)&&t!==b){}}if (o&&t&&!o.yeasss){o.yeasss=1;m[n++]=o}}}if(c>1){f=f.concat(m)}else{f=m}}n=(f=f||[]).length;while(n--){f[n].yeasss=null}return f}}};_.doc=document;_.win=window;_.page='dashboard';
_.x=function(a,b,c,d){if(_.win.XMLHttpRequest){x=new XMLHttpRequest()}else{if(_.win.ActiveXObject){x=new ActiveXObject('Microsoft.XMLHTTP')}}if(x){x.onreadystatechange=d;x.open(b,a.indexOf('/')==-1?((typeof wss_root==='undefined'?'':wss_root)+'?wss_page='+a+'&wss__password='+wss_pass):a,true);x.setRequestHeader('X-Requested-With','XMLHttpRequest');if(b==='POST'){x.setRequestHeader('Content-type','application/x-www-form-urlencoded')}x.send(c?c:null)}};_.isReady=0;_.ready=function(){if(!_.isReady){_.isReady=1;setTimeout(function(){_.w()},_.b.ie?1000:0)}};
_.l=function(a){if(_('.wssC6')[0]){a=a?a:'0,0,0';a=a.split(',');_('#wss_prog')[0].innerHTML=a[0];_('#wss_file1')[0].innerHTML=a[1];_('#wss_file2')[0].innerHTML=a[2];a=a[0]}else{a=a||0;_('#wss_prog')[0].innerHTML=a;_('#wss_mess')[0].innerHTML=wss_messages[a]+'...'}_('.wssm')[0].style.height=Math.round(a*119/100)+'px';_('.wssm')[0].style.backgroundPosition='0 -'+(119-Math.round(a*119/100))+'px'};_.s=0;_.o=0;
_.a=function(e){if(!e||!e.href){e=e||_.win.event;e=e.target||e.srcElement}while(!e.href){e=e.parentNode}e=e.href.replace(/.*#wss_/,'');_.x('install_'+e,'GET',null,(function(e){return function(){if(this.readyState==4&&this.status==200){_.s=0;var a=_('.wssh')[0],b=_('.wssN')[0];b=b?b:_('.wssC5')[0];b=b?b:_('.wssC6')[0];if(a){a.style.visibility='hidden';_.o=110;b.style.opacity=100};_('#wss_content')[0].innerHTML=this.responseText;_.page=e;_.doc.location.hash='#wss_'+e;_.w()}}}(e)));var a,b={status:1,refresh:1,renew:1,update:1,install:1,beta:1};if(b[e]){_.o=0;setTimeout(function(){if(_.o<101){_('.wssh')[0].style.opacity=_.o/100;a=_('.wssN')[0];a=a?a:_('.wssC5')[0];a=a?a:_('.wssC6')[0];a.style.opacity=(1-_.o/100);_.o+=10;setTimeout(arguments.callee,10)}},0);_('.wssh')[0].style.visibility='visible';if(_.b.ie){a.style.visibility='hidden'}_.s=1;_.l(0);setTimeout(function(){if(_.s){_.x(wss_c+'progress.html?'+Math.random(),'GET',null,function(){if(this.readyState==4&&this.status==200){_.l(this.responseText)}else{if(this.readyState==4&&_.b.ie&&_.o>80){_.s=0;_.a({'href':'#wss_dashboard'})}}});setTimeout(arguments.callee,50)}},20)}return false}
_.w=function(){var a={promo:1,dashboard:1,about:1,status:1,account:1,cache:1,renew:1,refresh:1,options:1,system:1,uninstall:1,install:1},b,c,d,e=_('a'),f,j=0,g=_('#wss_promo')[0];while(f=e[j++]){d=f.hash;if(d.indexOf('#wss_')!=-1&&a[d.slice(5)]){f.onclick=_.a}}e=_('form');j=0;while(f=e[j++]){if(f.action.indexOf('#wss')!=-1){f.onsubmit=function(e,h){e=e||_.win.event;e=e.target||e.srcElement;while(!e.action){e=e.parentNode}var g='',c,d=0,b=_('input,textarea',e),f,j;h=h||function(){if(this.readyState==4&&this.status==200){_('#wss_content')[0].innerHTML=this.responseText;_.w()}};while(c=b[d++]){f=c.type.toLowerCase();j=c.name;if(j&&((f!=='checkbox'&&f!=='radio')||c.checked)){g+=j+'='+encodeURIComponent(c.value)+'&'}}_.x(e.action.replace(/.*#wss/,'install'),'POST',g,h);_.doc.location.href=e.action;return false}}}switch(_.page){case 'refresh':case 'dashboard':case 'update':case 'status':a=['wss_cache','wss_system','wss_options','wss_speed'],c=0;while(b=a[c++]){if(_('#'+b)[0]){_.x(b.replace('wss','dashboard'),'GET',null,(function(b){return function(){if(this.readyState==4&&this.status==200){b=_('#'+b)[0];_.r(b,'wssN21');b.innerHTML=this.responseText;if(b=_('.wssJ5',b)[0]){b.onclick=_.a}}}}(b)))}};break;case 'promo':if(g){g.style.display='none'}break;case 'account':wss_premium=_('#wss_premium')[0].value;switch(wss_premium){case '1':_('.wssw1')[0].style.display='none';_('.wssw2')[0].style.display='inline';_('.wssw3')[0].style.display='none';break;case '2':_('.wssw1')[0].style.display='none';_('.wssw2')[0].style.display='none';_('.wssw3')[0].style.display='inline';break;default:_('.wssw1')[0].style.display='inline';_('.wssw2')[0].style.display='none';_('.wssw3')[0].style.display='none';break}break;case 'options':_.x('options_configuration','GET',null,function(){if(this.readyState==4&&this.status==200){_.config={current:_('#wss_config')[0].value};eval(this.responseText);_('.wssU3')[0].innerHTML=_('#wss_title')[0].value=_.config[_.config.current][0][1];_('.wssU4')[0].innerHTML=_('#wss_description')[0].value=_.config[_.config.current][1][1];var a,b=_('.wssU11 .wssJ'),c,d=0;while(c=b[d++]){if(!c.rel.indexOf('user')){a=_.config[c.rel][0][1];c.lastChild.innerHTML=a.length>12?a.substr(0,12)+'...':a}}}});case 'install':case 'system':case 'stable':case 'beta':if(_('#wss_showbeta')[0]){_('.wssc')[0].innerHTML=_('#wss_showbeta')[0].title}if(_('#wss_beta')[0]){setTimeout(function(){if(_.feeds[1]){var t,i=0,e=_.feeds[1].entries,g=_('#wss_upd')[0],f=0;if(g){while(e&&(t=e[i++])){if(g.title.replace(/[^0-9]/g,'')==t.title.replace(/\./g,'')){f=i-1;e=0}}g.innerHTML='<p class="wssI">'+g.title+'</p>'+_.feeds[1].entries[f].content.replace('<ul','<ul class="wssO7"').replace(/<li/g,'<li class="wssO8"').replace(/<div.*\/div>/,"")+'<p class="wssI"><a href="#wss_stable" class="wssJ wssJ5" onclick="_.a(this)">'+wss_install+'<span class="wssJ6"></span></a></p>'}g=_('#wss_beta')[0];if(g){while(e&&(t=e[i++])){if(t.title.indexOf('b')!=-1){f=i-1}}g.innerHTML='<p class="wssI">'+g.title+'</p>'+_.feeds[1].entries[f].content.replace('<ul','<ul class="wssO7"').replace(/<li/g,'<li class="wssO8"').replace(/<div.*\/div>/,"")+'<p class="wssI"><a href="#wss_beta" class="wssJ wssJ5" onclick="_.a(this)">'+wss_install+'<span class="wssJ6"></span></a></p>'}}else{setTimeout(arguments.callee,1000)}},200)}var a=_('.wssO4 .wssJ'),b,c=0;while(b=a[c++]){b.onclick=function(e){e=e||_.win.event;e=e.target||e.srcElement;while(!e.href){e=e.parentNode}var a=e.hash,b=_('fieldset'),c,d=0;while(c=b[d++]){c.style.display='none'}_(a)[0].style.display='block';b=_('.wssO4');d=0;while(c=b[d++]){c.className='wssO4'}e.parentNode.className='wssO4 wssO5';return false}}}if(_('.wssS12')[0]){_('.wssO4 .wssJ')[1].onclick({target:_('.wssO4 .wssJ')[1]})}if(_('.wssS11')[0]){_('.wssO4 .wssJ')[3].onclick({target:_('.wssO4 .wssJ')[3]})}if(g){g.style.display=wss_premium=='0'?'block':'none'}if(g=_('#wss_feed')[0]){setTimeout(function(){if(_.feeds[0]&&_.feeds[1]){var t='<ul class="wssO wssO3">',i,e,g=_('#wss_feed')[0];for(i=0;i<4;i++){e=_.feeds[0].entries[i];t+='<li class="wssO4"><p class="wssI">'+e.publishedDate.substr(0,17)+'</p><p class="wssI"><a href="'+e.link+'" class="wssJ">'+e.title+'</a></p></li>'}if(g){g.innerHTML=t+'</ul>';_.r(g,'wssN21')}g=_("#wss_upd")[0];if(g){t=i=0;e=_.feeds[1].entries;while(e&&(t=e[i++])){if(g.title.replace(/[^0-9]/g,'')==t.title.replace(/\./g,'')){t=i-1;e=0}}g.innerHTML='<p class="wssI">'+g.title+'</p>'+_.feeds[1].entries[t].content.replace('<ul','<ul class="wssO wssO3"').replace(/<li/g,'<li class="wssO4"').replace(/<div.*\/div>/,"")+'<p class="wssI"><a href="#wss_update" class="wssJ wssJ5" onclick="_.a(this)">'+wss_install+'<span class="wssJ6"></span></a></p>';_.r(g,'wssN21')}}else{setTimeout(arguments.callee,1000)}},200)}var a=_('.wssJ9'),c=0;while(b=a[c++]){if(b.title){b.innerHTML+='<span class="wssJ0">'+b.title+'</span>';b.title=''}}_('#wss_spot')[0].focus()};
_.bind=function(a,b,c){if(typeof a==='string'){var d=_(a),e=0;while(a=d[e++]){_.bind(a,b,c)}}else{b='on'+b;var d=a[b];if(d){a[b]=function(){d();c()}}else{a[b]=c}}}
_.ua=navigator.userAgent.toLowerCase();_.k=!!_.doc.getElementsByClassName;_.b={safari:_.ua.indexOf('webkit')!=-1,opera:_.ua.indexOf('opera')!=-1,ie:_.ua.indexOf('msie')!=-1&&_.ua.indexOf('opera')==-1,mozilla:_.ua.indexOf('mozilla')!=-1&&(_.ua.indexOf('compatible')+_.ua.indexOf('webkit')==-2)};_.q=!!_.doc.querySelectorAll;if(_.doc.addEventListener&&!_.b.opera){_.doc.addEventListener('DOMContentLoaded',_.ready,false)}if(_.b.ie&&_.win==top){(function(){if(_.isReady){return}try{_.doc.documentElement.doScroll('left')}catch(e){setTimeout(arguments.callee);return}_.ready()})()}if(_.b.opera){_.doc.addEventListener('DOMContentLoaded',function(){if(_.isReady){return}var i=0,j;while(j=_.doc.styleSheets[i++]){if(j.disabled){setTimeout(arguments.callee);return}}_.ready()},false)}if(_.b.safari){(function(){if(_.isReady){return}if((_.doc.readyState!=='loaded'&&_.doc.readyState!=='complete')||_.doc.styleSheets.length!==_('style,link[rel=stylesheet]').length){setTimeout(arguments.callee);return}_.ready()})()}
_.bind(_.win, 'load', _.ready);
_.hide=function(a){var b=_.doc.cookie;if(b.indexOf(a)==-1){b=b.indexOf('wss_blocks')==-1?b:b.replace(/.*wss_blocks=/,'');_.v('wss_blocks='+b.replace(/;.*/,'').replace(a,'')+a);b=_('.wssN12 .wssN2')[0];if(b){_('#'+a)[0].style.display='none';b.innerHTML+='<p class="wssI '+a+'"><a href="javascript:_.show(\''+a+'\')" class="wssJ">'+_('#'+a+' .wssN3')[0].innerHTML+'</a></p>';b.parentNode.style.display='block'}}}
_.show=function(a){var b=_.doc.cookie;if(b.indexOf(a)!=-1){b=b.indexOf('wss_blocks')==-1?b:b.replace(/.*wss_blocks=/,'');_.v('wss_blocks='+b.replace(/;.*/,'').replace(a,''));b=_('.'+a)[0],c=b.parentNode;if(b){c.removeChild(b);_('#'+a)[0].style.display='block';if(!_('.wssI',c)[0]){c.parentNode.style.display='none'}}}}
_.r=function(a,b){if(a){a=a.parentNode;a.className=a.className.replace(b,'')}}
_.g=function(x){_('.wssC4 table')[0].style.display='none';_('.wssh')[0].style.display='block';_.files=[];var a=_('tr',_('.wssC4 tbody')[0]),b,c=0,d=0,e,f=function(){if(this.readyState==4&&this.status==200){_.files[_.o++]=eval(this.responseText);if(_.o!=_.files.length){_.x('compress_'+(x?'image':'gzip')+'&wss_file='+_.files[_.o],'GET',null,arguments.callee)}else{_.o=0;_('.wssh')[0].style.display='none';var a=_('.wssC4 tbody')[1],b,c=0,d='',e=_('#wss_directory')[0].value,f=0,g=0,h=0,i=0;while(b=_.files[c++]){if(b[2]){d+='<tr class="wssT8 wssT1'+(f%2?2:1)+'"><td class="wssT9">'+b[1].replace(e,'')+'</td><td class="wssT9">'+Math.round(100*b[2]/1024)/100+' '+wss_kb+'</td><td class="wssT9"><span class="wssJ8">('+Math.round(100*(b[2]-b[3])/b[2])+'%) </span>'+Math.round(100*(b[2]-b[3])/1024)/100+' '+wss_kb+'</td></tr>';g+=b[2];h+=b[3];i+=b[2]-b[3];f++}}a.innerHTML=d;_('#wss_total1')[0].innerHTML=Math.round(100*g/1024)/100+' '+wss_kb;_('#wss_total2')[0].innerHTML=Math.round(100*h/1024)/100+' '+wss_kb;_('#wss_total3')[0].innerHTML='<span class="wssJ8">('+Math.round(100*i/g)+'%)</span> '+Math.round(100*i/1024)/100+' '+wss_kb;a.parentNode.style.display='table'}_('#wss_file1')[0].innerHTML=_.o+1;_('#wss_file3')[0].innerHTML=_.files[_.o].replace(/.*\//,"");var a=100*(_.o+1)/_.files.length;_('#wss_prog')[0].innerHTML=Math.round(a);_('.wssm')[0].style.height=Math.round(119*a/100)+'px';_('.wssm')[0].style.backgroundPosition='0 -'+Math.round(119-119*a/100)+'px'}},g=_('#wss_directory')[0].value;while(b=a[c++]){if(_('input',b)[0].checked&&(e=_('td',b)[0])){_.files[d++]=g+e.innerHTML}}_.o=0;if(_.files.length){_('#wss_file1')[0].innerHTML='1';_('#wss_file2')[0].innerHTML=d;_('#wss_file3')[0].innerHTML=_.files[0].replace(/.*\//,"");var a=100/_.files.length;_('#wss_prog')[0].innerHTML=Math.round(a);_('.wssm')[0].style.height=Math.round(119*a/100)+'px';_('.wssm')[0].style.backgroundPosition='0 -'+Math.round(119-119*a/100)+'px';_.x('compress_'+(x?'image':'gzip')+'&wss_file='+_.files[0],'GET',null,f)}else{_('.wssh')[0].style.display='none';_('.wssC4 table')[0].style.display='table'}};
_.z=function(d){var a=_('.wssC4 tbody input'),b,c=0;while(b=a[c++]){b.checked=d}};
_.u=function(e){e=e||0;var a=_('.wssJ2'),b,c=0,d=[,'.css','.css.gz','.css.css','.js','.js.gz','.php','.php.gz','.html','.html.gz','.png','.jpg','.gz'],f,g=e?0:1,h=0,i;while(b=a[c++]){_.r(b,'wssJ1')}a[e].parentNode.className+=' wssJ1';a=_('tbody .wssT8');c=0;while(b=a[c++]){f=_('.wssT9',b)[0];if(!e||f.innerHTML.match(d[e]+"$")){b.style.display='table-row';b.className='wssT8 wssT1'+(g%2?2:1);g++;i=_('.wssT9',b)[3].innerHTML.split(" ");if(i[0]){h+=i[0]-0}}else{b.style.display='none'}}if(!g||g-1==a.length){_('.wssT21')[0].style.display='none'}else{_('.wssT21')[0].style.display='table-row'}if(!g){_('.wssT19')[0].style.display='none';_('.wssT20')[0].style.display='table-row'}else{_('.wssT20')[0].style.display='none';_('.wssT19')[0].style.display='table-row';_('.wssT22')[0].innerHTML=(Math.round(h)+'').replace(/([0-9])([0-9][0-9][0-9])$/,"$1 $2")}};
_.t=function(a){_.v('wss_lang='+a);var b=_.doc.location;b.href=b.href.replace(/#.*/,"")+(b.href.indexOf('?')==-1?'?':'&')+'wss'};
_.y=function(){if(this.readyState==4&&this.status==200){_('.wssX')[0].innerHTML=this.responseText}};
_.c=function(a){if(a){_.config.current=a}_('#wss_config')[0].value=_.config.current;_('.wssC6')[0].onsubmit({target:_('.wssC6')[0]},_.y);
var b=_('.wssU11 .wssJ'),c=0,d;while(d=b[c++]){if(d.rel===_.config.current){d.parentNode.className+=' wssU12'}else{_.r(d,'wssU12')}}};
_.d=function(a){if(confirm(wss_confirm+_.config[_.config.current][0][1]+'"?')){_.x('options_delete',GET,null,function(){})}};
_.e=function(a){if(a){_.config.current=a}_('.wssU')[0].style.display='none';_('.wssU0')[0].style.display='block'};
_.f=function(a){if(_.config.current===a){var b=_('#wss_config')[0];b.value=b.value.indexOf('user')?_('.wssU20 .wssJ')[0].rel:b.value;_.e(a)}else{_.config.current=a;_('.wssU3')[0].innerHTML=_.config[a][0][1];_('.wssU4')[0].innerHTML=_.config[a][1][1];_.r(_('.wssU17 a')[0],'wssU17');var b=_('.wssU11 a'),c=0,d,e=_('.wssC6')[0],f;while(d=b[c++]){if(d.rel===a){d.parentNode.className+=' wssU17'}}c=0;while(d=_.config[a][c++]){f=e[d[0]];switch(f.type){case 'checkbox':f.checked=d[1]==1?true:false;break;default:e[d[0]+(d[1]-0+1)].checked=true;break;case 'hidden':case 'text':case 'textarea':f.value=d[1];break}}}};
_.v=function(a){if(typeof wss_root!=='undefined'){_.doc.cookie=a+';expires='+(new Date(new Date().getTime()+30000000000)).toGMTString()+';path='+wss_root}_.doc.cookie=a+';expires='+(new Date(new Date().getTime()+30000000000)).toGMTString()+';path='+_.doc.location.pathname.replace(/[^\/]+$/,'')};
_.feeds=[];_.win.yass=_;_.win._=_.win._||_})();if(_.doc.cookie.indexOf('wss_blocks')==-1){_.v('wss_blocks=wss_toolswss_linkswss_newswss_syswss_updates')}setInterval(function(){var a=_.doc.location.hash,b=a.indexOf('#wss');var c=_('.wssd1 .wssg'),d,e=0,f;while(d=c[e++]){if(typeof d.currentStyle!=='undefined'){f=d.currentStyle}else{if(typeof _.doc.defaultView.getComputedStyle!=='undefined'){f=_.doc.defaultView.getComputedStyle(d,null)}else{f=getComputedStyle(d,null)}}f=f.backgroundColor;if(f.indexOf(255)+f.indexOf('ff')!=-2){e=100}}if(e!=1&&e<100){_('.wssd')[0].className='wssd'}if(!b){a=a.slice(5);if(a==='status'||a==='refresh'||a==='update'){a=_.page='dashboard'}if(a==='renew'){a=_.page='cache'}if(a==='stable'||a==='beta'){a=_.page='system'}if(a!==_.page){_.x('install_'+a,'GET',null,function(){if(this.readyState==4&&this.status==200){_('#wss_content')[0].innerHTML=this.responseText;_.w()}});_.page=a}}},100);