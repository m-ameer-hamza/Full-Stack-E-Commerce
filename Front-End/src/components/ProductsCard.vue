<script setup>
import { useRouter } from "vue-router";
import { useCartStore } from "../stores/cartStore.js";
import { useToast } from "vue-toastification";
const BASE_URL = import.meta.env.VITE_BASE_URL;
const { products } = defineProps({
  products: {
    type: Array,
    required: true,
  },
});
const router = useRouter();
const cartStore = useCartStore();
const toast = useToast();

const addToCart = (product) => {
  cartStore.addItem(product);
  toast.success("Product added to cart");
};
</script>
<template>
  <div class="grid grid-cols-4 gap-x-12 gap-y-12">
    <article
      v-for="product in products"
      :key="product.id"
      class="w-[380px] h-[580px] relative group cursor-pointer"
    >
      <!-- Product Image -->
      <div @click="router.push(`/product/${product.id}`)">
        <figure>
          <img
            loading="lazy"
            class="w-full h-[427px] object-cover rounded-t-lg"
            :src="`${BASE_URL}${product.imagePath}`"
            alt="Syltherine – Stylish cafe chair"
          />
        </figure>

        <!-- Product Info -->
        <div
          class="absolute h-[158px] bottom-0 left-0 w-full bg-gray-100 rounded-b-lg p-4"
        >
          <h3 class="text-2xl font-semibold text-neutral-700 font-['Poppins']">
            {{ product.title }}
          </h3>
          <p class="text-base text-zinc-500 font-medium font-['Poppins']">
            {{ product.description }}
          </p>
          <div class="flex items-center gap-4 mt-2">
            <span
              class="text-xl font-semibold text-neutral-700 font-['Poppins']"
            >
              $ {{ product.price }}
            </span>
            <span
              class="text-base font-normal text-zinc-400 font-['Poppins'] line-through"
            >
              $ {{ parseFloat(product.price) + 50 }}
            </span>
          </div>
        </div>
      </div>

      <!-- Black Overlay -->
      <div
        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition duration-300 pointer-events-none"
      ></div>

      <!-- Add to Cart Button -->
      <button
        @click="addToCart(product)"
        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition duration-300 bg-white text-yellow-600 py-3 px-12 rounded whitespace-nowrap text-lg font-semibold hover:cursor-pointer z-10"
      >
        Add to cart
      </button>

      <!-- Action Menu (Share, Compare, Like) -->
      <div
        class="absolute left-1/2 -translate-x-1/2 top-[calc(50%+60px)] flex gap-7 items-center text-base font-semibold text-white whitespace-nowrap opacity-0 group-hover:opacity-100 transition duration-300 z-10"
        aria-label="Action menu"
      >
        <!-- Share Button -->
        <button
          type="button"
          class="flex gap-0.5 justify-center items-center self-stretch my-auto hover:opacity-80 transition-opacity"
          aria-label="Share"
        >
          <icon
            class="pi pi-share-alt object-contain shrink-0 self-stretch my-auto w-4 aspect-square"
          ></icon>
          <span class="self-stretch my-auto">Share</span>
        </button>

        <!-- Compare Button -->
        <button
          type="button"
          class="flex gap-0.5 justify-center items-center self-stretch my-auto hover:opacity-80 transition-opacity"
          aria-label="Compare"
        >
          <icon
            class="pi pi-arrow-right-arrow-left object-contain shrink-0 self-stretch my-auto w-4 aspect-square"
          ></icon>
          <span class="self-stretch my-auto">Compare</span>
        </button>

        <!-- Like Button -->
        <button
          type="button"
          class="flex gap-0.5 justify-center items-center self-stretch my-auto hover:opacity-80 transition-opacity"
          aria-label="Like"
        >
          <icon
            class="pi pi-heart object-contain shrink-0 self-stretch my-auto w-4 aspect-square"
          ></icon>
          <span class="self-stretch my-auto">Like</span>
        </button>
      </div>
    </article>
  </div>
</template>
