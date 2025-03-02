<script setup>
import QualityIcon from "../assets/quality.png";
import WarrantyIcon from "../assets/warrenty.png";
import ShippingIcon from "../assets/shipping.png";
import SupportIcon from "../assets/support.png";
</script>
<template>
  <div
    class="flex mb-[100px] flex-col justify-center items-center py-24 bg-orange-50"
  >
    <div
      class="flex flex-wrap gap-10 justify-between items-center max-w-full w-[1440px]"
    >
      <div class="flex gap-2.5 items-center self-stretch my-auto min-w-[240px]">
        <img
          loading="lazy"
          :src="QualityIcon"
          class="object-contain shrink-0 self-stretch my-auto aspect-square w-[60px]"
          alt="High Quality Icon"
        />
        <div class="flex flex-col self-stretch my-auto min-w-[240px]">
          <div class="text-2xl font-semibold text-black">High Quality</div>
          <div class="text-xl font-medium text-black">
            crafted from top materials
          </div>
        </div>
      </div>
      <div
        class="flex gap-2.5 justify-center items-center self-stretch my-auto min-w-[240px]"
      >
        <img
          loading="lazy"
          :src="WarrantyIcon"
          class="object-contain shrink-0 self-stretch my-auto aspect-square w-[60px]"
          alt="Warranty Protection Icon"
        />
        <div class="flex flex-col self-stretch my-auto min-w-[240px]">
          <div class="text-2xl font-semibold text-black">
            Warranty Protection
          </div>
          <div class="text-xl font-medium text-black">Over 2 years</div>
        </div>
      </div>
      <div
        class="flex gap-2.5 justify-center items-center self-stretch my-auto min-w-[240px]"
      >
        <img
          loading="lazy"
          :src="ShippingIcon"
          class="object-contain shrink-0 self-stretch my-auto aspect-square w-[60px]"
          alt="Free Shipping Icon"
        />
        <div class="flex flex-col self-stretch my-auto">
          <div class="text-2xl font-semibold text-black">Free Shipping</div>
          <div class="text-xl font-medium text-black">Order over 150 $</div>
        </div>
      </div>
      <div class="flex gap-2.5 items-center self-stretch my-auto min-w-[240px]">
        <img
          loading="lazy"
          :src="SupportIcon"
          class="object-contain shrink-0 self-stretch my-auto aspect-square w-[60px]"
          alt="24/7 Support Icon"
        />
        <div class="flex flex-col self-stretch my-auto">
          <div class="text-2xl font-semibold text-black">24 / 7 Support</div>
          <div class="text-xl font-medium text-black">Dedicated support</div>
        </div>
      </div>
    </div>
  </div>
</template>
