async function getProducts() {
    const response = await fetch("/php/products.php");
    if (response.status < 200 || response.status >= 300) {
        throw Error(response.statusText);
    };
    const products = await response.json();
    return products;
};

async function getProductById(id) {
    if (!id) {
        throw Error("Invalid ID.");
    };
    const response = await fetch(`/php/products.php?id=${id}`);
    if (response.status < 200 || response.status >= 300) {
        throw Error(response.statusText);
    };
    const product = await response.json();
    return product;
};

export {
    getProducts,
    getProductById,
};