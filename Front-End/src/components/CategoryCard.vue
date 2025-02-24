<script setup>
const categories = [
  { name: "Dining", image: "/category.png" },
  { name: "Living", image: "/category2.png" },
  { name: "Bedroom", image: "/category3.png" },
];
</script>

<template>
  <div class="flex justify-center space-x-5">
    <figure
      v-for="(category, index) in categories"
      :key="index"
      class="w-[400px]"
    >
      <!-- Image Container -->
      <div
        class="relative bg-neutral-900 rounded-lg overflow-hidden w-[400px] h-[400px]"
      >
        <img
          class="absolute inset-0 object-cover w-full h-full bg-gray-100"
          :src="category.image"
          :alt="category.name"
        />
      </div>
      <!-- Caption outside the overflow-hidden container -->
      <figcaption class="mt-2 text-center text-lg font-semibold text-black">
        {{ category.name }}
      </figcaption>
    </figure>
  </div>
</template>
