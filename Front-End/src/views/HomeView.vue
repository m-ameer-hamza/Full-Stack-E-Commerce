<script setup>
import Category from "../components/CategoryCard.vue";
import ProductCards from "../components/ProductsCard.vue";
import LoadingCards from "../components/LoadingCards.vue";
import productsAPI from "../../apis/productsAPI";
import { useQuery } from "@tanstack/vue-query";

const { getFeaturedProducts } = productsAPI();
const { data: products, isLoading } = useQuery({
  queryKey: ["featuredProducts"],
  queryFn: getFeaturedProducts,
  staleTime: 1000 * 60 * 5,
  cacheTime: 1000 * 60 * 30,
  refetchOnWindowFocus: false,
  retry: 1,
  keepPreviousData: true,
  select: (data) => data.products,
});
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
      <div class="w-96 h-20 top-[58px] mx-auto relative">
        <div
          class="left-[94px] top-0 absolute text-zinc-800 text-3xl font-bold font-['Poppins']"
        >
          Browse The Range
        </div>
        <div
          class="w-96 h-7 top-[48px] relative mx-auto text-center text-stone-500 text-xl font-normal font-['Poppins'] whitespace-nowrap overflow-hidden"
        >
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
      </div>

      <!-- Category Cards -->
      <div class="relative top-28">
        <Category />
      </div>
    </section>

    <!-------------- Products Section ---------->
    <section class="relative top-44">
      <header class="text-center relative mx-auto w-96 h-20">
        <h2
          class="text-neutral-700 text-4xl font-bold font-['Poppins'] leading-10"
        >
          Our Products
        </h2>
      </header>

      <!-- Products Cards -->
      <div class="max-w-[1260px] mx-auto relative top-4">
        <!-- Product Card -->
        <ProductCards :products="products" />
      </div>

      <!-- Show More button -->
      <!-- <button
        class="top-[500px] relative px-24 py-3 mx-auto group flex items-center justify-center cursor-pointer bg-gradient-to-r from-yellow-500 to-yellow-600 border border-transparent transition-all duration-300 text-white text-2xl font-semibold font-['Poppins'] rounded-lg shadow-md hover:from-yellow-600 hover:to-yellow-500 hover:shadow-lg transform hover:scale-105"
      >
        Show More
      </button> -->
    </section>
  </main>
</template>
