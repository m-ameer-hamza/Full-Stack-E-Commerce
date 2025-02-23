<script setup>
import Category from "../components/CategoryCard.vue";
import productsAPI from "../../apis/productsAPI";

const { getFeaturedProducts } = productsAPI();
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
        <article class="w-72 relative group cursor-pointer">
          <figure>
            <img
              class="w-full h-72 object-cover rounded-t-lg"
              src="./product.png"
              alt="Syltherine – Stylish cafe chair"
            />
          </figure>
          <div
            class="absolute bottom-0 left-0 w-full bg-gray-100 rounded-b-lg p-4"
          >
            <h3
              class="text-2xl font-semibold text-neutral-700 font-['Poppins']"
            >
              Syltherine
            </h3>
            <p class="text-base text-zinc-500 font-medium font-['Poppins']">
              Stylish cafe chair
            </p>
            <div class="flex items-center gap-4 mt-2">
              <span
                class="text-xl font-semibold text-neutral-700 font-['Poppins']"
              >
                Rp 2.500.000
              </span>
              <span
                class="text-base font-normal text-zinc-400 font-['Poppins'] line-through"
              >
                Rp 3.500.000
              </span>
            </div>
          </div>
          <div
            class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition duration-300 pointer-events-none"
          ></div>
          <button
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition duration-300 bg-white text-yellow-600 py-3 px-12 rounded whitespace-nowrap text-lg font-semibold hover:cursor-pointer"
          >
            Add to cart
          </button>
        </article>
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
</style>
