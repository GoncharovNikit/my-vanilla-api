document.addEventListener('DOMContentLoaded', (e) => {
    fetch(`/api/products.php`, {
        method: 'GET'
    }).then((resp) => {
        resp.json().then(data => {
            console.log(data.data);
        });
    }).catch((err) => {
        console.log('ERROR OCCURED: ', err);
    })
})