<script setup lang="ts">
import { Loader, Search, X } from "lucide-vue-next";
import SearchResultItem from "./SearchResultItem.vue";
</script>

<template>
  <div class="search-form">
    <form action="">
      <div class="search-field">
        <Search class="search-icon" />
        <input
          type="text"
          id="search"
          name="search"
          placeholder="Search title and add to grid"
        />
        <Loader class="loading-icon" />
        <button type="button" class="clear-search-btn">
          <X class="clear-search-icon" />
        </button>
      </div>
    </form>
    <div class="search-results">
      <ul>
        <SearchResultItem />
        <SearchResultItem />
        <SearchResultItem />
        <li class="no-result">No results found.</li>
      </ul>
    </div>
  </div>
</template>
