<script setup>
import CartViewTable from "../components/CartViewTable.vue";
import { useCartStore } from "@/stores/cartStore";
import { useUserStore } from "@/stores/userStore";
import paymentAPI from "../../apis/paymentAPI";
import { useMutation } from "@tanstack/vue-query";
import { useToast } from "vue-toastification";

const cartStore = useCartStore();
const userStore = useUserStore();
const toast = useToast();
const { createPaymentIntent } = paymentAPI();

const checkOutCartHandler = () => {
  return cartStore.cart.map((item) => {
    return {
      product_id: item.id,
      title: item.title,
      price: item.price,
      quantity: item.quantity,
    };
  });
};

const checkOutHandler = () => {
  if (userStore.isAuthenticated) {
    const checkOutCart = checkOutCartHandler();
    checkOutMutate.mutate({
      items: checkOutCart,
      amount: cartStore.totalPrice,
    });
  } else {
    //convert it to popup using sweetalert
    alert("Please login to continue");
  }
};

const checkOutMutate = useMutation({
  mutationFn: createPaymentIntent,
  mutationKey: ["createPaymentIntent"],
  onSuccess: (data) => {
    window.location.href = data.url;
  },
  onError: (error) => {
    console.log(error);
  },
});
</script>

<template>
  <div class="flex flex-col rounded-none">
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
          </div>
        </div>

        <!-- Cart Totals -->
        <!-- Ensure this container is not affected by any overflow on parent elements -->
        <div class="w-[32%] max-md:w-full sticky top-[80px]">
          <div
            class="flex flex-col px-20 pt-4 pb-20 mx-auto bg-orange-50 max-md:px-5 max-md:mt-10"
          >
            <h2 class="self-center text-3xl font-semibold text-black">
              Cart Totals
            </h2>
            <div class="flex gap-5 justify-between mt-16 max-md:mt-10">
              <div
                class="flex flex-col self-start text-base font-medium text-black whitespace-nowrap"
              >
                <div>Subtotal</div>
                <div class="self-start mt-8">Total</div>
              </div>
              <div class="flex flex-col">
                <div class="self-end text-base text-black">
                  $ {{ cartStore.totalPrice.toFixed(2) }}
                </div>
                <div class="mt-8 text-xl font-medium text-black">
                  $ {{ cartStore.totalPrice.toFixed(2) }}
                </div>
              </div>
            </div>
            <button
              :disabled="cartStore.cart.length === 0"
              @click="checkOutHandler"
              :class="`px-14 py-4 mt-11 mr-2.5 ml-3 ${
                cartStore.cart.length === 0
                  ? 'cursor-not-allowed pointer-events-none opacity-50'
                  : 'hover:bg-orange-100'
              } text-xl text-black rounded-2xl border border-black border-solid max-md:px-5 max-md:mt-10 max-md:ml-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500`"
            >
              Check Out
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
