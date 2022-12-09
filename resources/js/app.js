window.$ = window.jQuery = require('jquery')

let open_menu_trigger = document.getElementById('menuTrigger')
let side_nav = document.getElementById('sideNav')

open_menu_trigger.addEventListener('click', () => {
   side_nav.classList.toggle('sidenav-active')
   open_menu_trigger.classList.toggle('active')
})
