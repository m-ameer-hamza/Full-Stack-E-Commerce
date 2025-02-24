<script setup>
import { ref, computed, watchEffect } from "vue";
import { useQuery } from "@tanstack/vue-query";
import productsAPI from "../../apis/productsAPI.js";
import ProductCards from "../components/ProductsCard.vue";
import LoadingCards from "../components/LoadingCards.vue";
import { RouterLink } from "vue-router";

// Pagination state
const currPage = ref(1);
const lastPage = ref(1);

const { getProducts } = productsAPI();

// Fetch products (full response including pagination metadata)
const { data: productResponse, isLoading } = useQuery({
  queryKey: ["featuredProducts", currPage],
  queryFn: () => getProducts(currPage.value),
  staleTime: 1000 * 60 * 5,
  cacheTime: 1000 * 60 * 30,
  refetchOnWindowFocus: false,
  retry: 1,
  keepPreviousData: true,
});

// Use watchEffect to update lastPage when productResponse changes
watchEffect(() => {
  if (productResponse.value && productResponse.value.last_page) {
    lastPage.value = productResponse.value.last_page;
  }
});

// Extract products array for display (assumes API returns { products: [...] })
const products = computed(() =>
  productResponse.value ? productResponse.value.products : []
);

// Change page function
function changePage(page) {
  currPage.value = page;
}
</script>
<template>
  <main class="flex-grow mb-[200px]">
    <!-- Image -->
    <div class="flex flex-col text-black whitespace-nowrap">
      <div
        class="flex relative flex-col justify-center items-center px-20 py-28 w-full max-h-[316px] max-md:px-5 max-md:pt-24 max-md:max-w-full"
      >
        <img
          loading="lazy"
          src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/c1417dfcec7f1bf1329ae57d0515540ef039ead7e9b42ffb8f842be66dfc16c7?apiKey=52cb9a1f112445149b6b31ac05588017&"
          class="object-cover absolute inset-0 size-full"
          alt=""
        />
        <!-- Text and Navigation -->
        <div class="flex flex-col relative text-black whitespace-nowrap">
          <div
            class="relative w-full min-h-[316px] px-20 py-28 max-md:px-5 max-md:pt-24 max-md:max-w-full"
          >
            <div
              class="absolute inset-0 flex flex-col items-center justify-center max-w-full w-[124px]"
            >
              <h1 class="text-5xl font-medium max-md:text-4xl">All Products</h1>
              <nav aria-label="Breadcrumb" class="relative mt-8">
                <ol class="flex gap-1.5 text-base">
                  <li class="grow font-medium">
                    <RouterLink
                      to="/"
                      class="text-xl font-semibold hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                      >Home</RouterLink
                    >
                  </li>
                  <li aria-hidden="true">
                    <icon class="pi pi-angle-right text-2xl relative top-1">
                    </icon>
                  </li>
                  <li class="font-light" aria-current="page">Products</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="flex flex-col bg-orange-50 text-black w-full">
      <!-- Main Controls Container -->
      <div
        class="flex flex-col md:flex-row items-center justify-between py-6 max-w-screen-xl mx-auto gap-96 relative"
      >
        <!-- Left Group: Filter & Category -->
        <div class="flex items-center gap-6">
          <!-- Filter Control with Dropdown -->
          <div class="relative">
            <div
              class="flex items-center gap-2 text-xl cursor-pointer whitespace-nowrap"
              @click="toggleFilter"
            >
              <i class="pi pi-filter text-xl"></i>
              <span>Filter</span>
            </div>
            <transition
              enter-active-class="transition ease-out duration-200"
              enter-from-class="opacity-0 transform -translate-y-2"
              enter-to-class="opacity-100 transform translate-y-0"
              leave-active-class="transition ease-in duration-150"
              leave-from-class="opacity-100 transform translate-y-0"
              leave-to-class="opacity-0 transform -translate-y-2"
            >
              <div
                v-if="showFilterDropdown"
                class="absolute left-0 top-full mt-10 w-64 bg-white shadow-lg rounded-lg z-10"
              >
                <ul class="py-2">
                  <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                    Filter Option 1
                  </li>
                  <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                    Filter Option 2
                  </li>
                  <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                    Filter Option 3
                  </li>
                </ul>
              </div>
            </transition>
          </div>

          <!-- Category Control with Dropdown -->
          <div class="flex items-center gap-4 text-base">
            <div class="relative">
              <div
                class="flex items-center cursor-pointer"
                @click="toggleCategory"
              >
                <i class="pi pi-list text-xl"></i>
              </div>
              <transition
                enter-active-class="transition ease-out duration-200"
                enter-from-class="opacity-0 transform -translate-y-2"
                enter-to-class="opacity-100 transform translate-y-0"
                leave-active-class="transition ease-in duration-150"
                leave-from-class="opacity-100 transform translate-y-0"
                leave-to-class="opacity-0 transform -translate-y-2"
              >
                <div
                  v-if="showCategoryDropdown"
                  class="absolute left-0 top-full mt-10 w-64 bg-white shadow-lg rounded-lg z-10"
                >
                  <ul class="py-2">
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                      Category 1
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                      Category 2
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                      Category 3
                    </li>
                  </ul>
                </div>
              </transition>
            </div>
            <div class="w-px bg-neutral-400 h-[37px]"></div>
            <div>Showing 1–16 of 32 results</div>
          </div>
        </div>

        <!-- Right Group: Show & Sort -->
        <div class="flex items-center gap-10 text-xl">
          <label for="show-select" class="whitespace-nowrap">Show</label>
          <select
            id="show-select"
            class="px-5 text-black whitespace-nowrap bg-white h-[55px] w-[55px] border border-gray-300 rounded"
          >
            <option>16</option>
          </select>
          <label for="sort-select" class="whitespace-nowrap">Sort by</label>
          <select
            id="sort-select"
            class="px-8 py-3.5 text-black whitespace-nowrap bg-white border border-gray-300 rounded"
          >
            <option>Default</option>
          </select>
        </div>
      </div>
    </div>
    <!-- Products -->
    <div
      class="flex flex-wrap max-w-screen-xl mx-auto justify-center gap-x-32 gap-y-12 relative top-10"
    >
      <!-- Product Card -->
      <div class="p-8 flex justify-center">
        <div
          v-if="isLoading"
          class="grid grid-cols-[repeat(3,minmax(400px,1fr))] gap-24 w-full max-w-[1200px]"
        >
          <LoadingCards />
        </div>
        <div
          v-else
          class="grid grid-cols-[repeat(3,minmax(400px,1fr))] gap-24 w-full max-w-[1200px]"
        >
          <ProductCards :products="products" />
        </div>
      </div>
      <!-- Pagination Buttons -->
      <div
        class="flex gap-10 items-start pt-8 text-xl text-black whitespace-nowrap"
      >
        <div
          v-for="page in lastPage"
          :key="page"
          class="flex flex-col rounded-xl w-[60px]"
        >
          <div
            @click="changePage(page)"
            :class="[
              'px-1.5 rounded-xl h-[60px] w-[60px] flex items-center justify-center cursor-pointer',
              page === currPage ? 'bg-yellow-600' : 'bg-orange-50',
            ]"
            role="button"
            tabindex="0"
            :aria-label="'Step ' + page"
          >
            {{ page }}
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
