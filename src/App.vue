<template>
  <v-app>
    <v-app-bar app color="purple" dark>
      <v-app-bar-title>Titile</v-app-bar-title>
    </v-app-bar>
    <v-main>
      <v-container fluid>
        <v-form >
          <v-text-field label="Введите имя"></v-text-field>
          <v-text-field label="Введите фамилию"></v-text-field>
          <v-text-field label="Введите отчество"></v-text-field>
          <my-date-picker label="Дата рождения"></my-date-picker>
          <my-radio-group v-model="answer" :items="['М', 'Ж']"></my-radio-group>
        </v-form>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import MyDatePicker from "@/components/UI/MyDatePicker.vue"
import MyRadioGroup from "@/components/UI/MyRadioGroup.vue"
export default {
  name: "App",

  components: {MyDatePicker, MyRadioGroup},

  data: () => ({
    radio,
    //
  }),
};
</script>
