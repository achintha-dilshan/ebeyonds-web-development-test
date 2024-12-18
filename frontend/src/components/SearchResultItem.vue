<script setup lang="ts">
import fallbackImg from "@/assets/img/fallback.png";
import { defineProps, defineEmits } from "vue";

defineProps<{
  result: any;
}>();

const emit = defineEmits<{
  (e: "add-to-favorites", result: any): void;
}>();

function handleImageError(e: any) {
  e.target.src = fallbackImg;
}
</script>

<template>
  <li>
    <RouterLink to="#" @click="emit('add-to-favorites', result)">
      <div class="search-results-item">
        <div class="img">
          <img
            :src="result.show.image?.medium || fallbackImg"
            :alt="result.show.name"
            loading="lazy"
            @error="handleImageError"
          />
        </div>
        <h4 class="title">{{ result.show.name }}</h4>
      </div>
    </RouterLink>
  </li>
</template>
