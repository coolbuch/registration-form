<template>
  <v-app>
    <v-app-bar app color="purple" dark>
      <v-app-bar-title>AAA</v-app-bar-title>
    </v-app-bar>
    <v-main>
      <v-container fluid>
        <v-form>
          <v-text-field title="Введите имя"></v-text-field>
          <v-date-picker color="purple lighten-4"></v-date-picker>
        </v-form>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",

  components: {},

  data: () => ({
    //
  }),
};
</script>
