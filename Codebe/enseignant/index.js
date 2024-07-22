//...............sidebare...........

const menuItem=document.querySelectorAll('.menu-item');

// remove active classList...
const removeActive = ()=>{
    menuItem.forEach(item => {
        item.classList.remove('active')
    } );
}