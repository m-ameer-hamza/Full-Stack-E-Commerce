import { defineStore } from "pinia";

export const useCartStore = defineStore("cart", {
  state: () => ({
    cart: [],
  }),
  actions: {
    addItem(product) {
      const existingProduct = this.cart.find((item) => {
        return item.id === product.id;
      });
      if (existingProduct) {
        existingProduct.quantity++;
      } else {
        this.cart.push({ ...product, quantity: 1 });
      }
    },
    removeItem(id) {
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
    deleteItem(id) {
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
