<script setup lang="ts">
import { Menu, X } from "lucide-vue-next";
import logo from "@/assets/img/logo.svg";
import { onMounted, onUnmounted, ref } from "vue";

const showMobileMenu = ref<boolean>(false);
const navbarRef = ref<HTMLElement>();

const toggleMobileMenu = () => {
  showMobileMenu.value = !showMobileMenu.value;
};

onMounted(() => {
  if (!navbarRef.value) return;

  const observer = new ResizeObserver((entries) => {
    const navbar = entries[0]?.target;
    if (!navbar) return;
    showMobileMenu.value = false;
  });

  observer.observe(navbarRef.value);

  onUnmounted(() => {
    observer.disconnect();
  });
});
</script>

<template>
  <nav ref="navbarRef" class="navbar">
    <div class="container">
      <div class="navbar-inner">
        <RouterLink to="/">
          <img :src="logo" alt="logo" height="46" />
        </RouterLink>

        <div :class="[showMobileMenu ? 'show' : '', 'menu']">
          <button
            type="button"
            class="menu-close-btn"
            @click="toggleMobileMenu"
          >
            <X class="menu-close-icon" />
          </button>
          <ul>
            <li class="nav-link active">
              <RouterLink to="/">Home</RouterLink>
            </li>
            <li class="nav-link">
              <RouterLink to="#">OUR SCREENS</RouterLink>
            </li>
            <li class="nav-link">
              <RouterLink to="#">SCHEDULE</RouterLink>
            </li>
            <li class="nav-link">
              <RouterLink to="#">MOVIE LIBRARY</RouterLink>
            </li>
            <li class="nav-link">
              <RouterLink to="#">LOCATION & CONTACT</RouterLink>
            </li>
          </ul>
        </div>

        <button
          type="button"
          class="hamburger-menu-btn"
          @click="toggleMobileMenu"
        >
          <Menu class="hamburger-menu-icon" />
        </button>
      </div>
    </div>
  </nav>
</template>
