import axios from "axios";
import { useToast } from "vue-toastification";
import { getAuthToken } from "@/utils/auth";

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
    const token = getAuthToken();
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

api.interceptors.response.use(
  (response) => response,
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
