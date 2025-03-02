import api from "./axios";

export default function productsAPI() {
  const getFeaturedProducts = async () => {
    const response = await api.get("/products/featured");
    return response.data;
  };

  const getProducts = async (pageNum = 1, limit) => {
    const response = await api.get(`/products?page=${pageNum}&limit=${limit}`);
    return response.data;
  };

  const getProduct = async (id) => {
    const response = await api.get(`/products/${id}`);
    return response.data;
  };

  return {
    getFeaturedProducts,
    getProducts,
    getProduct,
  };
}
