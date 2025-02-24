<script setup>
import { computed } from "vue";
import { RouterLink, useRoute, useRouter } from "vue-router";

const router = useRouter();
const route = useRoute();

const btnText = computed(() =>
  route.path === "/login" ? "Register" : "Login"
);
const icon = computed(() =>
  route.path === "/login" ? "pi pi-user-plus" : "pi pi-user"
);

const goToLogin = () => {
  route.path === "/login" ? router.push("register") : router.push("login");
};
</script>

<template>
  <header class="sticky top-0 z-50 bg-gray-50 shadow-md">
    <div
      class="container mx-auto px-6 py-4 flex flex-col md:flex-row items-center justify-between"
    >
      <!-- Logo -->
      <div class="mb-4 md:mb-0">
        <button
          @click="router.push('/')"
          class="text-3xl md:text-4xl font-bold text-black hover:cursor-pointer"
        >
          EcomNest
        </button>
      </div>

      <!-- Navigation -->
      <nav class="mb-4 md:mb-0">
        <ul class="flex space-x-12">
          <li>
            <RouterLink
              to="/"
              class="text-lg text-gray-800 hover:text-orange-500 transition-colors"
            >
              Home
            </RouterLink>
          </li>
          <li>
            <RouterLink
              to="/products"
              class="text-lg text-gray-800 hover:text-orange-500 transition-colors"
            >
              All Products
            </RouterLink>
          </li>
          <li>
            <RouterLink
              to="/about"
              class="text-lg text-gray-800 hover:text-orange-500 transition-colors"
            >
              About
            </RouterLink>
          </li>
          <li>
            <RouterLink
              to="/contact"
              class="text-lg text-gray-800 hover:text-orange-500 transition-colors"
            >
              Contact
            </RouterLink>
          </li>
        </ul>
      </nav>

      <!-- Icons Section -->
      <div class="flex items-center space-x-12">
        <!-- Cart Icon with Badge -->
        <div class="relative group-hover:cursor-pointer">
          <i class="pi pi-shopping-cart text-2xl text-gray-800"></i>
          <span
            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full"
          >
            3
          </span>
        </div>
        <!-- Login Button -->
        <button
          @click="goToLogin"
          class="flex items-center gap-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full transition duration-300 shadow-lg"
        >
          <i :class="`${icon} text-white text-lg`"></i>
          <span>{{ btnText }}</span>
        </button>
      </div>
    </div>
  </header>
</template>
