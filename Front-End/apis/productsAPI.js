import axios from "axios";

export default function productsAPI() {
  const getFeaturedProducts = async () => {
    const response = await axios.get("/products/featured");
    return response.data;
  };
  const getProducts = async () => {
    const response = await axios.get("/products");
    return response.data;
  };
  const getProduct = async (id) => {
    const response = await axios.get(`/products/${id}`);
    return response.data;
  };
  return {
    getFeaturedProducts,
    getProducts,
    getProduct,
  };
}
