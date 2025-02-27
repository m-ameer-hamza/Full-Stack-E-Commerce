<script setup>
import { useRouter } from "vue-router";

const router = useRouter();

function goToCart() {
  router.push("/cart");
}
</script>

<template>
  <div
    class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4"
  >
    <div class="bg-white shadow-lg rounded-lg p-8 text-center">
      <!-- Animated Icon using PrimeIcons -->
      <div class="flex justify-center">
        <i
          class="pi pi-times-circle text-red-500 text-6xl animate-shake"
          aria-hidden="true"
        ></i>
      </div>

      <!-- Failure Message -->
      <h2 class="text-2xl font-bold mt-4 text-gray-800">Payment Failed!</h2>
      <p class="text-gray-600 mt-2">
        Unfortunately, your payment could not be processed. Please try again.
      </p>

      <!-- Button -->
      <button
        class="mt-6 btn btn-secondary px-6 py-2 text-white rounded-md shadow hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary"
        @click="goToCart"
      >
        Try Again
      </button>
    </div>
  </div>
</template>
