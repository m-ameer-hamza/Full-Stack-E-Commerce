<script setup>
const { products } = defineProps({
  products: {
    type: Array,
    required: true,
  },
});
const BASE_URL = import.meta.env.VITE_BASE_URL;
</script>

<template>
  <div
    v-for="(product, index) in products"
    :key="index"
    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 ease hover:-translate-y-1 text-center p-4 flex flex-col justify-between"
  >
    <div class="w-[363px] h-[435px] overflow-hidden rounded">
      <img
        loading="lazy"
        :src="`${BASE_URL}${product.imagePath}`"
        :alt="product.title"
        class="w-[97%] h-[97%] object-cover"
      />
    </div>
    <div class="mt-4 flex-1">
      <h3 class="text-[1.2rem] font-bold my-2">{{ product.title }}</h3>
      <p class="text-[0.9rem] text-[#666] mb-2">{{ product.description }}</p>
    </div>
    <div class="flex items-center justify-between mt-4">
      <div class="flex items-center gap-2 text-base text-[#27ae60]">
        <i class="pi pi-tag"></i>
        <span>${{ product.price }}</span>
      </div>
      <button
        type="button"
        class="bg-gradient-to-r from-[#f39c12] to-[#e67e22] text-white py-2 px-4 rounded-full flex items-center gap-2 cursor-pointer transition-all duration-300 ease-in-out shadow-md text-base hover:scale-105 hover:bg-gradient-to-r hover:from-[#e67e22] hover:to-[#d35400]"
      >
        <i class="pi pi-shopping-cart"></i>
        <span>Add to Cart</span>
      </button>
    </div>
  </div>
</template>
