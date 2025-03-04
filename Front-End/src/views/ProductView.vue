<script setup>
import TrackBar from "../components/TrackBar.vue";
import Banner from "../components/Banner.vue";
import Footer from "../components/Footer.vue";
import { useQuery } from "@tanstack/vue-query";
import { useRoute } from "vue-router";
import { ref } from "vue";
import productsAPI from "../../apis/productsAPI.js";
import { useCartStore } from "@/stores/cartStore";
import { useToast } from "vue-toastification";

const BASE_URL = import.meta.env.VITE_BASE_URL;
const route = useRoute();
const cartStore = useCartStore();
const toast = useToast();
const { getProduct } = productsAPI();
const productId = ref(route.params.id);
const quantity = ref(1);

const { data: product, isLoading } = useQuery({
  queryKey: ["Product", productId],
  queryFn: () => getProduct(productId.value),
  staleTime: 1000 * 60 * 5,
  cacheTime: 1000 * 60 * 30,
  refetchOnWindowFocus: false,
  retry: 1,
  keepPreviousData: true,
  select: (data) => data.product,
});

//cart handling
const addToCart = (product) => {
  cartStore.addMultipleQuantaties(product, quantity.value);
  toast.success("Product Added to Cart");
};
</script>
<template>
  <main>
    <TrackBar :title="product.title" />
    <!-- Product Deatails -->
    <section class="max-w-[1600px] mx-auto relative top-8 mb-20">
      <div class="bg-white pt-9 pb-14 px-5 md:px-0">
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Small Images Column -->
          <div class="flex flex-col gap-6">
            <img
              v-for="index in 3"
              :key="index"
              :src="`${BASE_URL}${product.imagePath}`"
              :alt="'Product image ' + index"
              class="object-fit w-[100px] h-[100px] rounded-lg"
            />
          </div>

          <!-- Main Content Container (Main Image & Text) -->
          <div class="flex flex-col md:flex-row gap-28 flex-1">
            <!-- Main Image Column -->
            <div
              class="w-full md:w-6/12 h-[600px] flex items-center justify-center"
            >
              <img
                loading="lazy"
                :src="`${BASE_URL}${product.imagePath}`"
                alt="Asgaard sofa product image"
                class="object-cover w-full h-full rounded-2xl md:mt-0 mt-10"
              />
            </div>
            <!-- Text Column -->
            <div
              class="w-full md:w-6/12 h-[600px] flex flex-col justify-center"
            >
              <div class="flex flex-col gap-3">
                <h1 class="text-5xl text-black">{{ product.title }}</h1>
                <p class="text-2xl font-medium text-black">
                  $ {{ product.price }}
                </p>
                <div class="flex gap-5 items-center text-sm text-black">
                  <img
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/35cb519968837ecbbf7790f3c128da597ab6c33dd10c0353875022f7f2dc3781?apiKey=52cb9a1f112445149b6b31ac05588017&"
                    alt="Product rating stars"
                    class="object-contain w-[124px] aspect-[6.21]"
                  />
                  <div
                    class="w-px border border-solid border-neutral-400 h-[30px]"
                    aria-hidden="true"
                  ></div>
                  <p>5 Customer Review</p>
                </div>
                <p class="mt-3.5 text-sm text-black pr-60">
                  {{ product.description }}
                </p>
                <p class="mt-8 text-sm text-black">Size</p>
                <div class="flex gap-4 mt-3 text-sm text-black">
                  <button
                    class="px-3 text-black bg-yellow-600 rounded-md h-[30px] w-[30px]"
                    aria-label="Select Large size"
                  >
                    L
                  </button>
                  <button
                    class="px-2 bg-orange-50 rounded-md h-[30px] w-[30px]"
                    aria-label="Select Extra Large size"
                  >
                    XL
                  </button>
                  <button
                    class="px-2 bg-orange-50 rounded-md h-[30px] w-[30px]"
                    aria-label="Select Extra Small size"
                  >
                    XS
                  </button>
                </div>
                <p class="mt-5 text-sm text-black">Color</p>
                <div class="flex gap-4 mt-3">
                  <button
                    class="bg-violet-500 h-[30px] rounded-full w-[30px]"
                    aria-label="Select Purple color"
                  ></button>
                  <button
                    class="bg-black h-[30px] rounded-full w-[30px]"
                    aria-label="Select Black color"
                  ></button>
                  <button
                    class="bg-yellow-600 h-[30px] rounded-full w-[30px]"
                    aria-label="Select Yellow color"
                  ></button>
                </div>
                <div class="flex flex-wrap gap-10 mt-8 text-black">
                  <div
                    class="flex gap-9 px-3 py-3 text-base whitespace-nowrap bg-white rounded-xl border border-neutral-400"
                    role="group"
                    aria-label="Quantity selector"
                  >
                    <button
                      @click="quantity > 1 ? quantity-- : null"
                      class="text-3xl font-semibold"
                      aria-label="Decrease quantity"
                    >
                      -
                    </button>
                    <span class="text-3xl font-semibold" aria-live="polite">{{
                      quantity
                    }}</span>
                    <button
                      @click="quantity++"
                      class="text-2xl font-semibold"
                      aria-label="Increase quantity"
                    >
                      +
                    </button>
                  </div>
                  <button
                    @click="addToCart(product)"
                    class="px-12 py-4 text-xl rounded-2xl border border-black hover:bg-yellow-600 transition duration-300 ease-in-out hover:text-white max-md:px-5"
                  >
                    Add To Cart
                  </button>
                  <button
                    class="flex flex-col justify-center px-12 py-4 rounded-2xl border border-black max-md:px-5"
                  >
                    <div class="flex gap-2.5 items-center justify-center">
                      <span class="text-2xl">+</span>
                      <span class="text-xl">Compare</span>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Add a section for related products here -->
    <Banner />
  </main>
</template>
