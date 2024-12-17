<script setup lang="ts">
import FormButton from "./FormButton.vue";
</script>

<template>
  <section class="contact-section">
    <div class="container">
      <div class="header">
        <h2 class="title">How to reach us</h2>
        <p class="caption">Lorem ipsum dolor sit amet, consetetur.</p>
      </div>
      <div class="content">
        <!-- form -->
        <form action="">
          <div class="form-fields">
            <div class="name-row">
              <div class="form-field">
                <label class="form-label" for="firstName">First Name *</label>
                <input
                  type="text"
                  class="form-input"
                  name="first_name"
                  id="firstName"
                  required
                />
                <!-- <span class="form-error">Lorem ipsum dolor sit amet.</span> -->
              </div>
              <div class="form-field">
                <label for="lastName" class="form-label">Last Name *</label>
                <input
                  type="text"
                  class="form-input"
                  name="last_name"
                  id="lastName"
                  required
                />
              </div>
            </div>
            <div class="form-field">
              <label for="email" class="form-label">Email *</label>
              <input
                type="email"
                class="form-input"
                name="email"
                id="email"
                required
              />
            </div>
            <div class="form-field">
              <label for="telephone" class="form-label">Telephone *</label>
              <input
                type="tel"
                class="form-input"
                name="telephone"
                id="telephone"
              />
            </div>
            <div class="form-field">
              <label for="message" class="form-label">Message *</label>
              <textarea
                name="message"
                class="form-input"
                id="message"
                cols="5"
              ></textarea>
            </div>
          </div>
          <label class="form-label">*required ﬁelds</label>
          <div class="form-field checkbox-field">
            <input type="checkbox" name="terms" id="terms" required />
            <label for="terms" class="form-label"
              >I agree to the <a href="#">Terms &amp; Conditions</a></label
            >
          </div>
          <div class="button-section">
            <FormButton type="submit">Submit</FormButton>
          </div>
        </form>
        <!-- map -->
        <div class="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3812075643614!2d79.9404323!3d6.844821199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25069caa2f53b%3A0xe7eae3a8b1f1214d!2seBEYONDS%20eBusiness%20%26%20Digital%20Solutions!5e0!3m2!1sen!2slk!4v1734472946976!5m2!1sen!2slk"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen="true"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </div>
  </section>
</template>
