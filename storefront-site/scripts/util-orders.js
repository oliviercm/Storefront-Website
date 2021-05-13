async function getOrders() {
    const response = await fetch("/php/order.php", {
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": localStorage.getItem("csrf-token"),
        },
    });
    const orders = (await response.json()).orders;
    return orders;
};

export {
    getOrders,
};