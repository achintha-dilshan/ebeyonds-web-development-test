<script setup lang="ts">
import { reactive, ref } from "vue";
import { useToast } from "vue-toastification";

const toast = useToast();

const submitting = ref(false);

const formData = reactive({
  first_name: "",
  last_name: "",
  email: "",
  telephone: "",
  message: "",
  terms: false,
});

const errors = reactive({
  first_name: "",
  last_name: "",
  email: "",
  message: "",
  terms: "",
});

const validateField = (field: string) => {
  switch (field) {
    case "first_name":
      errors.first_name = formData.first_name.trim()
        ? ""
        : "First name is required.";
      break;
    case "last_name":
      errors.last_name = formData.last_name.trim()
        ? ""
        : "Last name is required.";
      break;
    case "email":
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      errors.email = emailRegex.test(formData.email)
        ? ""
        : "Enter a valid email address.";
      break;
    case "message":
      errors.message = formData.message.trim() ? "" : "Message is required.";
      break;
    case "terms":
      errors.terms = formData.terms
        ? ""
        : "You must agree to the terms and conditions.";
      break;
    default:
      break;
  }
};

const handleInput = (field: string) => {
  validateField(field);
  if (!formData[field as keyof typeof formData]) {
    errors[field as keyof typeof errors] = "This field is required.";
  }
};

const validateForm = () => {
  Object.keys(errors).forEach((field) => validateField(field));
  return !Object.values(errors).some((error) => error);
};

const handleSubmit = async () => {
  if (validateForm()) {
    submitting.value = true;

    try {
      const response = await fetch("http://backend.test", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          first_name: formData.first_name,
          last_name: formData.last_name,
          email: formData.email,
          telephone: formData.telephone,
          message: formData.message,
          terms: formData.terms ? "1" : "0",
        }),
      });
      const result = await response.json();

      if (response.ok) {
        // Reset form data
        formData.first_name = "";
        formData.last_name = "";
        formData.email = "";
        formData.telephone = "";
        formData.message = "";
        formData.terms = false;

        toast.success("Your message has been successfully submitted.", {
          timeout: 2000,
        });
      } else {
        // Handle backend validation errors
        Object.keys(errors).forEach((key) => {
          validateField(key);
          if (result[key]) {
            errors[key as keyof typeof errors] = result[key];
          }
        });
      }
    } catch (error) {
      console.error("Error submitting the form:", error);
    } finally {
      submitting.value = false;
    }
  }
};
</script>

<template>
  <div class="contact-form">
    <form @submit.prevent="handleSubmit" novalidate>
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
              v-model="formData.first_name"
              @input="handleInput('first_name')"
            />
            <span class="form-error" v-if="errors.first_name">{{
              errors.first_name
            }}</span>
          </div>
          <div class="form-field">
            <label for="lastName" class="form-label">Last Name *</label>
            <input
              type="text"
              class="form-input"
              name="last_name"
              id="lastName"
              required
              v-model="formData.last_name"
              @input="handleInput('last_name')"
            />
            <span class="form-error" v-if="errors.last_name">{{
              errors.last_name
            }}</span>
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
            v-model="formData.email"
            @input="handleInput('email')"
          />
          <span class="form-error" v-if="errors.email">{{ errors.email }}</span>
        </div>
        <div class="form-field">
          <label for="telephone" class="form-label">Telephone</label>
          <input
            type="tel"
            class="form-input"
            name="telephone"
            id="telephone"
            v-model="formData.telephone"
          />
        </div>
        <div class="form-field">
          <label for="message" class="form-label">Message *</label>
          <textarea
            name="message"
            class="form-input"
            id="message"
            cols="5"
            v-model="formData.message"
            @input="handleInput('message')"
          ></textarea>
          <span class="form-error" v-if="errors.message">{{
            errors.message
          }}</span>
        </div>
      </div>
      <label class="form-label">*required ﬁelds</label>
      <div class="form-field checkbox-field">
        <input
          type="checkbox"
          name="terms"
          id="terms"
          required
          v-model="formData.terms"
          @change="handleInput('terms')"
        />
        <label for="terms" class="form-label"
          >I agree to the
          <RouterLink to="#">Terms &amp; Conditions</RouterLink></label
        >
      </div>
      <span class="form-error" v-if="errors.terms">{{ errors.terms }}</span>
      <div class="button-section">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</template>
