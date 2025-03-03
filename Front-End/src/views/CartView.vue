<script setup>
import { ref, watchEffect } from "vue";
import { RouterLink } from "vue-router";
import CartViewTable from "../components/CartViewTable.vue";
import CartViewCheckOut from "../components/CartViewCheckOut.vue";
import { useCartStore } from "@/stores/cartStore";
import { isAuthenticated } from "@/utils/auth";

const cartStore = useCartStore();
const authUser = ref(isAuthenticated());

watchEffect(() => {
  authUser.value = !isAuthenticated();
});
</script>

<template>
  <div>
    <div v-if="cartStore.cart.length > 0" class="flex flex-col rounded-none">
      <div class="px-20 py-16 w-full bg-white max-md:px-5 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
          <!-- Product Table -->
          <div class="w-[68%] max-md:w-full">
            <div class="overflow-x-auto">
              <table class="min-w-full text-base text-black">
                <thead class="bg-orange-50">
                  <tr>
                    <th class="px-6 py-4 text-left">Product</th>
                    <th class="px-6 py-4 text-left">Price</th>
                    <th class="px-12 py-4 text-left">Quantity</th>
                    <th class="px-6 py-4 text-left">Subtotal</th>
                    <th class="px-6 py-4 text-left">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <CartViewTable />
                </tbody>
              </table>
              <!-- Login prompt -->
              <div
                v-if="authUser"
                class="flex items-center justify-center mt-6 space-x-4 bg-gray-100 p-4 rounded"
              >
                <span class="text-lg font-medium text-gray-800"
                  >Please log in to continue with your purchase</span
                >
                <RouterLink
                  to="/login"
                  class="px-4 py-2 bg-yellow-600 text-white font-semibold rounded hover:bg-yellow-700 transition-colors"
                >
                  Login Now
                </RouterLink>
              </div>
            </div>
          </div>

          <!-- Cart Totals -->
          <CartViewCheckOut />
        </div>
      </div>
    </div>

    <!-- Cart empty-->
    <div
      v-else
      class="flex flex-col items-center justify-center h-[450px] bg-white"
    >
      <p class="text-3xl font-semibold text-black mb-6">Our Cart is Empty</p>
      <p class="text-lg text-slate-400 mb-8">
        Add items in your cart than you can proceed to check out
      </p>
      <router-link to="/products">
        <button
          class="bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-500"
        >
          Go to Products
        </button>
      </router-link>
    </div>
  </div>
</template>
