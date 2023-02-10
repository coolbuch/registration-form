<template>
  <v-app>
    <v-app-bar app color="primary"  dark>
      <v-app-bar-title>{{title}}</v-app-bar-title>
      <v-spacer/>
      <v-btn to="/records" text v-if="title === 'Регистрация'" >Все записи</v-btn>
      <v-btn to="/" text v-if="title === 'Записи'" >Регистрация</v-btn>
    </v-app-bar>
    <v-main>
      <v-container fluid >
            <router-view @titleChange="(e) => {title = e}">
            </router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",

  components: {},

  data: () => ({
    title: "",
  }),
  methods:{
    
  },
  mounted(){
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
