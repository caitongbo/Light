/*
* 作用：获取文章结构，做个文章页导航菜单
* */

var AllH2=document.querySelectorAll('.article_content>h2'),i = 0,li_dom = [];

li_dom[0]='<h3 class="uk-h5">文章目录</h3><ul uk-scrollspy-nav="closest: li; scroll: true; offset: 100" class="uk-nav uk-nav-default">';
li_dom[AllH2.length+1]='</ul>';
while(i < AllH2.length){
    AllH2[i].id='h2-'+(i+1);   //给页面中的h2添加id
    AllH2[i].className='uk-h4';   //给页面中的h2添加id
    li_dom[i+1]='<li><a href="#h2-'+(i+1)+'">'+ AllH2[i].innerText +'</li>';
    i++;
}
if(AllH2.length>2){
    ul_dom=li_dom.join('');
    document.getElementById('menu-container').innerHTML = ul_dom;
}



