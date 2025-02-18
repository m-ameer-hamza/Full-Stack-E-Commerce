import axios from "axios";
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

// api.interceptors.response.use(
//   (response) => {
//     return response;
//   },
//   (error) => {
//     console.log("error from response interceptor", error);
//     return Promise.reject(error);
//   }
// );

export default api;
