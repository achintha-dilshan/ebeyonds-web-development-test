<script setup lang="ts">
import { onMounted } from "vue";
import { RouterView } from "vue-router";
import Footer from "./components/Footer.vue";
import AOS from "aos";
import Navbar from "./components/Navbar.vue";

onMounted(() => {
  AOS.init();
});
</script>

<template>
  <!-- navbar -->
  <Navbar />

  <!-- content goes here -->
  <main>
    <RouterView />
  </main>

  <!-- footer -->
  <Footer />
</template>
