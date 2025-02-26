<script setup>
import CartModelItems from "./CartModelItems.vue";
const emit = defineEmits(["cart-close"]);
const closeCart = () => {
  emit("cart-close");
};
</script>
<template>
  <div>
    <!-- OverLay-------->
    <div
      @click="closeCart"
      class="fixed inset-0 bg-black bg-opacity-30 z-40"
    ></div>

    <!-- Modal -->
    <div class="fixed bottom-0 right-0 z-50">
      <section
        class="flex flex-col py-7 mb-0 max-w-full bg-white w-[417px] max-md:mb-2.5"
      >
        <div class="flex flex-col items-start px-7 w-full max-md:px-5">
          <h2 class="text-2xl font-semibold text-black">Shopping Cart</h2>
          <hr
            class="shrink-0 mt-6 max-w-full h-px border border-solid border-zinc-300 w-[287px]"
          />

          <div class="flex flex-col gap-3">
            <CartModelItems />
          </div>

          <div
            class="flex gap-5 justify-between mt-64 max-w-full text-base w-[286px] max-md:mt-10"
          >
            <p class="text-black">Subtotal</p>
            <p class="font-semibold text-yellow-600">$ 520,000.00</p>
          </div>
        </div>

        <hr class="shrink-0 mt-6 h-px border border-solid border-zinc-300" />

        <div
          class="flex gap-3.5 items-start self-center mt-7 text-xs text-black whitespace-nowrap"
        >
          <button
            class="gap-2.5 px-8 py-1.5 border border-black border-solid rounded-[50px] max-md:px-5"
          >
            Cart
          </button>
          <button
            class="gap-2.5 px-8 py-1.5 border border-black border-solid rounded-[50px] max-md:px-5"
          >
            Checkout
          </button>
          <button
            class="gap-2.5 px-8 py-1.5 border border-black border-solid rounded-[50px] max-md:px-5"
          >
            Comparison
          </button>
        </div>
      </section>
    </div>
  </div>
</template>
