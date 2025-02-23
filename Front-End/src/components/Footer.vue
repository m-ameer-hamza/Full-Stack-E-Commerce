<script setup>
import { RouterLink } from "vue-router";
</script>
<template>
  <footer class="bg-white py-8">
    <div class="max-w-7xl mx-auto">
      <!-- Main content: Three columns on medium screens and above -->
      <div class="flex flex-col md:flex-row justify-between items-start">
        <!-- Brand / Name Section -->
        <div class="mb-6 md:mb-0">
          <h2 class="text-3xl font-bold">Funiro.</h2>
          <p class="text-neutral-400 text-base mt-2">
            400 University Drive Suite 200<br />
            Coral Gables, FL 33134 USA
          </p>
        </div>

        <!-- Quick Links Section -->
        <div class="mb-6 md:mb-0">
          <h3 class="text-base font-medium text-neutral-900">Quick Links</h3>
          <ul class="mt-4 space-y-2">
            <li>
              <RouterLink
                to="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >Home</RouterLink
              >
            </li>
            <li>
              <RouterLink
                to="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >Shop</RouterLink
              >
            </li>
            <li>
              <RouterLink
                to="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >About</RouterLink
              >
            </li>
            <li>
              <RouterLink
                to="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >Contact</RouterLink
              >
            </li>
          </ul>
        </div>
        <!-- Quick Links Section -->
        <div class="mb-6 md:mb-0">
          <h3 class="text-base font-medium text-neutral-900">Quick Links</h3>
          <ul class="mt-4 space-y-2">
            <li>
              <a
                href="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >Home</a
              >
            </li>
            <li>
              <a
                href="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >Shop</a
              >
            </li>
            <li>
              <a
                href="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >About</a
              >
            </li>
            <li>
              <a
                href="/"
                class="text-neutral-400 text-base font-medium font-['Poppins']"
                >Contact</a
              >
            </li>
          </ul>
        </div>

        <!-- Newsletter Section -->
        <div>
          <h3 class="text-base font-medium text-neutral-900">Newsletter</h3>
          <p class="mt-4 text-sm text-neutral-400">Enter Your Email Address</p>
          <form class="mt-2 flex flex-col sm:flex-row items-start">
            <input
              type="email"
              placeholder="Your email"
              class="p-2 border border-black w-full sm:w-auto"
            />
            <button
              type="submit"
              class="mt-2 sm:mt-0 sm:ml-2 px-4 py-2 border border-black text-black text-sm font-medium"
            >
              Subscribe
            </button>
          </form>
        </div>
      </div>

      <!-- Bottom Copyright -->
      <div class="mt-8 border-t border-zinc-300 pt-4">
        <p class="text-black text-base font-normal">
          &copy; 2023 Funiro. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
</template>
