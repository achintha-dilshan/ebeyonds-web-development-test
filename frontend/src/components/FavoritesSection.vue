<script setup lang="ts">
import { Loader, Search, X } from "lucide-vue-next";
import MovieCard from "./MovieCard.vue";
</script>

<template>
  <section class="favorites-section">
    <div class="container">
      <div class="header" data-aos="fade-up" data-aos-duration="300">
        <h2 class="title">Collect your favourites</h2>

        <form action="">
          <div class="search-field">
            <Search class="search-icon" />
            <input type="text" id="search" name="search" placeholder="Search title and add to grid" />
            <Loader class="loading-icon" />
            <button type="button" class="clear-search-btn">
              <X class="clear-search-icon" />
            </button>
          </div>
        </form>
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
