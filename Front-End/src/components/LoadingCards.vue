<script setup></script>

<template>
  <div v-for="n in 3" :key="n" class="card loading-card">
    <i class="pi pi-spin pi-spinner loading-icon"></i>
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

/* Loading Card Styles */
.loading-card {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
}

.loading-icon {
  font-size: 2rem;
  color: #3498db;
}
</style>
