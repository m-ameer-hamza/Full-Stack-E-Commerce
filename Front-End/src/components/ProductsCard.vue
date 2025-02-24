<script setup>
const { products } = defineProps({
  products: {
    type: Array,
    required: true,
  },
});
const IMAGE_URL = import.meta.env.VITE_IMAGE_URL;
</script>
<template>
  <div
    v-for="(product, index) in products"
    :key="index"
    class="card product-card"
  >
    <img
      loading="lazy"
      :src="`${IMAGE_URL}/products/${product.image}.png`"
      :alt="product.title"
    />
    <div class="card-content">
      <h3 class="card-title">{{ product.title }}</h3>
      <p class="card-description">{{ product.description }}</p>
      <div class="card-price">
        <i class="pi pi-tag"></i>
        <span>${{ product.price }}</span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease;
  text-align: center;
  padding: 1rem;
}

.card:hover {
  transform: translateY(-5px);
}
/* Product Card Styles */
.card-image {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 4px;
}

.card-content {
  margin-top: 1rem;
}

.card-title {
  font-size: 1.2rem;
  font-weight: bold;
  margin: 0.5rem 0;
}

.card-description {
  font-size: 0.9rem;
  color: #666;
  margin-bottom: 0.5rem;
}

.card-price {
  font-size: 1rem;
  color: #27ae60;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}
</style>
