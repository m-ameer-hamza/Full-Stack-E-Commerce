<script setup>
import NavBar from "./components/NavBar.vue";
import Hero from "./components/Hero.vue";
import Banner from "./components/Banner.vue";
import Footer from "./components/Footer.vue";
import { ref, computed, watch } from "vue";
import { useRoute } from "vue-router";
import { RouterView } from "vue-router";

const heroTitle = ref("");
const route = useRoute();

const isHeroAndBannerVisible = computed(() => {
  const excludedPaths = ["/", "/login", "/register"];
  return excludedPaths.includes(route.path) ? false : true;
});

watch(
  () => route.path,
  (newPath) => {
    if (newPath === "/products") {
      heroTitle.value = "All Products";
    }
  }
);
</script>

<template>
  <NavBar />
  <Hero v-if="isHeroAndBannerVisible" :heroTitle="heroTitle" />
  <RouterView />
  <Banner v-if="isHeroAndBannerVisible" />
  <!-- <Footer /> -->
</template>
