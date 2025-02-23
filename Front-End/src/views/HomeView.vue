<script setup>
import Category from "../components/CategoryCard.vue";
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
  select: (data) => data, // Optional: transform data if needed
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
            <div v-for="n in 3" :key="n" class="card loading-card">
              <i class="pi pi-spin pi-spinner loading-icon"></i>
            </div>
          </div>

          <!-- Data Loaded: Loop through products and display product card -->
          <div v-else class="cards-grid">
            <div
              v-for="(product, index) in products?.products"
              :key="index"
              class="card product-card"
            >
              <img
                loading="lazy"
                :src="`${IMAGE_URL}/products/${product.image}.png`"
                :alt="product.title"
              />
              <div class="card-content">
                <h3 class="card-title">{{ product.title }}</h3>
                <p class="card-description">{{ product.description }}</p>
                <div class="card-price">
                  <i class="pi pi-tag"></i>
                  <span>${{ product.price }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Additional product cards can be added as similar <article> elements -->
      </div>
      <!-- Show More button -->
      <button
        type="button"
        class="w-74 h-14 relative top-[535px] mx-auto group flex items-center justify-center cursor-pointer bg-white border border-yellow-600 transition duration-300 text-yellow-600 text-lg font-semibold font-['Poppins'] leading-normal whitespace-nowrap hover:bg-yellow-600 hover:border-yellow-600 hover:text-white"
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

.card {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease;
  text-align: center;
  padding: 1rem;
}

.card:hover {
  transform: translateY(-5px);
}

/* Loading Card Styles */
.loading-card {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
}

.loading-icon {
  font-size: 2rem;
  color: #3498db;
}

/* Product Card Styles */
.card-image {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 4px;
}

.card-content {
  margin-top: 1rem;
}

.card-title {
  font-size: 1.2rem;
  font-weight: bold;
  margin: 0.5rem 0;
}

.card-description {
  font-size: 0.9rem;
  color: #666;
  margin-bottom: 0.5rem;
}

.card-price {
  font-size: 1rem;
  color: #27ae60;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}
</style>
