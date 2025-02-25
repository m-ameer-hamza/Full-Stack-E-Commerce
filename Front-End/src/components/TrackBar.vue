<script setup>
import { RouterLink } from "vue-router";
defineProps({
  title: {
    type: String,
    default: "Asgaard sofa",
  },
});
</script>
<template>
  <div
    class="flex flex-col mt-[107px] text-base text-black"
    aria-label="Breadcrumb"
  >
    <div
      class="flex gap-8 items-center px-[200px] py-8 bg-orange-50 max-md:px-5"
    >
      <RouterLink to="/" class="self-stretch my-auto hover:underline"
        >Home</RouterLink
      >
      <i
        class="pi pi-chevron-right object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
      ></i>
      <RouterLink to="/products" class="self-stretch my-auto hover:underline"
        >Products</RouterLink
      >
      <i
        class="pi pi-chevron-right object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
      ></i>
      <div
        class="shrink-0 self-start w-0.5 border-2 border-solid border-neutral-400 h-[37px]"
        aria-hidden="true"
      ></div>
      <div
        class="grow shrink self-stretch my-auto text-black w-[1014px] max-md:max-w-full"
        aria-current="page"
      >
        {{ title }}
      </div>
    </div>
  </div>
</template>
