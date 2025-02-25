<script setup>
import NavBar from "./components/NavBar.vue";
import Hero from "./components/Hero.vue";
import Banner from "./components/Banner.vue";
import Footer from "./components/Footer.vue";
import CartModel from "./components/CartModel.vue";
import { ref, computed, watch } from "vue";
import { useRoute } from "vue-router";
import { RouterView } from "vue-router";

const heroTitle = ref("");
const route = useRoute();
const isCartVisible = ref(false);
const isHeroAndBannerVisible = computed(() => {
  const excludedPaths = ["/", "/login", "/register"];
  if (excludedPaths.includes(route.path)) {
    return false;
  }
  if (route.path.startsWith("/product/")) {
    return false;
  }
  return true;
});

watch(
  () => route.path,
  (newPath) => {
    if (newPath === "/products") {
      heroTitle.value = "All Products";
    }
  }
);

const toggleCart = () => {
  isCartVisible.value = !isCartVisible.value;
};
</script>

<template>
  <NavBar @cart-click="toggleCart" />
  <Hero v-if="isHeroAndBannerVisible" :heroTitle="heroTitle" />
  <RouterView />
  <Banner v-if="isHeroAndBannerVisible" />
  <CartModel v-if="isCartVisible" @cart-close="toggleCart" />
  <!-- <Footer /> -->
</template>
