<script setup></script>

<template>
  <div
    v-for="n in 3"
    :key="n"
    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 ease text-center p-4 flex justify-center items-center h-[200px]"
  >
    <i class="pi pi-spin pi-spinner text-[2rem] text-[#3498db]"></i>
  </div>
</template>
