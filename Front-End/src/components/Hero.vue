<script setup></script>
<template>
  <div class="flex flex-col text-black whitespace-nowrap mt-[104px]">
    <div
      class="flex relative flex-col justify-center items-center px-20 py-28 w-full max-h-[316px] max-md:px-5 max-md:pt-24 max-md:max-w-full"
    >
      <img
        loading="lazy"
        src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/c1417dfcec7f1bf1329ae57d0515540ef039ead7e9b42ffb8f842be66dfc16c7?apiKey=52cb9a1f112445149b6b31ac05588017&"
        class="object-cover absolute inset-0 size-full"
        alt="Products Background"
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
</template>
