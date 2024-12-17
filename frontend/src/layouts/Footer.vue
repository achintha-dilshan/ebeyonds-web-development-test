<script setup lang="ts">
import twitterIcon from "@/assets/icons/twitter.svg";
import youtubeIcon from "@/assets/icons/youtube.svg";
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
              <a href="javascript:void(0)">
                <img :src="twitterIcon" alt="twitter" />
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <img :src="youtubeIcon" alt="youtube" />
              </a>
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
          <a href="javascript:void(0)">Serge Kutuzov</a> on
          <a href="javascript:void(0)">Unsplash</a></span
        >
      </div>
    </div>
  </footer>
</template>
