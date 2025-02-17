import axios from "axios";
const apiURL = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL || "http://localhost:8000/api",
  headers: {
    Accept: "application/json",
  },
});

export default apiURL;
