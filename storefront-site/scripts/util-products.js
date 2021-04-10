async function getProducts() {
    const response = await fetch("/mock-data/products.json"); // This will be replaced with an actual API call.
    if (response.status < 200 || response.status >= 300) {
        throw Error(response.statusText);
    };
    const products = await response.json();
    return products;
};

async function getProductById(id) {
    const products = await getProducts();
    return products.find(product => {
        return product.id === id;
    });
};

export {
    getProducts,
    getProductById,
};