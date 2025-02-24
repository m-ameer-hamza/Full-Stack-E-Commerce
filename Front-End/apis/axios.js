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

api.interceptors.request.use(
  (config) => {
    // You can add headers here if needed
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

api.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    console.log("error from response interceptor", error);
    const status = error.response?.status;
    const message = error.response?.data?.message || "Something went wrong";

    if ([422, 401, 403, 404, 500].includes(status)) {
      toast.error(message);
    } else {
      toast.error("Something went wrong");
    }

    return Promise.reject(error);
  }
);

export default api;
