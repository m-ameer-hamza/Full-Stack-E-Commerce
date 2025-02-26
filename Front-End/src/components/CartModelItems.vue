<script setup>
import { useCartStore } from "@/stores/cartStore";
const cartStore = useCartStore();
const BASE_URL = import.meta.env.VITE_BASE_URL;

const updateQuantity = (id, quantity) => {
  cartStore.updateQuantity(id, quantity);
};
const deleteItem = (id) => {
  cartStore.deleteItem(id);
};
</script>
<template>
  <div
    v-for="item in cartStore.cart"
    :key="item.id"
    class="relative flex gap-5 w-[410px] self-stretch mt-11 max-md:mt-10"
  >
    <!-- Left: Product Image -->
    <div>
      <img
        :src="`${BASE_URL}${item.imagePath}`"
        :alt="item.title"
        class="object-contain rounded-none aspect-[1.03] w-[108px]"
      />
    </div>

    <!-- Right: Product details (with reserved right padding) -->
    <div class="my-auto text-black relative pr-16">
      <div class="flex gap-5 justify-between items-start">
        <div class="flex flex-col">
          <div class="flex flex-row">
            <p class="self-start text-lg font-medium truncate">
              {{ item.title }}
            </p>
          </div>
          <div class="flex gap-4 items-center mt-2 text-xs font-light">
            <span class="self-stretch text-base">{{ item.quantity }}</span>
            <span class="self-stretch my-auto">X</span>
            <span
              class="self-stretch my-auto text-lg font-medium text-yellow-600"
            >
              $ {{ item.price }}
            </span>
          </div>
          <!-- Quantity Controller -->
          <div
            class="flex items-center justify-center w-28 h-9 divide-x divide-neutral-400 px-2 py-1 text-sm whitespace-nowrap bg-white rounded-md border border-neutral-400 mt-2"
            role="group"
            label="Quantity selector"
          >
            <button
              v-if="item.quantity === 1"
              @click="deleteItem(item.id)"
              class="w-1/3 flex items-center justify-center"
              label="Decrease quantity"
            >
              <i class="pi pi-trash"></i>
            </button>

            <button
              v-if="item.quantity > 1"
              @click="updateQuantity(item.id, item.quantity--)"
              class="w-1/3 flex items-center justify-center"
              label="Decrease quantity"
            >
              <i class="pi pi-minus"></i>
            </button>
            <span class="w-1/3 font-semibold text-lg text-center">
              {{ item.quantity }}
            </span>
            <button
              @click="updateQuantity(item.id, item.quantity++)"
              class="w-1/3 flex items-center justify-center"
              label="Increase quantity"
            >
              <i class="pi pi-plus"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Remove Button (absolutely positioned relative to the item's container) -->
    <div class="absolute right-0">
      <button
        @click="deleteItem(item.id)"
        class="flex items-center justify-center"
        aria-label="Remove item"
      >
        <i
          class="text-white pi pi-times-circle text-2xl bg-gray-500 hover:bg-red-600 rounded-full mt-2"
        ></i>
      </button>
    </div>
  </div>
</template>
