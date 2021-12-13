function productList() {
    fetch(`/api/products/product-list.php`, {
        method: "GET",
    })
        .then((resp) => {
            resp.json().then((data) => {
                console.log(data.data);
                let html_var = `<table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>price</th>
                                        <th>description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        `;
                data.data.forEach((elem) => {
                    html_var += `
                    <tr>
                        <td class="id-col">${elem.id}</td>
                        <td>${elem.title}</td>
                        <td>${elem.price}</td>
                        <td class="descrip-col">${elem.description}</td>
                        <td class="remove-img"><img class="remove-product" src="/assets/remove-img.png" alt="Remove" /></td>
                    </tr>
                    `;
                });
                html_var += `
                </tbody>
                </table>`;
                document.querySelector("#app").innerHTML = html_var;
            });
        })
        .catch((err) => {
            console.log("ERROR OCCURED: ", err);
            document.querySelector("#app").innerHTML = `
            <h1>
                Error Occured!
            </h1>`;
        });
}
