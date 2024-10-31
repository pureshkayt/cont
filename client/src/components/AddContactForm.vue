<template>
  <div class="add-contact-form d-flex justify-content-center">
    <div class="card">
      <h3>Добавить контакт</h3>
      <div v-if="alertMessage" class="alert alert-danger" role="alert">
        {{ alertMessage }}
      </div>
      <div class="form-group">
        <input type="text" v-model="name" class="form-control" placeholder="Имя" />
      </div>
      <div class="form-group">
        <input type="tel" v-model="phone" class="form-control tel" placeholder="Телефон" />
      </div>
      <div class="form-actions">
        <button class="btn btn-primary" @click="validateAndAddContact">Добавить</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axiosConfig';
import '@/assets/styles/AddContactForm.scss';

export default {
  data() {
    return {
      name: '',
      phone: '',
      alertMessage: ''
    };
  },
  methods: {
    validateAndAddContact() {
      const phonePattern = /^\+?[0-9]{10,15}$/;
      if (!this.name && !this.phone) {
        this.alertMessage = 'Пожалуйста, введите имя и номер телефона.';
      } else if (!this.name) {
        this.alertMessage = 'Пожалуйста, введите имя.';
      } else if (!this.phone) {
        this.alertMessage = 'Пожалуйста, введите номер телефона.';
      } else if (!phonePattern.test(this.phone)) {
        this.alertMessage = 'Пожалуйста, введите корректный номер телефона.';
      } else {
        this.alertMessage = '';
        this.addContact();
      }
    },
    addContact() {
      axios.post('/addContact.php', {
        name: this.name,
        phone: this.phone
      }).then(() => {
        this.$emit('contact-added');
        this.name = '';
        this.phone = '';
      });
    }
  }
};
</script>
