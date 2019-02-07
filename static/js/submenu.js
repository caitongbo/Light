hasChildren = document.querySelectorAll('.menu-item-has-children');
len= hasChildren.length;
i=0;
while (i<len) {
    hasChildren[i].onmouseover =function(){
        liCount = this.children[1].childElementCount;
        this.children[1].style.zIndex = '1'
        this.children[1].style.height = 50*liCount +'px'
    }
    hasChildren[i].onmouseout =function(){
        this.children[1].style.height = '0px'
        this.children[1].style.zIndex = '-1'
    }
    i++;
}