import api from "./axios";

export default function productsAPI() {
  const getFeaturedProducts = async () => {
    const response = await api.get("/products/featured");
    return response.data;
  };

  const getProducts = async (pageNum = 1) => {
    const response = await api.get(`/products?page=${pageNum}`);
    return response.data;
  };

  const getProduct = async (id) => {
    console.log("Calling the get Product API");
    const response = await api.get(`/products/${id}`);
    return response.data;
  };

  return {
    getFeaturedProducts,
    getProducts,
    getProduct,
  };
}
