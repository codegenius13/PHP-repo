const form = document.querySelector('form');
form.addEventListener('submit', function(e) {
    e.preventDefault();
    const itemName = form.elements.item_name.value;
    const itemPrice = form.elements.item_price.value;
    const itemQuantity = form.elements.item_quantity.value;
    if (!itemName || !itemPrice || !itemQuantity) {
        alert('Please fill in all fields');
        return false;
    }
    // TODO: validate item price and quantity
    form.submit();
});
