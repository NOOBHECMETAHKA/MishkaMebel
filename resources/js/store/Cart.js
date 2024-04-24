class Cart {
    constructor() {
        this.cartItemsCount = 0;
        this.cart = {};
        this.loadCartFromLocalStorage();
    }

    addToCart(itemId) {
        if (!this.cart[itemId]) {
            this.cart[itemId] = 1;
        } else {
            this.cart[itemId]++;
        }

        this.updateCartItemsCount();
        this.saveCartToLocalStorage();
    }

    updateCartItemsCount() {
        let count = 0;
        for (let key in this.cart) {
            count += this.cart[key];
        }
        this.cartItemsCount = count;
    }

    loadCartFromLocalStorage() {
        const cartData = localStorage.getItem('cart');
        if (cartData) {
            this.cart = JSON.parse(cartData);
            this.updateCartItemsCount();
        }
    }
    clearCart() {
        this.cart = {};
        this.cartItemsCount = 0;
        this.saveCartToLocalStorage();
    }
    saveCartToLocalStorage() {
        localStorage.setItem('cart', JSON.stringify(this.cart));
    }
}

export default Cart;
