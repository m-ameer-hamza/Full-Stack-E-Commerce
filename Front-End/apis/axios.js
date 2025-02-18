import axios from "axios";
import { useToast } from "vue-toastification";
const toast = useToast();
const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});
// Add this to your axios instance file (src/api/axios.js)

// api.interceptors.request.use(
//   (config) => {
//     // Modify config (e.g., add Authorization header)
//     // const token = localStorage.getItem('token');
//     // if (token) {
//     //   config.headers.Authorization = `Bearer ${token}`;
//     // }
//     return config;
//   },
//   (error) => {
//     // Handle request error
//     return Promise.reject(error);
//   }
// );

api.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    console.log("error from response interceptor", error);
    if (error.response?.status === 422) {
      const message = error.response?.data?.message;
      toast.error(message);
      return Promise.reject(error);
    }
    if (error.response?.status === 401) {
      const message = error.response?.data?.message;
      toast.error(message);
      return Promise.reject(error);
    }
    if (error.response?.status === 403) {
      const message = error.response?.data?.message;
      toast.error(message);
      return Promise.reject(error);
    }
    if (error.response?.status === 404) {
      const message = error.response?.data?.message;
      toast.error(message);
      return Promise.reject(error);
    }
    if (error.response?.status === 500) {
      const message = error.response?.data?.message;
      toast.error(message);
      return Promise.reject(error);
    } else {
      toast.error("Something went wrong");
    }
    return Promise.reject(error);
  }
);

export default api;
