<template>
  <v-app>
    <v-app-bar app color="primary"  dark>
      <v-app-bar-title>Регистрация клиента</v-app-bar-title>
      <v-spacer/>
      <v-btn v-if="page != 'records'" text>Все записи</v-btn>
      <v-btn v-if="page != 'home'" text>Регистрация</v-btn>
    </v-app-bar>
    <v-main>
      <v-container fluid >
              <registration-form ></registration-form>
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
    page: "home",
  }),
  methods:{
    
  }
};
</script>

<style lang="scss">
*{
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
</style>
