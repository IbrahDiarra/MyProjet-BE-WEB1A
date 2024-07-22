const menuItem=document.querySelectorAll('.menu-item');

// remove active classList...
const removeActive = ()=>{
    menuItem.forEach(item => {
        item.classList.remove('active')
    } );
}

menuItem.forEach(item => {
    item.addEventListener('click',()=>{
        removeActive();
        item.classList.add('active');
    })
} )


var marker=document.querySelector("#marker");
var item=document.querySelectorAll(".menu-item");

function indicator(e){
    marker.style.left=e.offsetLeft+"px";
    marker.style.width=e.offsetWidth+"px";
}

item.forEach(link =>{
    link.addEventListener('click',(e)=>{
        indicator(e.target);
    })
})
