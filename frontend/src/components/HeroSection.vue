<script setup lang="ts">
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, EffectFade } from "swiper/modules";
import "swiper/css";
import "swiper/css/autoplay";
import "swiper/css/effect-fade";
import banner1 from "@/assets/img/banner_1.png";
import banner2 from "@/assets/img/banner_2.png";
import banner3 from "@/assets/img/banner_3.png";

const photos: string[] = [banner1, banner2, banner3];
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
        <img :src="photo" alt="hero banner image" class="slide-image" />
      </SwiperSlide>
    </Swiper>
  </section>
</template>
