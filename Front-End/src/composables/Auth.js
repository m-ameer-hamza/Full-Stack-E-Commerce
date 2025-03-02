// src/composables/useAuth.js
import { ref } from "vue";
import { isAuthenticated } from "@/utils/auth";

export const authUser = ref(isAuthenticated());

export function useAuth() {
  const setAuthUser = (value) => {
    authUser.value = value;
  };

  return { authUser, setAuthUser };
}
