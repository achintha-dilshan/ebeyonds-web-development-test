<script setup lang="ts">
import { X } from "lucide-vue-next";
</script>

<template>
  <div class="card" data-aos="fade-up" data-aos-duration="300">
    <div class="card-header">
      <button class="remove-btn">
        <X class="remove-icon" />
      </button>
      <div class="card-image">
        <img src="https://picsum.photos/200" alt="movie image" loading="lazy" />
      </div>
    </div>
    <div class="card-content">
      <h3 class="card-title">Lorem, ipsum dolor.</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illum rem
        enim odio officiis quisquam et laboriosam adipisci accusantium suscipit?
      </p>
    </div>
  </div>
</template>
