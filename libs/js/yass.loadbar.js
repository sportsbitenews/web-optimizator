(function(){
var _=function(a,b){b=b||_.doc;if(/^[\w#.]\w*$/.test(a)){var c=0,d=[];switch(a.charAt(0)){case '#':c=a.slice(1);d=_.doc.getElementById(c);if(_.doc.all&&d&&d.id!==c){d=_.doc.all[c]}return d?[d]:[];case '.':var e=a.slice(1);if(_.k){return (c=(d=b.getElementsByClassName(e)).length)?d:[]}else{e=' '+e+' ';var g=b.getElementsByTagName('*'),i=0,f;while(f=g[i++]){if((' '+f.className+' ').indexOf(e)!=-1){d[c++]=f}}return c?d:[]}default:return (c=(d=b.getElementsByTagName(a)).length)?d:[]}}else{if(_.q){return b.querySelectorAll(a)}else{var c=0,d=a.split(/ *, */),e,f=[],g,k,i,l,m,n,j,o,p,h,q,r,s,t,u;while(e=d[c++]){g=e.split(/ +/);m=u=[];h=n=j=i=0;while(k=g[i++]){k=/([^[:.#]+)?(?:#([^[:.#]+))?(?:\.([^[:.]+))?(?:\[([^!~^*|$[:=]+)([!$^*|]?=)?([^:\]]+)?\])?(?:\:([^(]+)(?:\(([^)]+)\))?)?/.exec(k);u[h++]=[k[1]?k[1].toLowerCase():'',k[2],k[3]?' '+k[3]+' ':'']}p=u[h-1];s=p[0];q=p[1];r=p[2];if(q){l=[_.doc.getElementById(q)];if(_.doc.all&&l[0].id!==q){l=_.doc.all[n]}while(o=l[j++]){if((!s||o.nodeName.toLowerCase()===s)&&(!r||(' '+o.className+' ').indexOf(r)!=-1)){if(i==1){o.yeasss=1}m[n++]=o}}}else{if(_.k&&r){l=_.doc.getElementsByClassName(r);while(o=l[j++]){if((!s||o.nodeName.toLowerCase()===s)&&(!q||o.id===q)){if(i==1){o.yeasss=1}m[n++]=o}}}else{l=_.doc.getElementsByTagName(s||'*');while(o=l[j++]){if((!q||o.id===q)&&(!r||(' '+o.className+' ').indexOf(r)!=-1)){if(i==1){o.yeasss=1}m[n++]=o}}}}i=h;if(i--){l=m;n=j=0;m=[];while(o=l[j++]){h=i-1;t=o;while((p=u[h--])&&t&&(t=t.parentNode)){s=p[0];q=p[1];r=p[2];while(t&&((s&&t.nodeName.toLowerCase()!==s)||(q&&t.id!==q)||(r&&(' '+t.className+' ').indexOf(r)==-1))){t=t.parentNode}}if (b&&b!==_.doc){while((t=t.parentNode)&&t!==b){}}if(o&&t&&!o.yeasss){o.yeasss=1;m[n++]=o}}}if(c>1){f=f.concat(m)}else{f=m}}n=(f=f||[]).length;while(n--){f[n].yeasss=null}return f}}};_.doc=document;_.win=window;_.page='dashboard';_.win.wsserr=0;_.h={status:1,refresh:1,renew:1,update:1,install:1,stable:1,beta:1};
_.config={};
_.x=function(a,b,c,d){var e=0;if(_.win.XMLHttpRequest){x=new XMLHttpRequest()}else{if(_.win.ActiveXObject){x=new ActiveXObject('Microsoft.XMLHTTP')}}if(x&&typeof wss_pass!=='undefined'){try{x.onreadystatechange=d;x.open(b,a.indexOf('/')?((typeof wss_root==='undefined'?'':wss_root)+'?wss_page='+(a.split('#'))[0]+'&wss__password='+wss_pass):a,true);x.setRequestHeader('X-Requested-With','XMLHttpRequest');if(b==='POST'){x.setRequestHeader('Content-type','application/x-www-form-urlencoded')}x.send(c?c:null)}catch(e){_.win.wsserr=1}}};_.isReady=0;_.ready=function(){if(!_.isReady){_.isReady=1;setTimeout(function(){_.w()},_.b.ie?1000:0)}};
_.l=function(a){_.o=a;var b='';a=a||0;if(a.indexOf&&a.indexOf(',')!=-1){a=a?a:'0,0,0';a=a.split(',');b=_('#wss_mess1')[0].innerHTML+' '+a[1]+' '+wss_outof+' '+a[2];a=a[0]}else{a=a||0;b=wss_messages[a]+'...'}_('#wss_prog')[0].innerHTML=a;_('#wss_mess')[0].innerHTML=b;var c=_('.wss_m')[0];c.style.height=Math.round(a*119/100)+'px';c.style.backgroundPosition='0 '+(Math.round(a*119/100)-367)+'px'};_.s=0;_.stop=0;_.o=0;
_.a=function(e){if(!e||!e.href){e=e||_.win.event;e=e.target||e.srcElement}while(!e.href){e=e.parentNode}var x=e;e=e.href.replace(/.*#wss_/,'');if(!_.h[e]){setTimeout(function(){if(e!=_.page){if(x){_('#wss_q1')[0].innerHTML=x.innerHTML.replace(/([\r\n\s\t]+$|<[^>]+>)/g,'')}_('.wss_a')[0].className='wss_a wss_aa'}},200)}_.x('install_'+e,'GET',null,(function(e){return function(){if(this.readyState==4&&this.status==200){_.s=0;_.stop=0;var a=_('.wss_h')[0],b=_('.wssN')[0];b=b?b:_('.wssC5')[0];b=b?b:_('.wssC6')[0];if(a&&b){a.style.visibility='hidden';a.style.opacity=0;_.o=110;b.style.opacity=1;b.style.visibility='visible';_.l(0)}_.j(_('#wss_content')[0],this);_.page=e;_.doc.location.hash='#wss_'+e;_.w();_('.wss_a')[0].className='wss_a'}}}(e)));var a;if(_.h[e]){_.p=0;setTimeout(function(){var a=_('.wssN')[0];a=a?a:_('.wssC5')[0];a=a?a:_('.wssC6')[0];if(_.p<101&&_.s){_('.wss_h')[0].style.opacity=_.p/100;a.style.opacity=(1-_.p/100);_.p+=10;setTimeout(arguments.callee,10)}else{a.style.opacity=1}},0);_('.wss_h')[0].style.visibility='visible';if(_.b.ie){a=_('.wssN')[0];a=a?a:_('.wssC5')[0];a=a?a:_('.wssC6')[0];a.style.visibility='hidden'}_.s=1;_.l(0);setTimeout(function(){if(_.s){_.x(wss_c+'progress.html?'+Math.random(),'GET',null,function(){var a=this.status;if(this.readyState==4&&a==200){_.l(this.responseText)}else{if(_.b.ie&&_.o>82){_.s=0;_.stop=0;_.a({href:'#wss_dashboard'})}if(_.s&&a!=200&&_.stop>10){_.s=0}if(_.s&&a!=200){_.stop++}}});if(_.s){setTimeout(arguments.callee,200)}}},200)}return false}
_.w=function(){var a={promo:1,dashboard:1,about:1,status:1,account:1,cache:1,renew:1,refresh:1,options:1,system:1,uninstall:1,install:1,awards:1},b,c,d,e=_('a'),f,j=0,g=_('#wss_promo')[0];while(f=e[j++]){d=f.hash||'';if(d.indexOf('#wss_')!=-1&&a[d.slice(5)]){f.onclick=_.a}}e=_('form');j=0;while(f=e[j++]){if(f.action.indexOf('#wss')!=-1){f.onsubmit=function(e,h){e=e||_.win.event;e=e.target||e.srcElement;while(!e.action){e=e.parentNode}var g='',c,d=0,b=_('input,textarea',e),f,j,k=0,l;h=h||function(){if(this.readyState==4&&this.status==200){_.j(_('#wss_content')[0],this);_.w()}};_.config[_.config.current]=[];while(c=b[d++]){f=c.type.toLowerCase();j=c.name;l=c.value;if(f!=='radio'||c.checked){_.config[_.config.current][k++]=[j,f!=='checkbox'?(f!=='radio'?l:l-1):(c.checked?1:0)]}if(j&&((f!=='radio'&&f!=='checkbox')||c.checked)){g+=j+'='+encodeURIComponent(l)+'&'}}_.x(e.action.replace(/.*#wss/,'install'),'POST',g,h);_.doc.location.href=e.action;return false}}}switch(_.page){case 'balance':var b=_('#wss_balance')[0].innerHTML,c=Math.floor(b.replace(/ /,'')/wss_fee),d=c%10>4||!(c%10)?3:(c%10>1?2:1),e=new Date(new Date().getTime()+c*86400000);_('.wssO15',_('.wssH11')[0])[0].innerHTML=b;_('#wss_balance_days')[0].innerHTML=c;_('#wss_balance_days1')[0].style.display=_('#wss_balance_days2')[0].style.display=_('#wss_balance_days3')[0].style.display='none';_('#wss_balance_days'+d)[0].style.display='inline';_('#wss_balance_days4')[0].innerHTML=(e.getYear()>2000?e.getYear():e.getYear()+1900)+'-'+(e.getMonth()>8?'':'0')+(e.getMonth()+1)+'-'+(e.getDate()>9?'':'0')+e.getDate();break;case 'update':_.a({href:'#wss_dashboard'});break;case 'refresh':case 'dashboard':case 'status':_.blocks=['awards','speed','system','cache','options'];_.i();;break;case 'promo':if(g){g.style.display='none'}break;case 'account':wss_premium=_('#wss_premium')[0].value;for(var i=1;i<6;i++){_('.wss_w'+i)[0].style.display='none'}switch(wss_premium){case '1':_('.wss_w2')[0].style.display='inline';break;case '2':_('.wss_w3')[0].style.display='inline';break;case '3':_('.wss_w4')[0].style.display='inline';break;case '10':_('.wss_w5')[0].style.display='inline';break;default:_('.wss_w1')[0].style.display='inline';break}break;case 'stable':case 'beta':_.a({href:'#wss_system'});break;case 'awards':var a=_('.wssO61 .wssO56'),b,c=0;while(b=a[c++]){b.onclick=function(e){e=e||_.win.event;e=e.target||e.srcElement;var a=_('.wssO61 .wssO56'),b,c=0,d=_('.wssO60')[0];while(b=a[c++]){_.r1(b,(' wssO62')}e.className+=' wssO62';if(e.title){d.className='wssO60 wssO'+(62+(e.title-0))}else{d.className='wssO60'}}}a=_('.wssO70');c=0;while(b=a[c++]){b.onclick=function(e){e=e||_.win.event;e=e.target||e.srcElement;e=e.form;var a,b,c,d,f=0,g,h;while(d=e['size'][f++]){if(d.checked){a=d.value}}f=0;while(d=e['color'][f++]){if(d.checked){b=d.value;h=d.title}}f=0;while(d=e['code'][f++]){if(d.checked){c=d.value}}d=e['webo_cachedir'].value;f=e['webo_info'].value;g=e['webo_twitter'].value;e=e['webo_aw'].value;_('.wssE')[0].innerHTML=c=='twitter'?g:((c=='bb'?'[url=http://':'&lt;a href="http://')+_.doc.domain+d+'webo-site-speedup.php'+(c=='bb'?'][img]':'"&gt;&lt;img src="')+'http://'+_.doc.domain+d+b+a+'.png'+(c=='bb'?'':'" width="'+a+'" height="'+a+'" border="0" alt="'+e+'" title="'+e+'"/')+(c=='bb'?'[/img][/url]':'&gt;&lt;/a&gt;')+(c=='site'?'&lt;br/&gt;'+f:''));b=_('#wss_award')[0];b.src=h;b.src=b.src.replace(/(size=|speedup|webonaut[0-9]-)[0-9]+(\.png)?/,'$1'+a+'$2');b.style.marginTop=Math.round((250-a)/2)+'px'}}break;case 'options':if(_('#wss_config')[0]){_.config={current:_('#wss_config')[0].value}}_.x('options_configuration','GET',null,function(){if(this.readyState==4&&this.status==200){eval(this.responseText);var a=_.config[_.config.current];if(a){_('.wssU3')[0].innerHTML=_('#wss_title')[0].value=a[0][1];_('.wssU4')[0].innerHTML=_('#wss_description')[0].value=a[1][1];if(wss_premium==10){wss_fee=_('#wss_fee')[0].value=_('.wssO15',_('.wssU21')[0])[0].innerHTML=_('.wssO15',_('.wssO14')[0])[0].innerHTML=a[a.length-1][1]}}
var b=_('.wssU11'),c,d=0,e,f,g;while(c=b[d++]){e=_('.wssJ',c);g=0;while(f=e[g++]){if(!f.rel.indexOf('user')&&typeof _.config[f.rel]!=='undefined'){a=_.config[f.rel][0][1];f.lastChild.innerHTML=a.length>12?a.substr(0,12)+'...':a}}}}});case 'install':case 'system':if(_('#wss_website_root')[0]){wss_c=_('#wss_javascript_cachedir')[0].value.replace(_('#wss_website_root')[0].value,'/')}if(_('#wss_showbeta')[0]){_('.wss_c')[0].innerHTML=_('#wss_showbeta')[0].title}if(_('#wss_beta')[0]){setTimeout(function(){if(_.feeds[1]){var t,i=0,e=_.feeds[1].entries,g=_('#wss_upd')[0],f=0;if(g){while(e&&(t=e[i++])){if(g.title.replace(/[^0-9]/g,'')===t.title.replace(/\./g,'')){f=i-1;e=0}}g.innerHTML='<p class="wssI">'+g.title+'</p>'+_.feeds[1].entries[f].content.replace('<ul','<ul class="wssO7"').replace(/<li/g,'<li class="wssO8"').replace(/<div.*\/div>/,"")+'<p class="wssI"><a href="#wss_stable" class="wssJ wssJ5" onclick="_.a(this)">'+wss_install+g.title.split(' ')[1]+'<span class="wssJ6"></span></a></p>'}g=_('#wss_beta')[0];if(g){while(e&&(t=e[i++])){if(t.title.indexOf('b')!=-1&&g.title.replace(/[^0-9]/g,'')===t.title.replace(/\./g,'')){f=i-1}}g.innerHTML='<p class="wssI">'+g.title+'</p>'+_.feeds[1].entries[f].content.replace('<ul','<ul class="wssO7"').replace(/<li/g,'<li class="wssO8"').replace(/<div.*\/div>/,"")+'<p class="wssI"><a href="#wss_beta" class="wssJ wssJ5" onclick="_.a(this)">'+wss_install+g.title.split(' ')[1]+'<span class="wssJ6"></span></a></p>'}}else{setTimeout(arguments.callee,1000)}},200)}var a=_('.wssO4 .wssJ'),b,c=0;while(b=a[c++]){if(b.href&&b.href.indexOf('#')!=-1){b.onclick=function(e){e=e||_.win.event;e=e.target||e.srcElement;while(!e.href){e=e.parentNode}var a=e.hash,b=_('fieldset'),c,d=0;while(c=b[d++]){c.style.display='none'}_(a)[0].style.display='block';b=_('.wssO4');d=0;while(c=b[d++]){c.className='wssO4'}e.parentNode.className='wssO4 wssO5';return false}}}}if(_('.wssS12')[0]){_('.wssO4 .wssJ')[1].onclick({target:_('.wssO4 .wssJ')[1]})}if(_('.wssS11')[0]){_('.wssO4 .wssJ')[3].onclick({target:_('.wssO4 .wssJ')[3]})}if(g){g.style.display=wss_premium=='0'?'block':'none'}if(g=_('#wss_feed')[0]){setTimeout(function(){if(_.feeds[0]&&_.feeds[1]){var t='<ul class="wssO wssO3">',i,e,g=_('#wss_feed')[0];for(i=0;i<4;i++){e=_.feeds[0].entries[i];t+='<li class="wssO4"><p class="wssI">'+e.publishedDate.substr(0,17)+'</p><p class="wssI"><a href="'+e.link+'" class="wssJ">'+e.title+'</a></p></li>'}if(g){g.innerHTML=t+'</ul>';_.r(g,'wssN21')}g=_("#wss_upd")[0];if(g){t=i=0;e=_.feeds[1].entries;while(e&&(t=e[i++])){if(g.title.replace(/[^0-9]/g,'')==t.title.replace(/\./g,'')){t=i-1;e=0}}g.innerHTML='<p class="wssI">'+g.title+'</p>'+_.feeds[1].entries[t].content.replace('<ul','<ul class="wssO wssO3"').replace(/<li/g,'<li class="wssO4"').replace(/<div.*\/div>/,"")+'<p class="wssI"><a href="#wss_update" class="wssJ wssJ5" onclick="_.a(this)">'+wss_install+g.title.split(' ')[1]+'<span class="wssJ6"></span></a></p>';_.r(g,'wssN21')}}else{setTimeout(arguments.callee,1000)}},200)}_.m();_('#wss_spot')[0].focus()};
_.bind=function(a,b,c){if(typeof a==='string'){var d=_(a),e=0;while(a=d[e++]){_.bind(a,b,c)}}else{b='on'+b;var d=a[b];if(d){a[b]=function(){d();c()}}else{a[b]=c}}}
_.ua=navigator.userAgent.toLowerCase();_.k=!!_.doc.getElementsByClassName;_.b={safari:_.ua.indexOf('webkit')!=-1,opera:_.ua.indexOf('opera')!=-1,ie:_.ua.indexOf('msie')!=-1&&_.ua.indexOf('opera')==-1,mozilla:_.ua.indexOf('mozilla')!=-1&&(_.ua.indexOf('compatible')+_.ua.indexOf('webkit')==-2)};_.q=!!_.doc.querySelectorAll;if(_.doc.addEventListener&&!_.b.opera){_.doc.addEventListener('DOMContentLoaded',_.ready,false)}if(_.b.ie&&_.win==top){(function(){if(_.isReady){return}try{_.doc.documentElement.doScroll('left')}catch(e){setTimeout(arguments.callee);return}_.ready()})()}if(_.b.opera){_.doc.addEventListener('DOMContentLoaded',function(){if(_.isReady){return}var i=0,j;while(j=_.doc.styleSheets[i++]){if(j.disabled){setTimeout(arguments.callee);return}}_.ready()},false)}if(_.b.safari){(function(){if(_.isReady){return}if((_.doc.readyState!=='loaded'&&_.doc.readyState!=='complete')||_.doc.styleSheets.length!==_('style,link[rel=stylesheet]').length){setTimeout(arguments.callee);return}_.ready()})()}
_.bind(_.win, 'load', _.ready);
_.hide=function(a){var b=_.doc.cookie;if(b.indexOf(a)==-1){b=b.indexOf('wss_blocks')==-1?b:b.replace(/.*wss_blocks=/,'');_.v('wss_blocks='+b.replace(/;.*/,'').replace(a,'')+a);b=_('.wssN12 .wssN2')[0];if(b){_('#'+a)[0].style.display='none';b.innerHTML+='<p class="wssI '+a+'"><a href="javascript:_.show(\''+a+'\')" class="wssJ">'+_('#'+a+' .wssN3')[0].innerHTML+'</a></p>';b.parentNode.style.display='block'}}}
_.show=function(a){var b=_.doc.cookie;if(b.indexOf(a)!=-1){b=b.indexOf('wss_blocks')==-1?b:b.replace(/.*wss_blocks=/,'');_.v('wss_blocks='+b.replace(/;.*/,'').replace(a,''));b=_('.'+a)[0];var c=b.parentNode;if(b){c.removeChild(b);var d=_('#'+a)[0];d.className+=' wssY';d.title=8;d.style.display='block';if(!_('.wssI',c)[0]){c.parentNode.style.display='none'}}}}
_.r=function(a,b){if(a){a=a.parentNode;a.className=a.className.replace(b,'')}}
_.r1=function(a,b){if(a){a.className=a.className.replace(b,'')}}
_.g=function(x){_('.wssC4 table')[0].style.display='none';_('.wss_h')[0].style.display='block';_.files=[];var a=_('tr',_('.wssC4 tbody')[0]),b,c=0,d=0,e,f=function(){if(this.readyState==4&&this.status==200){_.files[_.o++]=eval(this.responseText);if(_.o!=_.files.length){_.x('compress_'+(x?'image':'gzip')+'&wss_file='+_.files[_.o],'GET',null,arguments.callee)}else{_.o=0;_('.wss_h')[0].style.display='none';var a=_('table')[1],b,c=0,d='<tbody>',e=_('#wss_directory')[0].value,f=0,g=0,h=0,i=0;while(b=_.files[c++]){if(b[2]){d+='<tr class="wssT8 wssT1'+(f%2?2:1)+(b[4]?' wssT100':'')+'"'+(b[4]?' title="'+_.win['wss_error'+b[4]]+' '+b[1]+'"':'')+'><td class="wssT9">'+b[1].replace(e,'')+'</td><td class="wssT9">'+Math.round(100*b[2]/1024)/100+' '+wss_kb+'</td><td class="wssT9">'+(b[4]?wss_error0:'<span class="wssJ8">('+Math.round(100*(b[2]-b[3])/(b[2]?b[2]:1))+'%) </span>'+Math.round(100*(b[2]-b[3])/1024)/100+' '+wss_kb)+'</td></tr>';g+=b[2];h+=b[3];i+=b[2]-b[3];f++}}a.innerHTML=a.innerHTML.replace(/<tbody.*\/tbody>/i,d+'</tbody>');_('#wss_total1')[0].innerHTML=Math.round(100*g/1024)/100+' '+wss_kb;_('#wss_total2')[0].innerHTML=Math.round(100*h/1024)/100+' '+wss_kb;_('#wss_total3')[0].innerHTML='<span class="wssJ8">('+Math.round(100*i/(g?g:1))+'%)</span> '+Math.round(100*i/1024)/100+' '+wss_kb;a.style.display='table'}_('#wss_file1')[0].innerHTML=_.o+1;if(_.files[_.o-1]){_('#wss_file3')[0].innerHTML=_.files[_.o-1][1].replace(/.*\//,"")}var a=100*(_.o+1)/_.files.length;_('#wss_prog')[0].innerHTML=Math.round(a);_('.wss_m')[0].style.height=Math.round(119*a/100)+'px';_('.wss_m')[0].style.backgroundPosition='0 -'+Math.round(367-119*a/100)+'px'}},g=_('#wss_directory')[0].value;while(b=a[c++]){if(_('input',b)[0].checked&&(e=_('td',b)[0])){_.files[d++]=g+e.innerHTML}}_.o=0;if(_.files.length){_('#wss_file1')[0].innerHTML='1';_('#wss_file2')[0].innerHTML=d;_('#wss_file3')[0].innerHTML=_.files[0].replace(/.*\//,"");var a=100/_.files.length;_('#wss_prog')[0].innerHTML=Math.round(a);_('.wss_m')[0].style.height=Math.round(119*a/100)+'px';_('.wss_m')[0].style.backgroundPosition='0 -'+Math.round(367-119*a/100)+'px';_.x('compress_'+(x?'image':'gzip')+'&wss_file='+_.files[0],'GET',null,f)}else{_('.wss_h')[0].style.display='none';_('.wssC4 table')[0].style.display='table'}};
_.z=function(){var a=_('.wssC4 tbody input'),b,c=0,d=_('.wssC4 thead input')[0].checked;while(b=a[c++]){b.checked=d}};
_.t=function(a){_.v('wss_lang='+a);var b=_.doc.location;b.href=b.href.replace(/#.*/,"")+(b.href.indexOf('?')==-1?'?':'&')+'wss'};
_.y=function(){if(this.readyState==4&&this.status==200){if(wss_premium==10){var a=['minify_css_file','minify_css_host','external_scripts_include_code','minify_javascript_file','minify_javascript_host','minify_html_one_string','minify_html_comments','gzip_cookie','gzip_noie','far_future_expires_html','far_future_expires_external','performance_mtime','performance_cache_version','performance_plain_string','performance_uniform_cache','performance_restore_properties','performance_delete_old','data_uris_on','data_uris_mhtml','data_uris_separate','data_uris_domloaded','css_sprites_enabled','css_sprites_aggressive','css_sprites_truecolor_in_jpeg','css_sprites_no_ie6','css_sprites_html_sprites','css_sprites_html_page','css_sprites_extra_space','html_cache_enabled','html_cache_flush_only','html_cache_ignore_list','html_cache_additional_list','unobtrusive_on','unobtrusive_body','unobtrusive_all','unobtrusive_informers','unobtrusive_counters','unobtrusive_ads','unobtrusive_iframes','parallel_enabled','parallel_css','parallel_javascript','parallel_ignore_list','external_scripts_minify_exclude','parallel_custom','parallel_ftp','parallel_https','performance_cache_engine','html_cache_enhanced'],b='http://webo.name/license/?key='+wss_license+'&r='+Math.random()+'&options=',c,d=0,e=_('.wssC6')[0],g,h,j=_.doc.createElement('script');while(c=a[d++]){c=e['wss_'+c];if(typeof c.type==='undefined'){h=0;while(g=c[h++]){if(g.checked){c.value=g.title}}}b+=c.checked||(typeof c.checked==='undefined'&&c.value&&c.value!=''&&c.value!='0')?'1':'0'}j.type='text/javascript';j.src=b;_('head')[0].appendChild(j)}_.j(_('.wssX')[0],this);setTimeout(function(){var a=_('.wssX')[0];if(a){a.innerHTML=''},30000)}};
_.c=function(a){if(a){_.config.current=a}_('#wss_config')[0].value=_.config.current;_('.wssC6')[0].onsubmit({target:_('.wssC6')[0]},_.y);var b=_('.wssU11 .wssJ'),c=0,d;while(d=b[c++]){if(d.rel===_.config.current){if(!d.rel.indexOf('user')){d.parentNode.className+=' wssU19'}d.parentNode.className+=' wssU12'}else{_.r(d,'wssU12');_.r(d,'wssU19')}}};
_.d=function(a){if(confirm(wss_confirm+_.config[a][0][1]+'"?')){_.x('options_delete&wss_config='+a,'GET',null,function(){if(this.readyState==4&&this.status==200){var a=0,b=_('.wssJ'),c,d=0;while(c=b[d++]){if(c.rel===_.config.current){c=c.parentNode;if(c.className.indexOf('wssU12')!=-1){a=1}c.parentNode.removeChild(c)}};_.f('safe');_.j(_('.wssX')[0],this)}})}return false};
_.e=function(a){if(a){_.config.current=a}if(_('#wss_config')[0].value===_.config.current){_('.wss_butt2')[0].style.display='inline';_('.wss_butt1')[0].style.display='none'}else{_('.wss_butt1')[0].style.display='inline';_('.wss_butt2')[0].style.display='none'}if(a){_('#wss_config')[0].value=a.indexOf('user')?'user':a}_('.wssU')[0].style.display='none';_('.wssU0')[0].style.display='block'};
_.f=function(a){if(_.config.current===a){var b=_('#wss_config')[0];b.value=b.value.indexOf('user')?_('.wssU20 .wssJ')[0].rel:b.value;_.e(a)}else{_.config.current=a;_('.wssU3')[0].innerHTML=_.config[a][0][1];_('.wssU4')[0].innerHTML=_.config[a][1][1];if(wss_premium==10){wss_fee=_('#wss_fee')[0].value=_('.wssO15',_('.wssU21')[0])[0].innerHTML=_('.wssO15',_('.wssO14')[0])[0].innerHTML=_('.wssO15',_('.wssT21')[0])[0].innerHTML=_.config[a][_.config[a].length-1][1]}var b=_('.wssU11 a'),c=0,d,e=_('.wssC6')[0],f,g=_('.wssU17')[0],h,j=0;_.r1(g,'wssU17')}while(d=b[c++]){if(d.rel===a){d.parentNode.className+=' wssU17'}}c=0;while((d=_.config[a][c++])&&(f=e[d[0]])){switch(f.type){case 'checkbox':f.checked=d[1]==1?true:false;d[1]-=0;break;default:e[d[0]+(d[1]-0+1)].checked=true;d[1]-=0;break;case 'hidden':case 'text':case 'textarea':f.value=d[1];break}if(h=_('#'+f.name+'_saas')[0]){try{h.style.display=d[1]&&d[1]!=0?'table-row':'none'}catch(e){h.style.display=''}j+=d[1]&&d[1]!=0?1:0}}if(wss_premium==10){_('.wssO14')[0].style.display=j?'block':'none'}}};
_.v=function(a){if(typeof wss_root!=='undefined'){_.doc.cookie=a+';expires='+(new Date(new Date().getTime()+30000000000)).toGMTString()+';path='+wss_root}_.doc.cookie=a+';expires='+(new Date(new Date().getTime()+30000000000)).toGMTString()+';path='+_.doc.location.pathname.replace(/[^\/]+$/,'')};
_.i=function(){var a=_.blocks.length;if(a){_.x('dashboard_'+_.blocks[a-1],'GET',null,function(){if(this.readyState==4&&this.status==200){_.win.wsserr=-1;var a=_('#wss_'+_.blocks.pop())[0];_.r(a,'wssN21');_.j(a,this);if(a=_('.wssJ5',a)[0]){a.onclick=_.a}_.m();_.i()}else{if(_.win.wsserr>-1){var a;try{a=this.status}catch(e){a=500}_.win.wsserr=a<500?2:1}}})}};
_.j=function(a,b){if(a){a.innerHTML=b.responseText}};
_.m=function(){var a=_('.wssJ9'),c=0;while(b=a[c++]){if(b.title){b.innerHTML+='<span class="wssJ00"><span class="wssJ0">'+b.title.replace(/</g,'&lt;').replace(/\[([^\s\]]+)\s([^\]]+)\]/g,"<span style='text-decoration:underline' onclick='_.doc.location.href=\"$1\";return false'>$2</span>").replace(/\/\/\/(.*)/,'<span class="wssD21">$1</span>')+'</span></span>';b.title=''}}};
_.u=function(e){e=e||_.win.event.target||_.win.event.srcElement;var a=e.name,b=parseInt(e.id.replace(a,'')),c,d,f,h=0,g=2,j,k;switch(a){case 'wss_parallel_custom':c=_('#wss_minify_css_host')[0];d=_('#wss_minify_javascript_host')[0];j=_('#wss_parallel_allowed_list')[0];k=_.doc.domain.replace(/(staging|static|js|css|stat|stat1|cdn|local|test|www|dev|beta|www2)\.([^\.]+)\.([^\.]+)/,"$2.$3");switch(b){default:f=k;c.value=c.title||f;d.value=d.title||f;j.value=j.title||f;break;case 2:f='cdn.'+k.replace(/^www\./i,'');c.title=c.title||c.value||' ';c.value=f;d.title=d.title||d.value||' ';d.value=f;j.title=j.title||j.value||' ';j.value=f;break;case 3:f=k+'.nyud.net';c.title=c.title||c.value||' ';c.value=f;d.title=d.title||d.value||' ';d.value=f;j.title=j.title||j.value||' ';j.value=f;break;case 4:f='weboin.ru/'+k;c.title=c.title||c.value||' ';c.value=f;d.title=d.title||d.value||' ';d.value=f;j.title=j.title||j.value||' ';j.value=f;break}break}d=_('.wssO15',_('#'+e.name+'_saas')[0])[0];j=e.checked;switch(e.type){case 'radio':j=e.title?1:0;if(j){d.innerHTML=e.title}break;case 'checkbox':break;default:j=e.value!=='';break}if(d=d.parentNode.parentNode){try{d.style.display=j?'table-row':'none'}catch(e){d.style.display=''}}c=_('.wssT20 tbody tr');g=0;while(d=c[g++]){if(d.style.display!=='none'&&(d=_('.wssO15',d)[0])){h+=parseInt(d.innerHTML-0)}}if(wss_premium==10){wss_fee=_('#wss_fee')[0].value=_('.wssO15',_('.wssO14')[0])[0].innerHTML=_('.wssO15',_('.wssU21')[0])[0].innerHTML=_('.wssO15',_('.wssT21')[0])[0].innerHTML=h;_('.wssO14')[0].style.display=h?'block':'none'}}
_.n=function(){var a=_.doc.createElement('script');a.src='http://webo.name/license/?key='+wss_license+'&r='+Math.random()+'&module='+_('#wss_balance_add')[0].value;b.type='text/javascript';_.doc.documentElement.firstChild.appendChild(a)}
_.feeds=[];_.win.yass=_;_.win._=_.win._||_})();if(_.doc.cookie.indexOf('wss_blocks')==-1){_.v('wss_blocks=wss_toolswss_linkswss_newswss_syswss_updates')}setInterval(function(){var a=_.doc.location.hash||'',b=a.indexOf('#wss'),c=_('.wss_d1 .wss_g'),d,e=0,f,g;while(d=c[e++]){if(typeof d.currentStyle!=='undefined'){f=d.currentStyle}else{if(typeof _.doc.defaultView.getComputedStyle!=='undefined'){f=_.doc.defaultView.getComputedStyle(d,null)}else{f=getComputedStyle(d,null)}}f=f.backgroundColor;if(f.indexOf(255)+f.indexOf('ff')!=-2){e=100}}if(e!=1&&e<100){_('.wss_d')[0].className='wss_d'}if(!b){a=a.slice(5).replace(/\x2523/g,'#').split('#');g=a[1];a=a[0];if(a==='status'||a==='refresh'||a==='update'){a=_.page='dashboard'}if(a==='renew'){a=_.page='system';g='cache';_.w()}if(a==='stable'||a==='beta'||a==='install'){a=_.page='systen'}if(a!==_.page){_.x('install_'+a,'GET',null,function(){if(this.readyState==4&&this.status==200){_.j(_('#wss_content')[0],this);_.w()}});_.page=a};if(g){var h=_('.wssU12 .wssJ')[0],j,k=0;if(h){_.f(h.href.replace(/.*'([^']'.*)/,'$1'))}h=_('.wssO4 .wssJ');while(j=h[k++]){if(j.href&&j.href.indexOf('#'+g)!=-1){j.onclick({target:j});_.doc.location.hash='wss_'+a}}}};if(a=_('#wss_q2')[0]){a.innerHTML+='.';if(a.innerHTML.length>3){a.innerHTML=''}};a=_('.wssY');e=0;while(b=a[e++]){if(b.title-->0){b.className+=' wssY'+b.title;_.r1(b,' wssY'+(b.title-0+1))}if(b.title<=0){_.r1(b,' wssY wssY0');b.title=''}};if(_.win.wsserr==-1){_('#wss_content')[0].className='';_.win.wsserr=-2}},200);setTimeout(function(){var a=_.win.wsserr;if(a>0){switch(a){case 2:_('#wss_content')[0].className='wss_a0';break;default:_('.wssK03')[0].style.display='none';_('.wssK02')[0].style.display='block';_('#wss_content')[0].className='wss_a0';break}}},10000);if(_.page==='dashboard'&&_.doc.cookie.indexOf('wss_welcome=1')==-1&&_('.wss_z1')[0]){_('.wss_a')[0].className='wss_a wss_a1'}