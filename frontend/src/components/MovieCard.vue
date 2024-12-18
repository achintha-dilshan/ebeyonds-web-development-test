<script setup lang="ts">
import { X } from "lucide-vue-next";
import { defineProps, defineEmits } from "vue";
import type { Movie } from "./FavoritesSection.vue";

defineProps<{
  movie: Movie;
}>();

const emit = defineEmits<{
  (e: "remove", id: number): void;
}>();
</script>

<template>
  <div class="card" data-aos="fade-up" data-aos-duration="300">
    <div class="card-header">
      <button class="remove-btn" @click="emit('remove', movie.id)">
        <X class="remove-icon" />
      </button>
      <div class="card-image">
        <img :src="movie.imageURL" alt="movie.name" loading="lazy" />
      </div>
    </div>
    <div class="card-content">
      <a :href="movie.targetURL" target="_blank">
        <h3 class="card-title">{{ movie.name }}</h3>
      </a>

      <div v-html="movie.description"></div>
    </div>
  </div>
</template>
