document.addEventListener("DOMContentLoaded", (e) => {
    fetch(`/api/products.php`, {
        method: "GET",
    })
        .then((resp) => {
            resp.json().then((data) => {
                console.log(data.data);
                let html_var = `<table class="table-dark">
                                <thead class="table-dark">
                                    <tr class="table-dark">
                                        <th scope="col" class="table-dark">#</th>
                                        <th scope="col" class="table-dark">title</th>
                                        <th scope="col" class="table-dark">price</th>
                                        <th scope="col" class="table-dark">description</th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark">
                                        `;
                data.data.forEach((elem) => {
                    html_var += `
                    <tr class="table-dark">
                        <td class="id-col">${elem.id}</td>
                        <td class="table-dark">${elem.title}</td>
                        <td class="table-dark">${elem.price}</td>
                        <td class="descrip-col">${elem.description}</td>
                    </tr>
                    `
                });
                html_var += `
                </tbody>
                </table>`;
                document.querySelector("#app").innerHTML = html_var;
            });
        })
        .catch((err) => {
            console.log("ERROR OCCURED: ", err);
            document.querySelector('#app').innerHTML = `
            <h1>
                Error Occured!
            </h1>`
        });
});
