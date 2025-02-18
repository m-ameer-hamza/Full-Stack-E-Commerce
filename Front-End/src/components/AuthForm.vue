<script setup>
import { defineProps, reactive, ref, watch } from "vue";
import { RouterLink } from "vue-router";
import authAPI from "../../apis/authAPI.js";
import { useMutation } from "@tanstack/vue-query";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import { useToast } from "vue-toastification";

// Define props using defineProps
const props = defineProps({
  showName: {
    type: Boolean,
    default: true,
  },
  showRegisterAs: {
    type: Boolean,
    default: true,
  },
  formTitle: {
    type: String,
    default: "Register",
  },
  btnTitle: {
    type: String,
    default: "Register",
  },
});
const toast = useToast();
const registerBtnClicked = ref(false);
const loginBtnClicked = ref(false);
const { register, login } = authAPI();

const form = reactive({
  name: "",
  email: "",
  password: "",
  role: "",
});

const errors = reactive({
  name: false,
  email: false,
  password: false,
  role: false,
});

const nameRegex = /^[A-Za-z]{5,}$/;

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).{8,}$/;

function validateRegisterForm() {
  if (!nameRegex.test(form.name)) {
    useQuery;
    errors.name = true;
  } else {
    errors.name = false;
  }
  if (!emailRegex.test(form.email)) {
    errors.email = true;
  } else {
    errors.email = false;
  }
  if (!passwordRegex.test(form.password)) {
    errors.password = true;
  } else {
    errors.password = false;
  }
}

function validateLoginForm() {
  if (!emailRegex.test(form.email)) {
    errors.email = true;
  } else {
    errors.email = false;
  }
  if (!passwordRegex.test(form.password)) {
    errors.password = true;
  } else {
    errors.password = false;
  }
}

function handleSubmit(formType) {
  if (formType === "register") {
    validateRegisterForm();
    if (!Object.values(errors).some((error) => error)) {
      registerBtnClicked.value = true;
      mutation.mutate();
    }
  } else {
    validateLoginForm();
    if (!Object.values(errors).some((error) => error)) {
      console.log("Login Form is valid.", form);
      loginBtnClicked.value = true;
    }
  }
}

//Query functions for APIs
const mutation = useMutation({
  mutationFn: () => register(form),
  retry: false,
});

watch(
  () => mutation.isSuccess.value,
  (isSuccess, wasSuccess) => {
    if (isSuccess && !wasSuccess) {
      toast.success("Registration Successful");
    }
  }
);

watch(
  () => mutation.isError.value,
  (isError, wasError) => {
    if (isError && !wasError) {
      console.error(mutation.error.value?.message);
      toast.error("Registration Failed");
    }
  }
);
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 pb-4">
    <div class="w-full max-w-lg p-10 space-y-8 bg-white rounded-lg shadow-lg">
      <h2 class="text-center text-3xl font-bold text-green-500">
        {{ formTitle }}
      </h2>
      <form class="space-y-6">
        <!-- Name Field -->
        <div v-if="showName" class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="pi pi-user text-green-500"></i>
          </span>
          <input
            type="text"
            v-model="form.name"
            placeholder="Name"
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
          />
          <p v-if="errors.name" class="text-red-700">
            *Min 5 letters and no special character
          </p>
        </div>
        <!-- Email Field -->
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="pi pi-envelope text-green-500"></i>
          </span>
          <input
            type="email"
            v-model="form.email"
            placeholder="Email"
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
          />
          <p v-if="errors.email" class="text-red-700">*Email is Invalide</p>
        </div>
        <!-- Password Field -->
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="pi pi-lock text-green-500"></i>
          </span>
          <input
            type="password"
            v-model="form.password"
            placeholder="Password"
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
          />
          <p v-if="errors.password" class="text-red-700">
            *Min 8 characters and mix with special character
          </p>
        </div>
        <!-- Register As Dropdown -->
        <div class="relative" v-if="showRegisterAs">
          <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="pi pi-users text-green-500"></i>
          </span>
          <select
            v-model="form.role"
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
          >
            <option value="" disabled selected>Register as</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
          <p v-if="errors.role" class="text-red-700">* select regsiter as</p>
        </div>
        <!-- Register Button -->

        <button
          type="button"
          v-if="btnTitle === 'Register'"
          @click="handleSubmit('register')"
          class="w-full flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition duration-300"
        >
          <!-- When loading, show spinner and "Sing In ...." -->
          <template v-if="mutation.isLoading">
            <span>Register In .....</span>
            <!-- The spinner component with some right margin -->
            <PulseLoader :loading="isLoading" color="#fff" class="mr-2" />
          </template>
          <template v-else>
            <i class="pi pi-check mr-2"></i>
            <span>Register</span>
          </template>
        </button>

        <!-- Login Button -->
        <button
          type="button"
          v-else
          @click="handleSubmit('login')"
          class="w-full flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition duration-300"
        >
          <i class="pi pi-check mr-2"></i>
          Login
        </button>
      </form>
      <!-- Sign/Register In Link -->
      <div v-if="btnTitle === 'Register'" class="text-center">
        <RouterLink
          to="/login"
          class="text-green-500 hover:underline font-medium"
        >
          Already Registered? Sign In Now
        </RouterLink>
      </div>
      <div v-else class="text-center">
        <RouterLink to="/" class="text-green-500 hover:underline font-medium">
          New User? Register Now
        </RouterLink>
      </div>
    </div>
  </div>
</template>
