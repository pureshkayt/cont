<template>
  <div id="app">
    <AddContactForm @contact-added="refreshContacts" />
    <ContactList ref="contactList" />
  </div>
</template>

<script>
import AddContactForm from './components/AddContactForm.vue';
import ContactList from './components/ContactList.vue';

export default {
  components: {
    AddContactForm,
    ContactList
  },
  methods: {
    refreshContacts() {
      this.$refs.contactList.fetchContacts();
    }
  }
};
</script>
