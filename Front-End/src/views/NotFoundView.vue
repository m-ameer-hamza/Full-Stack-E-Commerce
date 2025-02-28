<script setup>
import { RouterLink } from "vue-router";
</script>

<template>
  <section
    class="flex flex-col justify-center items-center min-h-screen text-center"
  >
    <i class="pi pi-exclamation-triangle text-orange-300 text-7xl mb-5"></i>
    <h1 class="text-6xl font-bold mb-4">404 Not Found</h1>
    <p class="text-xl mb-5">This page does not exist</p>
    <RouterLink
      to="/"
      class="bg-yellow-600 border hover:bg-yellow-700 border-yellow-600 text-white text-lg font-bold uppercase rounded-md px-8 py-4 mt-4"
    >
      Go Home
    </RouterLink>
  </section>
</template>
