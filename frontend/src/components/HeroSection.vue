<script setup lang="ts">
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, EffectFade } from "swiper/modules";
import "swiper/css";
import "swiper/css/autoplay";
import "swiper/css/effect-fade";

const photos: string[] = ["banner_1.png", "banner_2.png", "banner_3.png"];
</script>

<template>
  <section class="hero-section">
    <Swiper
      :modules="[Autoplay, EffectFade]"
      :autoplay="{ delay: 3000, disableOnInteraction: false }"
      :effect="'fade'"
      :loop="true"
      :fadeEffect="{ crossFade: true }"
    >
      <SwiperSlide v-for="(photo, index) in photos" :key="index">
        <img
          :src="`src/assets/img/${photo}`"
          alt="hero banner image"
          class="slide-image"
        />
      </SwiperSlide>
    </Swiper>
  </section>
</template>
