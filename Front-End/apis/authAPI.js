import apiURL from "./axiosWrapper";

export default function authAPI() {
  const register = async (data) => {
    console.log("Register API is called");
    const response = await apiURL.post("/register", data);
    return response.data;
  };

  const login = async (data) => {
    const response = await apiURL.post("/login", data);
    return response.data;
  };

  return {
    register,
    login,
  };
}
