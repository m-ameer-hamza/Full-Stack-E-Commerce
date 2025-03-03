<script setup>
import NavBar from "./components/NavBar.vue";
import Hero from "./components/Hero.vue";
import Banner from "./components/Banner.vue";
import Footer from "./components/Footer.vue";
import CartModel from "./components/CartModel.vue";
import { ref, computed, watchEffect } from "vue";
import { useRoute } from "vue-router";
import { RouterView } from "vue-router";

const heroTitle = ref("");
const route = useRoute();
const isCartVisible = ref(false);

const hideLayout = computed(() => route.meta.hideLayout === true);

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

watchEffect(() => {
  if (route.path === "/products") {
    heroTitle.value = "All Products";
  } else if (route.path === "/cart") {
    heroTitle.value = "Cart";
  }
});

const toggleCart = () => {
  isCartVisible.value = !isCartVisible.value;
};
</script>

<template>
  <NavBar v-if="!hideLayout" @cart-click="toggleCart" />
  <Hero v-if="!hideLayout && isHeroAndBannerVisible" :heroTitle="heroTitle" />
  <RouterView />
  <Banner v-if="!hideLayout && isHeroAndBannerVisible" />
  <CartModel v-if="!hideLayout && isCartVisible" @cart-close="toggleCart" />
  <Footer v-if="!hideLayout" />
</template>
