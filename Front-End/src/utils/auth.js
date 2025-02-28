// utils/auth.js
import { ref } from "vue";

const authToken = ref(sessionStorage.getItem("authToken") || null);

export function getAuthToken() {
  return authToken.value;
}
export function setAuthToken(token) {
  authToken.value = token;
  sessionStorage.setItem("authToken", token);
}

export function clearAuthToken() {
  authToken.value = null;
  sessionStorage.removeItem("authToken");
}

export function isAuthenticated() {
  if (authToken.value) {
    return true;
  }
  return false;
}
