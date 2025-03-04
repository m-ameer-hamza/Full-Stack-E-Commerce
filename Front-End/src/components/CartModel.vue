<script setup>
import CartModelItems from "./CartModelItems.vue";
import { useCartStore } from "@/stores/cartStore";
import { useRouter } from "vue-router";
const emit = defineEmits(["cart-close"]);
const closeCart = () => {
  emit("cart-close");
};

const goToCart = () => {
  router.push("/cart");
  closeCart();
};

const goToCheckout = () => {
  router.push("/checkout");
  closeCart();
};

const cartStore = useCartStore();
const router = useRouter();
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
        class="flex flex-col py-7 mb-0 max-w-full bg-white w-[450px] max-md:mb-2.5"
      >
        <div class="flex flex-col items-start px-7 w-full max-md:px-5">
          <h2 class="text-2xl font-semibold text-black">Shopping Cart</h2>
          <hr
            class="shrink-0 mt-6 max-w-full h-px border border-solid border-zinc-300 w-[287px]"
          />

          <div class="flex flex-col gap-3 max-h-[520px] overflow-y-auto">
            <template v-if="cartStore.cart.length === 0">
              <div class="h-[200px] flex items-center justify-center">
                <p class="text-lg font-medium text-center">
                  Your cart is empty.
                </p>
              </div>
            </template>
            <template v-else>
              <CartModelItems />
            </template>
          </div>

          <div
            class="flex gap-5 justify-between mt-20 max-w-full text-base w-[286px] max-md:mt-10"
          >
            <p class="text-black">Subtotal</p>
            <p class="font-semibold text-yellow-600">
              $ {{ cartStore.totalPrice.toFixed(2) }}
            </p>
          </div>
        </div>

        <hr class="shrink-0 mt-6 h-px border border-solid border-zinc-300" />

        <div
          @click="goToCart()"
          class="flex h-[85px] items-center justify-center gap-2 bg-orange-50 text-black text-xs whitespace-nowrap px-4 py-2 rounded transition-colors duration-300 hover:bg-orange-100 hover:cursor-pointer"
        >
          <i class="pi pi-shopping-cart text-2xl"></i>
          <span class="text-xl">Go to Cart</span>
        </div>
      </section>
    </div>
  </div>
</template>
