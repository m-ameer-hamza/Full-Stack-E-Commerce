<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useMutation } from "@tanstack/vue-query";
import paymentAPI from "../../apis/paymentAPI";
import { useToast } from "vue-toastification";
import { useCartStore } from "@/stores/cartStore";

const router = useRouter();
const route = useRoute();
const isLoading = ref(false);
const sessionId = ref("");
const toast = useToast();
const { clearCart } = useCartStore();

const { storeCheckout } = paymentAPI();
const completeOrder = useMutation({
  mutationFn: storeCheckout,
  onSuccess: () => {
    isLoading.value = false;
    clearCart();
  },
  onError: (error) => {
    isLoading.value = false;
    console.log(error);
  },
});

function goHome() {
  router.push("/");
}

onMounted(() => {
  sessionId.value = route.query.session_id || "";
  if (sessionId.value) {
    isLoading.value = true;
    completeOrder.mutate(sessionId.value);
  } else {
    toast.error("No session id found");
    console.log("No session id found");
  }
});
</script>

<template>
  <div
    class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4"
  >
    <div class="bg-white shadow-lg rounded-lg p-8 text-center">
      <div v-if="isLoading">
        <div class="flex justify-center">
          <span class="loading loading-spinner loading-lg"></span>
        </div>
        <h2 class="text-2xl font-bold mt-4 text-gray-800">
          Updating the order....
        </h2>
        <p class="text-gray-600 mt-2">
          Please hold on. We are updating the cart.
        </p>
      </div>
      <div v-else>
        <!-- Animated Icon using PrimeIcons -->
        <div class="flex justify-center">
          <i
            class="pi pi-check-circle text-green-500 text-6xl animate-bounce"
            aria-hidden="true"
          ></i>
        </div>
        <!-- Success Message -->
        <h2 class="text-2xl font-bold mt-4 text-gray-800">
          Payment Successful!
        </h2>
        <p class="text-gray-600 mt-2">
          Thank you for your payment. Your transaction has been completed.
        </p>
        <!-- Button -->
        <button
          class="mt-6 btn bg-green px-10 py-2 text-white rounded-md shadow hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
          @click="goHome"
          :disabled="isLoading"
        >
          Okay
        </button>
      </div>
    </div>
  </div>
</template>
