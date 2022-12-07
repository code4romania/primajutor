import Swiper from 'swiper/bundle';

const swiper = new Swiper(".first-aid-swiper", {
    allowTouchMove: false,
    autoHeight: true, //enable auto height
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


let open_menu_trigger = document.getElementById('menuTrigger')
let side_nav = document.getElementById('sideNav')

open_menu_trigger.addEventListener('click', () => {
    side_nav.classList.toggle('sidenav-active')
    open_menu_trigger.classList.toggle('active')
})
