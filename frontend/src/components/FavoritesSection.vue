<script setup lang="ts">
import MovieCard from "./MovieCard.vue";
import SearchForm from "./SearchForm.vue";
import moviesData from "@/data/movies.json";
import { ref } from "vue";

export type Movie = {
  id: number;
  name: string;
  imageURL: string;
  targetURL: string;
  description: string;
};

const movies = ref<Movie[]>(moviesData);

const removeMovie = (id: number) => {
  movies.value = movies.value.filter((movie) => movie.id !== id);
};

const addToFavorites = (result: any) => {
  const newMovie: Movie = {
    id: result.show.id,
    name: result.show.name,
    imageURL: result.show.image?.medium,
    targetURL: result.show.url,
    description: result.show.summary,
  };

  const exist = movies.value.some(
    (existingItem) => existingItem.id == newMovie.id
  );

  if (exist) return;

  movies.value.push(newMovie);
};
</script>

<template>
  <section class="favorites-section">
    <div class="container">
      <div class="header" data-aos="fade-up" data-aos-duration="300">
        <h2 class="title">Collect your favourites</h2>

        <!-- search form -->
        <SearchForm @add-to-favorites="addToFavorites" />
      </div>
      <div class="content">
        <MovieCard
          v-for="movie in movies"
          :key="movie.id"
          :movie="movie"
          @remove="removeMovie"
        />

        <p v-if="movies.length === 0" class="no-movies-message">
          No movies available. Please add some favorites!
        </p>
      </div>
    </div>
  </section>
</template>
