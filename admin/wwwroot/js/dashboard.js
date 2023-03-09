let list = document.querySelectorAll('.sidebar_menu li');

function activeLink(){
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');

}

list.forEach((item) =>
item.addEventListener('mouseover', activeLink));


let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.sidebar_menu');
let main = document.querySelector('.main');

toggle.onclick = function(){
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

// drow down user

let menuToggle = document.querySelector('.profile');

menuToggle.onclick = function(){
    const toggleMenu = document.querySelector('.profile_menu');
    toggleMenu.classList.toggle('active');
}

// scroll bg

window.addEventListener('scroll', () =>{
    document.querySelector('.topbar_container').classList.toggle('windows-scrolled', window.scrollY > 0);
})


