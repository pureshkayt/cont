<template>
  <div class="contact-list d-flex justify-content-center">
    <div class="card">
      <h3 class="col-md-12">Список контактов</h3>
      <ul class="list-group">
        <li v-for="contact in contacts" :key="contact.id" class="list-group-item">
          <div class="names">
            <strong class="col-md-12">{{ contact.name }}<button class="btn" @click="deleteContact(contact.id)">×</button></strong><br />
            <div class="tel">{{ contact.phone }}</div>
          </div>

        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from '@/axiosConfig';
import '@/assets/styles/ContactList.scss';

export default {
  data() {
    return {
      contacts: []
    };
  },
  methods: {
    fetchContacts() {
      axios.get('/getContacts.php')
          .then(response => {
            this.contacts = response.data;
          });
    },
    deleteContact(id) {
      axios.post('/deleteContact.php', { id })
          .then(() => {
            this.fetchContacts();
          });
    }
  },
  created() {
    this.fetchContacts();
  }
};
</script>