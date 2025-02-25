<script setup>
import { useCartStore } from "../stores/cartStore.js";

const emit = defineEmits(["cart-close"]);
const closeCart = () => {
  emit("cart-close");
};
const cartStore = useCartStore();
console.log("Cart Store is", cartStore);
</script>
<template>
  <div>
    <!-- OverLay-------->
    <div
      @click="closeCart"
      class="fixed inset-0 bg-black bg-opacity-30 z-40"
    ></div>

    <!-- Modal -->
    <div class="fixed top-[80px] right-0 z-50">
      <section
        class="flex flex-col py-7 mb-0 max-w-full bg-white w-[417px] max-md:mb-2.5"
      >
        <div class="flex flex-col items-start px-7 w-full max-md:px-5">
          <h2 class="text-2xl font-semibold text-black">Shopping Cart</h2>
          <hr
            class="shrink-0 mt-6 max-w-full h-px border border-solid border-zinc-300 w-[287px]"
          />

          <div
            class="flex gap-5 justify-between self-stretch mt-11 max-md:mt-10"
          >
            <div>
              <img
                src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/f4c4132ec90106414ee701f7fb52c3a1516281cf031758a17b6254c98e4d8448?placeholderIfAbsent=true"
                alt="Asgaard sofa"
                class="object-contain rounded-none aspect-[1.03] w-[108px]"
              />
              <img
                src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/95361f8381793a7d20d45ab8b0351fd72388fbc166c6405aa8688b4949f95d80?placeholderIfAbsent=true"
                alt="Casaliving Wood"
                class="object-contain mt-5 rounded-none aspect-[1.03] w-[108px]"
              />
            </div>
            <div class="my-auto text-black">
              <div class="flex gap-5 justify-between">
                <div class="flex flex-col">
                  <p class="self-start text-base">Asgaard sofa</p>
                  <div class="flex gap-4 items-center mt-2 text-xs font-light">
                    <span class="self-stretch text-base">1</span>
                    <span class="self-stretch my-auto">X</span>
                    <span
                      class="self-stretch my-auto font-medium text-yellow-600"
                    >
                      Rs. 250,000.00
                    </span>
                  </div>
                </div>
                <button class="flex items-center justify-center">
                  <i
                    class="text-white pi pi-times-circle text-2xl bg-gray-500 hover:bg-red-600 rounded-full"
                  ></i>
                </button>
              </div>
              <div class="flex gap-5 justify-between mt-16 max-md:mt-10">
                <div>
                  <p class="text-base">Casaliving Wood</p>
                  <div
                    class="flex gap-4 items-center mt-2 text-xs font-light max-md:mr-2"
                  >
                    <span class="self-stretch text-base">1</span>
                    <span class="self-stretch my-auto">X</span>
                    <span
                      class="self-stretch my-auto font-medium text-yellow-600"
                    >
                      Rs. 270,000.00
                    </span>
                  </div>
                </div>
                <button class="flex items-center justify-center">
                  <i
                    class="text-white pi pi-times-circle text-2xl bg-gray-500 hover:bg-red-600 rounded-full"
                  ></i>
                </button>
              </div>
            </div>
          </div>

          <div
            class="flex gap-5 justify-between mt-64 max-w-full text-base w-[286px] max-md:mt-10"
          >
            <p class="text-black">Subtotal</p>
            <p class="font-semibold text-yellow-600">Rs. 520,000.00</p>
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
