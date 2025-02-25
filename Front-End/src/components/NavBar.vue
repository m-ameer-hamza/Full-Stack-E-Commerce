<script setup>
import Logo from "../assets/img/logo.jpeg";
import Account from "../assets/img/login.jpeg";
import { computed } from "vue";
import { RouterLink, useRoute, useRouter } from "vue-router";

const router = useRouter();
const route = useRoute();

const btnText = computed(() =>
  route.path === "/login" ? "Register" : "Login"
);
// const icon = computed(() =>
//   route.path === "/login" ? "pi pi-user-plus" : "pi pi-user"
// );

const goToLogin = () => {
  route.path === "/login" ? router.push("register") : router.push("login");
};
</script>

<template>
  <header
    class="px-16 py-8 w-full bg-white max-md:px-5 max-md:max-w-full fixed top-0 z-50 shadow-md"
  >
    <div class="flex gap-5 items-center justify-between max-md:flex-col">
      <a
        href="/"
        class="flex items-center gap-1.5 text-4xl font-bold text-black max-md:mt-10"
      >
        <img
          :src="Logo"
          alt="Furniro logo"
          class="object-contain w-[50px] aspect-[1.56]"
        />
        <span>Furniro</span>
      </a>

      <nav class="max-md:mt-10">
        <ul
          class="flex gap-10 text-base font-medium text-black max-md:flex-col"
        >
          <li>
            <RouterLink to="/" class="hover:text-gray-600 transition-colors"
              >Home</RouterLink
            >
          </li>
          <li>
            <RouterLink
              to="/products"
              class="hover:text-gray-600 transition-colors"
              >Products</RouterLink
            >
          </li>
          <li>
            <RouterLink
              to="/about"
              class="hover:text-gray-600 transition-colors"
              >About</RouterLink
            >
          </li>
          <li>
            <RouterLink
              to="/contact"
              class="hover:text-gray-600 transition-colors"
              >Contact</RouterLink
            >
          </li>
        </ul>
      </nav>

      <div class="flex gap-10 max-md:mt-10">
        <button
          aria-label="Account"
          class="hover:opacity-80 transition-opacity"
        >
          <img
            :src="Account"
            alt="Account"
            class="object-contain w-7 aspect-square"
          />
        </button>
        <button
          aria-label="Search"
          class="hover:opacity-80 transition-opacity flex items-center justify-center w-7 h-7"
        >
          <i class="pi pi-search text-black text-xl"></i>
        </button>

        <button
          aria-label="Favorites"
          class="hover:opacity-80 transition-opacity"
        >
          <img
            src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/c56b48a84245ecd5d3b3da46991166817337450019eef839a7fedd87be6050dd?placeholderIfAbsent=true"
            alt="Favorites icon"
            class="object-contain w-7 aspect-square"
          />
        </button>
        <button aria-label="Cart" class="hover:opacity-80 transition-opacity">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/52cb9a1f112445149b6b31ac05588017/125c5421587ebc7e847e7912b1da14a11e204697a4dfbd43ab84dd6c66fc3729?placeholderIfAbsent=true"
            alt="Cart icon"
            class="object-contain w-7 aspect-square"
          />
        </button>
      </div>
    </div>
  </header>
</template>
