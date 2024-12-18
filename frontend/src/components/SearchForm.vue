<script setup lang="ts">
import { Loader, Search, X } from "lucide-vue-next";
import SearchResultItem from "./SearchResultItem.vue";
import { ref, watch } from "vue";
import { defineEmits } from "vue";

const searchQuery = ref<string>("");
const isLoading = ref<boolean>(false);
const searchResults = ref<any>([]);

let timeout: any = null;

// fetch movies
const fetchMovies = async (query: string): Promise<any> => {
  if (query.length > 3) {
    isLoading.value = true;

    try {
      const response = await fetch(
        `https://api.tvmaze.com/search/shows?q=${query}`
      );
      const data = await response.json();

      searchResults.value = data;
    } catch (error) {
      searchResults.value = [];
      console.error(error);
    } finally {
      isLoading.value = false;
    }
  } else {
    searchResults.value = [];
  }
};

// throttle requests
watch(searchQuery, (newQuery) => {
  if (timeout) clearTimeout(timeout);
  timeout = setTimeout(() => fetchMovies(newQuery), 500);
});

// clear search input
const clearSearch = (): void => {
  searchQuery.value = "";
  searchResults.value = [];
};

const emit = defineEmits<{
  (e: "add-to-favorites", result: any): void;
}>();

const forwardFavorite = (result: any) => {
  clearSearch();
  emit("add-to-favorites", result);
};
</script>

<template>
  <div class="search-form">
    <!-- form -->
    <form action="">
      <div class="search-field">
        <Search class="search-icon" />
        <input
          type="text"
          id="search"
          name="search"
          v-model="searchQuery"
          placeholder="Search title and add to grid"
        />
        <button
          type="button"
          class="clear-search-btn"
          @click="clearSearch"
          v-if="searchQuery"
          :disabled="isLoading"
        >
          <Loader class="loading-icon" v-if="isLoading" />
          <X class="clear-search-icon" v-if="!isLoading" />
        </button>
      </div>
    </form>

    <!-- results -->
    <div class="search-results" v-if="searchResults.length > 0">
      <ul>
        <SearchResultItem
          v-for="result in searchResults"
          :key="result.id"
          :result="result"
          @add-to-favorites="forwardFavorite"
        />
      </ul>
    </div>
  </div>
</template>
