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
  <tr v-for="item in cartStore.cart" :key="item.id" class="border-b">
    <!-- Product Column -->
    <td class="px-6 py-4 flex items-center">
      <img
        :src="`${BASE_URL}${item.imagePath}`"
        :alt="item.title"
        class="object-contain w-24 h-24 mr-4"
      />
      <span>{{ item.title }}</span>
    </td>
    <!-- Price Column -->
    <td class="px-6 py-4">$ {{ item.price }}</td>
    <!-- Quantity Column -->
    <td class="px-6 py-4">
      <div
        class="flex items-center justify-center w-32 h-12 divide-x divide-neutral-400 px-2 py-1 text-sm whitespace-nowrap bg-white rounded-md border border-neutral-400 mt-2"
        role="group"
        label="Quantity selector"
      >
        <button
          v-if="item.quantity === 1"
          @click="deleteItem(item.id)"
          class="w-1/3 flex items-center justify-center"
          label="Decrease quantity"
        >
          <i class="pi pi-trash text-xl"></i>
        </button>

        <button
          v-else
          @click="updateQuantity(item.id, item.quantity--)"
          class="w-1/3 flex items-center justify-center"
          label="Decrease quantity"
        >
          <i class="pi pi-minus text-xl"></i>
        </button>
        <span class="w-1/3 font-semibold text-2xl text-center">
          {{ item.quantity }}
        </span>
        <button
          @click="updateQuantity(item.id, item.quantity++)"
          class="w-1/3 flex items-center justify-center"
          label="Increase quantity"
        >
          <i class="pi pi-plus text-xl"></i>
        </button>
      </div>
    </td>
    <!-- Subtotal Column -->
    <td class="px-6 py-4">${{ (item.price * item.quantity).toFixed(2) }}</td>
    <!-- Remove Column -->
    <td class="px-6 py-4">
      <i
        class="pi pi-trash text-2xl pl-5 text-yellow-700 hover:text-yellow-800 hover:cursor-pointer ease-in-out duration-200"
        @click="deleteItem(item.id)"
      ></i>
    </td>
  </tr>
</template>
