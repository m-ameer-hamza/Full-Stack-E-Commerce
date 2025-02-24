<script setup>
import Category from "../components/CategoryCard.vue";
import ProductCards from "../components/ProductsCard.vue";
import LoadingCards from "../components/LoadingCards.vue";
import productsAPI from "../../apis/productsAPI";
import { useQuery } from "@tanstack/vue-query";

const { getFeaturedProducts } = productsAPI();

const IMAGE_URL = import.meta.env.VITE_IMAGE_URL;

const { data: products, isLoading } = useQuery({
  queryKey: ["featuredProducts"],
  queryFn: getFeaturedProducts,
  staleTime: 1000 * 60 * 5, // 5 minutes before data becomes stale
  cacheTime: 1000 * 60 * 30, // 30 minutes cache retention
  refetchOnWindowFocus: false, // Disable automatic refetch on window focus
  retry: 1, // Only retry once on failure
  keepPreviousData: true, // Maintain previous data during refetches
  select: (data) => data.products, // Optional: transform data if needed
});

// console.log(products.value[0]);
</script>
<template>
  <main class="flex-grow mb-[200px]">
    <!-- Image with overlay card -->
    <section class="relative h-[617px] w-full">
      <img
        loading="lazy"
        src="/Hero.png"
        alt="Background"
        class="absolute inset-0 w-full h-full object-cover"
      />
      <article
        class="absolute right-8 top-1/2 transform -translate-y-1/2 w-[470px] h-[331px] bg-yellow-50 rounded-lg p-4 shadow-lg flex flex-col justify-between"
      >
        <p class="text-zinc-800 text-lg font-semibold tracking-widest">
          New Arrival
        </p>
        <h2
          class="text-yellow-600 text-4xl font-bold font-poppins leading-tight"
        >
          Discover Our New Collection
        </h2>
        <p class="text-zinc-800 text-md font-medium leading-snug">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
        <button
          class="mt-2 hover:bg-yellow-700 hover:cursor-pointer self-start px-16 py-4 bg-yellow-600 border border-yellow-600 text-white text-lg font-bold uppercase rounded"
        >
          BUY NOW
        </button>
      </article>
    </section>

    <!------------------ Category Section ----------- -->
    <section>
      <div class="w-96 h-20 top-[80px] mx-auto relative">
        <h2
          class="absolute left-[85px] top-0 text-zinc-800 text-3xl font-bold font-['Poppins']"
        >
          Browse The Range
        </h2>
        <p
          class="w-96 h-7 top-[48px] relative mx-auto text-center text-stone-500 text-xl font-normal font-['Poppins'] whitespace-nowrap overflow-hidden"
        >
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
      </div>

      <!-- Slider Container -->

      <div class="my-10 relative top-40 w-[95%] mx-auto">
        <Category />
      </div>
    </section>

    <!-------------- Products Section ---------->
    <section class="relative">
      <header class="text-center relative top-[415px] mx-auto w-96 h-20">
        <h2
          class="text-neutral-700 text-4xl font-bold font-['Poppins'] leading-10"
        >
          Our Products
        </h2>
      </header>

      <div
        class="flex flex-wrap justify-center gap-x-32 gap-y-12 relative top-[450px]"
      >
        <!-- Product Card -->
        <div class="product-cards-container">
          <!-- Loading State: Display three loading cards -->
          <div v-if="isLoading" class="cards-grid">
            <LoadingCards />
          </div>

          <!-- Data Loaded: Loop through products and display product card -->
          <div v-else class="cards-grid">
            <ProductCards :products="products" />
          </div>
        </div>
      </div>
      <!-- Show More button -->
      <button
        class="top-[500px] relative px-24 py-3 mx-auto group flex items-center justify-center cursor-pointer bg-gradient-to-r from-yellow-500 to-yellow-600 border border-transparent transition-all duration-300 text-white text-2xl font-semibold font-['Poppins'] rounded-lg shadow-md hover:from-yellow-600 hover:to-yellow-500 hover:shadow-lg transform hover:scale-105"
      >
        Show More
      </button>
    </section>
  </main>
</template>

<style scoped>
.swiper {
  padding-bottom: 3rem;
}

.product-cards-container {
  padding: 2rem;
  display: flex;
  justify-content: center;
}

.cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  width: 100%;
  max-width: 1200px;
}
</style>
