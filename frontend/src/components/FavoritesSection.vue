<script setup lang="ts">
import MovieCard from "./MovieCard.vue";
import SearchForm from "./SearchForm.vue";
</script>

<template>
  <section class="favorites-section">
    <div class="container">
      <div class="header" data-aos="fade-up" data-aos-duration="300">
        <h2 class="title">Collect your favourites</h2>

        <!-- search form -->
        <SearchForm />
      </div>
      <div class="content">
        <MovieCard />
        <MovieCard />
        <MovieCard />
        <MovieCard />
        <MovieCard />
      </div>
    </div>
  </section>
</template>
