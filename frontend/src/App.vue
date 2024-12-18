<script setup lang="ts">
import { onMounted } from "vue";
import { RouterView } from "vue-router";
import Footer from "./components/Footer.vue";
import AOS from "aos";

onMounted(() => {
  AOS.init();
});
</script>

<template>
  <!-- navbar -->

  <!-- content goes here -->
  <main>
    <RouterView />
  </main>

  <!-- footer -->
  <Footer />
</template>
