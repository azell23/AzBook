// var settingsmenu =  document.querySelector(".settings-menu")

// function settingsMenuToggle(){
//     settingsmenu.classList.toggle("settings-menu-heigt")
// }
const menuToggle= document.querySelector('.menu-toggle input');
const nav = document.querySelector('imp-links');
menuToggle.addEventListener('click',function()
{
nav.classList.toggle('slide');
});