import api from "./axios";

export default function paymentAPI() {
  const createPaymentIntent = async (obj) => {
    const response = await api.post("/paymentIntent", {
      amount: obj.amount,
      items: obj.items,
    });
    return response.data;
  };

  const storeCheckout = async (sessionID) => {
    console.log("Session ID is:", sessionID);
    const response = await api.post("/storeCheckout", {
      session_id: sessionID,
    });
    return response.data;
  };
  return {
    createPaymentIntent,
    storeCheckout,
  };
}
