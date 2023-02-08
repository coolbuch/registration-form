<template>
  <v-app>
    <v-app-bar app color="primary"  dark>
      <v-app-bar-title>Регистрация клиента</v-app-bar-title>
    </v-app-bar>
    <v-main>
      <v-container fluid>
        <registration-form></registration-form>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import RegistrationForm from '@/components/RegistrationForm.vue';
export default {
  name: "App",

  components: {RegistrationForm},

  data: () => ({
   
  }),
  methods:{
    
  }
};
</script>
