import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
  state: () => ({
    name: "",
    email: "",
    isAuthenticated: false,
    token: "",
  }),
  actions: {
    setUser({ name, email, token, isAuthenticated }) {
      this.name = name;
      this.email = email;
      this.token = token;
      this.isAuthenticated = isAuthenticated;
    },
    clearUser() {
      this.name = "";
      this.email = "";
      this.isAuthenticated = false;
      this.token = "";
    },
  },
});
