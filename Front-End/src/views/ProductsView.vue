<script setup>
import { ref, computed, watchEffect } from "vue";
import { useQuery } from "@tanstack/vue-query";
import productsAPI from "../../apis/productsAPI.js";
import ProductCards from "../components/ProductsCard.vue";
import LoadingCards from "../components/LoadingCards.vue";
import Hero from "../components/Hero.vue";
import { RouterLink } from "vue-router";

const currentPage = ref(1);
const lastPage = ref(1);
const productCount = ref("12");
const productSort = ref("default");

const { getProducts } = productsAPI();

const { data: productResponse, isLoading } = useQuery({
  queryKey: ["Products", currentPage, productCount],
  queryFn: () => getProducts(currentPage.value, productCount.value),
  staleTime: 1000 * 60 * 5,
  cacheTime: 1000 * 60 * 30,
  refetchOnWindowFocus: false,
  retry: 1,
  keepPreviousData: true,
});

watchEffect(() => {
  if (productResponse.value && productResponse.value.last_page) {
    lastPage.value = productResponse.value.last_page;
  }
});

const sortedProducts = computed(() => {
  const unsortedProducts = productResponse.value
    ? productResponse.value.products
    : [];

  if (productSort.value === "ascending") {
    return [...unsortedProducts].sort(
      (a, b) => parseFloat(a.price) - parseFloat(b.price)
    );
  } else if (productSort.value === "descending") {
    return [...unsortedProducts].sort(
      (a, b) => parseFloat(b.price) - parseFloat(a.price)
    );
  }

  return unsortedProducts;
});

const products = sortedProducts;

function changePage(page) {
  currentPage.value = page;
}
</script>

<template>
  <main class="flex-grow mb-28">
    <!-- Filter Section -->
    <div class="flex flex-col bg-orange-50 text-black w-full">
      <div
        class="container mx-auto px-6 py-6 flex flex-col md:flex-row items-center justify-between relative"
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
            <div>Showing 1–{{ productCount }} of 32 results</div>
          </div>
        </div>

        <!-- Right Group: Show & Sort -->
        <div class="flex items-center gap-14 text-base">
          <label for="show-select" class="whitespace-nowrap">Show</label>
          <select
            v-model="productCount"
            id="show-select"
            class="w-28 h-10 px-3 py-2 text-black bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-100"
          >
            <option value="8">8</option>
            <option value="12">12</option>
            <option value="16">16</option>
          </select>
          <label for="sort-select" class="whitespace-nowrap pl-5"
            >Sort by Price</label
          >
          <select
            v-model="productSort"
            id="sort-select"
            class="w-40 h-10 px-3 py-2 text-black bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-100"
          >
            <option value="default">Default</option>
            <option value="ascending">Ascending</option>
            <option value="descending">Dscending</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Products -->
    <div class="max-w-[1520px] mx-auto relative top-4">
      <!-- Product Cards -->
      <div v-if="isLoading">
        <LoadingCards />
      </div>
      <div v-else>
        <ProductCards :products="products" />
      </div>

      <!-- Pagination Buttons Centered -->
      <div class="flex justify-center pt-16">
        <div
          class="flex gap-10 items-center text-xl text-black whitespace-nowrap"
        >
          <div
            v-for="page in lastPage"
            :key="page"
            class="flex flex-col rounded-xl w-[60px]"
          >
            <button
              @click="changePage(page)"
              :class="[
                'px-1.5 rounded-xl h-[60px] w-[60px] flex items-center justify-center cursor-pointer',
                page === currentPage ? 'bg-yellow-600' : 'bg-orange-50',
              ]"
              role="button"
              tabindex="0"
              :aria-label="'Step ' + page"
            >
              {{ page }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
