
let btn_abrir_menu = document.getElementById("btn_abrir_menu");
let btn_fechar_menu = document.getElementById("btn_fechar_menu");
let menu_mobile = document.getElementById("menu_mobile");

let overlay_menu = document.getElementById("overlay_menu");

btn_abrir_menu.addEventListener('click', () => {
    menu_mobile.classList.add("expandir-menu")
});

menu_mobile.addEventListener('click', () => {
    menu_mobile.classList.remove("expandir-menu")
});

btn_fechar_menu.addEventListener('click', () => {
    menu_mobile.classList.remove("expandir-menu")
});

overlay_menu.addEventListener('click', () => {
    menu_mobile.classList.remove("expandir-menu")
});