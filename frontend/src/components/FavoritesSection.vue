<script setup lang="ts">
import MovieCard from "./MovieCard.vue";
import SearchForm from "./SearchForm.vue";
import moviesData from "@/data/movies.json";
import { ref } from "vue";
import { useToast } from "vue-toastification";

const toast = useToast();

export type Movie = {
  id: number;
  name: string;
  imageURL: string;
  targetURL: string;
  description: string;
};

const movies = ref<Movie[]>(moviesData);

const removeMovie = (id: number) => {
  const movieName = movies.value.find((movie) => movie.id == id)?.name;
  movies.value = movies.value.filter((movie) => movie.id !== id);
  toast.info(`The movie "${movieName}" has been removed.`, { timeout: 2000 });
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

  if (exist) {
    toast.info(`The movie "${newMovie.name}" already exists.`, { timeout: 2000 });
    return
  };

  movies.value.push(newMovie);
  toast.success(`The movie "${newMovie.name}" has been successfully added to the favorites.`, { timeout: 2000 });
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
