function productAdd() {
    document.querySelector("#app").innerHTML = `
    <form id="adding-form">
        <input placeholder="Product Title..." type="text" name="title" />
        <input placeholder="Product Price..." type="number" step="0.01" min="1" max="1000000" name="price" />
        <textarea name="description" rows="10" placeholder="Product Description..."></textarea>
        <input type="submit" />
    </form>
    `;

    document.querySelector("#adding-form").onsubmit = (e) => {
        e.preventDefault();
        const formFields = e.currentTarget.elements;
        // POST request
        fetch("/api/product-add.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                title: formFields.title.value,
                price: +formFields.price.value,
                description: formFields.description.value
            }),
        })
            .then((resp) => {
                resp.json().then((data) => {
                    if(data.status === 201) {
                        productList();
                    }
                });
            })
            .catch((error) => {
                console.log(error);
            });
    };
}
