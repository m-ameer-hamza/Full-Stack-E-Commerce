<script setup>
import { computed, reactive, ref } from "vue";
import { RouterLink, useRouter } from "vue-router";
import { useMutation } from "@tanstack/vue-query";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import { useToast } from "vue-toastification";
import authAPI from "../../apis/authAPI.js";
import { setAuthToken } from "@/utils/auth.js";

const props = defineProps({
  title: {
    type: String,
    default: "Register",
  },
});

const router = useRouter();
const toast = useToast();
const { register, login } = authAPI();

const formType = computed(() =>
  props.title === "Register" ? "register" : "login"
);
const showPassword = ref(false);
const isNameVisible = computed(() => props.title === "Register");
const isRegisterForm = computed(() => props.title === "Register");

// Form state
const form = reactive({
  name: "",
  email: "",
  password: "",
});

// Validation state
const errors = reactive({
  name: false,
  email: false,
  password: false,
});

// Regex patterns
const VALIDATION_REGEX = {
  name: /^[A-Za-z ]{5,}$/,
  email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
  password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).{8,}$/,
};

// Form validation
function validateForm() {
  let isValid = true;

  if (formType.value === "register") {
    errors.name = !VALIDATION_REGEX.name.test(form.name);
    isValid &&= !errors.name;
  }

  errors.email = !VALIDATION_REGEX.email.test(form.email);
  errors.password = !VALIDATION_REGEX.password.test(form.password);

  isValid &&= !errors.email && !errors.password;
  return isValid;
}

// Form submission
function handleSubmit() {
  if (!validateForm()) return;

  formType.value === "register" ? regMutation.mutate() : loginMutation.mutate();
}

// Password visibility toggle
const togglePassword = () => {
  showPassword.value = !showPassword.value;
};

// Mutation configurations
const mutationConfig = {
  retry: false,
  onError: (error) => {
    toast.error(
      error.message || `Something went wrong during ${formType.value}`
    );
  },
};

// Register mutation
const regMutation = useMutation({
  mutationFn: () => register(form),
  ...mutationConfig,
  onSuccess: () => {
    toast.success("Registration Successful");
    router.push("/login");
  },
});

// Login mutation
const loginMutation = useMutation({
  mutationFn: () => login(form),
  ...mutationConfig,
  onSuccess: (data) => {
    toast.success("Login Successful");
    setAuthToken(data.token);

    router.push("/");
  },
});

// Computed loading state
const isLoading = computed(() =>
  formType.value === "register"
    ? regMutation?.isLoading?.value
    : loginMutation?.isLoading?.value
);
</script>
<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 pb-4">
    <div class="w-full max-w-lg p-10 space-y-8 bg-white rounded-lg shadow-lg">
      <h2 class="text-center text-3xl font-bold text-gray-800">
        {{ isRegisterForm ? "Sign Up" : "Login" }}
      </h2>
      <form class="space-y-6">
        <!-- Name Field -->
        <div v-if="isNameVisible" class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="pi pi-user text-orange-500"></i>
          </span>
          <input
            type="text"
            v-model="form.name"
            placeholder="Name"
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300"
          />
          <p v-if="errors.name" class="text-red-700">
            Min 5 letters and no special character
          </p>
        </div>
        <!-- Email Field -->
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="pi pi-envelope text-orange-500"></i>
          </span>
          <input
            type="email"
            v-model="form.email"
            placeholder="Email"
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300"
          />
          <p v-if="errors.email" class="text-red-700">Email is invalid</p>
        </div>
        <!-- Password Field -->
        <div class="relative">
          <!-- Left lock icon -->
          <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="pi pi-lock text-orange-500"></i>
          </span>
          <!-- Password input with dynamic type -->
          <input
            :type="showPassword ? 'text' : 'password'"
            v-model="form.password"
            placeholder="Password"
            class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300"
          />
          <!-- Right eye icon for toggling visibility -->
          <span
            class="absolute inset-y-0 right-0 flex items-center pr-4 cursor-pointer"
            @click="togglePassword"
          >
            <i
              :class="
                showPassword
                  ? 'pi pi-eye-slash text-orange-500'
                  : 'pi pi-eye text-orange-500'
              "
            ></i>
          </span>
          <p v-if="errors.password" class="text-red-700">
            Min 8 characters and mix with special character
          </p>
        </div>

        <!-- Register Button -->
        <button
          type="button"
          v-if="title === 'Register'"
          @click="handleSubmit('register')"
          class="w-full flex items-center justify-center bg-orange-400 hover:bg-orange-500 text-white font-semibold py-3 rounded-lg transition duration-300"
        >
          <!-- When loading, show spinner and "Sing In ...." -->
          <template v-if="isLoading">
            <span>Register In .....</span>
            <!-- The spinner component with some right margin -->
            <PulseLoader :loading="isLoading" color="#fff" class="mr-2" />
          </template>
          <template v-else>
            <span>Sign up</span>
          </template>
        </button>

        <!-- Login Button -->
        <button
          type="button"
          v-else
          @click="handleSubmit('login')"
          class="w-full flex items-center justify-center bg-orange-400 hover:bg-orange-500 text-white font-semibold py-3 rounded-lg transition duration-300"
        >
          Login
        </button>
      </form>

      <div class="text-center">
        <RouterLink
          :to="isRegisterForm ? '/login' : '/register'"
          class="text-orange-500 hover:underline font-medium"
        >
          {{
            isRegisterForm
              ? "Already Registered? Sign In Now"
              : "New User? Register Now"
          }}
        </RouterLink>
      </div>
    </div>
  </div>
</template>
