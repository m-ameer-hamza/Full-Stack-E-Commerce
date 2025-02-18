<script setup>
import AuthForm from "@/components/AuthForm.vue";
import { ref } from "vue";
const showName = ref("");
const showRegisterAs = ref("");
</script>
<template>
  <AuthForm :showName="false" formTitle="Login" btnTitle="login" />
</template>
