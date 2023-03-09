window.addEventListener('scroll', () =>{
    document.querySelector('.nav').classList.toggle('windows-scrolled', window.scrollY > 0);
})


/*== nav toggle==*/
const nav = document.querySelector('.nav__link');
const openNavBtn = document.querySelector('#nav__toggle-open');
const closeNavBtn = document.querySelector('#nav__toggle-close');

const openNav = () => {
    nav.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display ='inline-block';
}

openNavBtn.addEventListener('click', openNav);

const closeNav = () => {
    nav.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display ='none';
}

closeNavBtn.addEventListener('click', closeNav);



//close nav after click on specific query
document.addEventListener('click', noDisplayNav)
function noDisplayNav(){
    let query = window.matchMedia("(max-width: 1024px)");

    if(query.matches){
        nav.querySelectorAll('li a').forEach(navLink => {
            navLink.addEventListener('click', closeNav);
        })
    }
}








//calendar

const monthEl = document.querySelector(".date h1");
const fullDateEl = document.querySelector(".date p");
const daysEl = document.querySelector(".days");

const monthInx = new Date().getMonth();
const lastDay = new Date(new Date().getFullYear(), monthInx + 1, 0).getDate();
const firstDay = new Date(new Date().getFullYear(), monthInx, 1).getDay() - 1;


const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

monthEl.innerText = months[monthInx];
fullDateEl.innerText = new Date().toDateString();

let days = "";

for(let i = firstDay; i>0; i--){
    days += `<div class="empty"></div>`;
}

for(let i = 1; i <= lastDay; i++){
    if(i === new Date().getDate   ()){
        days += `<div class="today">${i}</div>`;    
    }else{
        days += `<div>${i}</div>`;
    }
}

daysEl.innerHTML = days;

