<template>
  <div class="contact-form">
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
          <label for="telephone" class="form-label">Telephone</label>
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
          >I agree to the <RouterLink to="#">Terms &amp; Conditions</RouterLink></label
        >
      </div>
      <div class="button-section">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</template>
