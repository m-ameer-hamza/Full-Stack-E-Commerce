import { defineStore } from "pinia";

export const useCartStore = defineStore("cart", {
  state: () => ({
    cart: [],
  }),
  actions: {
    addToCart(product) {
      const existingProduct = this.cart.find((item) => {
        return item.id === product.id;
      });
      if (existingProduct) {
        existingProduct.quantity++;
      } else {
        this.cart.push({ ...product, quantity: 1 });
      }
    },
    removeFromCart(id) {
      const product = this.cart.find((item) => {
        return item.id === id;
      });
      if (product.quantity > 1) {
        product.quantity--;
      } else {
        //remove the product
        this.deleteFromCart(id);
      }
    },
    deleteFromCart(id) {
      const index = this.cart.findIndex((item) => {
        return item.id === id;
      });
      this.cart.splice(index, 1);
    },
    clearCart() {
      this.cart = [];
    },
  },
});
