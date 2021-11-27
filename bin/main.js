document.addEventListener("DOMContentLoaded", (e) => {
    productList();
    document.getElementById('add-menu').addEventListener('click', productAdd);
    document.getElementById('main-menu').addEventListener('click', productList);
})