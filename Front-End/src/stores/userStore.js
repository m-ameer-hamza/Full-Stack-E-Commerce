import { defineStore } from "pinia";
export const userSatore = defineStore("user", {
  state: () => ({
    name: "",
    email: "",
    isAuthenticated: false,
  }),
  actions: {
    setUser(name, email, isAuthenticated) {
      this.name = name;
      this.email = email;
      this.isAuthenticated = isAuthenticated;
    },
  },
  clearUser() {
    this.name = "";
    this.email = "";
    this.isAuthenticated = false;
  },
});
