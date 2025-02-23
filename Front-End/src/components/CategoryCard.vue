<script setup>
import electrical from "../assets/img/electronicCat.png";
import clothing from "../assets/img/clothCat.png";
import furniture from "../assets/img/furniture.png";
import grocery from "../assets/img/groceryCat.png";
import mobile from "../assets/img/mobileCat.png";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

import SwiperCore from "swiper";
import { Navigation, Pagination } from "swiper/modules";
SwiperCore.use([Navigation, Pagination]);
const cards = [
  {
    image: electrical,
    caption: "Electrical",
  },
  {
    image: grocery,
    caption: "Grocery",
  },
  {
    image: mobile,
    caption: "Mobiles & Accessories",
  },
  {
    image: clothing,
    caption: "Clothing",
  },
  {
    image: furniture,
    caption: "Furniture",
  },
  {
    image: mobile,
    caption: "Mobiles & Accessories",
  },
];
</script>

<template>
  <Swiper
    :slides-per-view="3"
    :space-between="32"
    :slides-offset-before="94"
    :slides-offset-after="64"
    :loop="false"
    navigation
    pagination
    class="swiper w-full"
  >
    <SwiperSlide
      v-for="(card, index) in cards"
      :key="index"
      class="flex justify-center"
    >
      <figure
        class="w-72 h-72 relative hover:cursor-pointer rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:scale-105"
      >
        <img
          loading="lazy"
          class="w-full h-full object-cover"
          :src="card.image"
          :alt="card.caption + ' Category'"
        />
        <figcaption
          class="pointer-events-none absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-2 text-lg font-semibold"
        >
          {{ card.caption }}
        </figcaption>
      </figure>
    </SwiperSlide>
  </Swiper>
</template>
