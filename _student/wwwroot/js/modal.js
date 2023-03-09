document.getElementById('btn_modal').addEventListener('click', 
function(){
    document.querySelector('.bg_modal').style.display = 'flex';

});

document.querySelector('.close').addEventListener('click', 
function(){
    document.querySelector('.bg_modal').style.display = 'none';

});

