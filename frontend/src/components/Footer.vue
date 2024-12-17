<script setup lang="ts">
import twitterIcon from "@/assets/icons/twitter.svg";
import youtubeIcon from "@/assets/icons/youtube.svg";
import { RouterLink } from "vue-router";
</script>

<template>
  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <address>
          <strong>IT Group</strong> <br />
          C. Salvador de Madariaga, 1 <br />
          28027 Madrid <br />
          Spain
        </address>
        <div class="socials">
          <span>Follow us on</span>
          <ul>
            <li>
              <RouterLink to="#">
                <img :src="twitterIcon" alt="twitter" />
              </RouterLink>
            </li>
            <li>
              <RouterLink to="#">
                <img :src="youtubeIcon" alt="youtube" />
              </RouterLink>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <span
          >Copyright &copy; {{ new Date().getFullYear() }} IT Hote ls. All
          rights reserved.</span
        >
        <span
          >Photos by Felix Mooneeram &amp;
          <RouterLink to="#">Serge Kutuzov</RouterLink> on
          <RouterLink to="#">Unsplash</RouterLink></span
        >
      </div>
    </div>
  </footer>
</template>
