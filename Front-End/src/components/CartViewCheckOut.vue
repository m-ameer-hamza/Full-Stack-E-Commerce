<script setup>
import { ref, watchEffect } from "vue";
import { useCartStore } from "@/stores/cartStore";
import paymentAPI from "../../apis/paymentAPI";
import { useMutation } from "@tanstack/vue-query";
import { useToast } from "vue-toastification";
import { isAuthenticated } from "@/utils/auth";

const cartStore = useCartStore();
const toast = useToast();
const { createPaymentIntent } = paymentAPI();
const authUser = ref(isAuthenticated());
watchEffect(() => {
  authUser.value = isAuthenticated();
});

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
  if (authUser) {
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
  <div class="w-[32%] max-md:w-full sticky top-[80px]">
    <div
      class="flex flex-col px-20 pt-4 pb-20 mx-auto bg-orange-50 max-md:px-5 max-md:mt-10"
    >
      <h2 class="self-center text-3xl font-semibold text-black">Cart Total</h2>
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
        @click="checkOutHandler"
        :class="[
          'px-14 py-4 mt-11 mr-2.5 ml-3 text-xl text-black rounded-2xl border border-black border-solid max-md:px-5 max-md:mt-10 max-md:ml-2.5 focus:outline-none focus:ring-2 focus:ring-yellow-600',
          authUser
            ? 'hover:bg-orange-100'
            : 'opacity-50 cursor-not-allowed hover:cursor-not-allowed',
        ]"
      >
        Check Out
      </button>
    </div>
  </div>
</template>
