<script setup>
import { ref, onMounted, onBeforeUnmount, computed } from "vue";
import { useRoute } from "vue-router";
import { clearAuthToken } from "../utils/auth.js";

const route = useRoute();
const dropdownOpen = ref(false);
const dropdownWrapper = ref(null);

const icon = computed(() =>
  route.path === "/login" ? "pi-user-plus" : "pi-user"
);

const goToLogin = () => {
  route.path === "/login" ? router.push("register") : router.push("login");
};

const toggleDropdown = () => {
  dropdownOpen.value = !dropdownOpen.value;
};

const logout = () => {
  clearAuthToken();
  dropdownOpen.value = false;
};

const handleClickOutside = (event) => {
  if (dropdownWrapper.value && !dropdownWrapper.value.contains(event.target)) {
    dropdownOpen.value = false;
  }
};

onMounted(() => {
  document.addEventListener("click", handleClickOutside);
});

onBeforeUnmount(() => {
  document.removeEventListener("click", handleClickOutside);
});
</script>

<template>
  <div ref="dropdownWrapper" class="relative inline-block">
    <button
      aria-label="user"
      @click="toggleDropdown"
      class="hover:opacity-80 transition-opacity mt-[4px]"
    >
      <i :class="`pi ${icon} text-xl text-black`"></i>
    </button>

    <transition
      enter-active-class="transition ease-out duration-100"
      enter-from-class="opacity-0 transform scale-95"
      enter-to-class="opacity-100 transform scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="opacity-100 transform scale-100"
      leave-to-class="opacity-0 transform scale-95"
    >
      <div
        v-if="dropdownOpen"
        class="absolute right-0 mt-8 w-44 p-4 bg-white rounded-md shadow-lg z-50 flex items-center"
      >
        <button
          @click="logout"
          class="block w-full text-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded transition duration-150"
        >
          Logout
        </button>
      </div>
    </transition>
  </div>
</template>
