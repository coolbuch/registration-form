<template>
  <v-form>
    <v-text-field v-model="name" label="Введите имя"></v-text-field>
    <v-text-field v-model="surname" label="Введите фамилию"></v-text-field>
    <v-text-field v-model="lastname" label="Введите отчество"></v-text-field>
    <v-text-field v-model="email" label="Введите Email"></v-text-field>
    <my-date-picker @changed="setDate" label="Дата рождения"></my-date-picker>
    <my-radio-group @changed="setRadio" :items="['М', 'Ж']"></my-radio-group>
    <v-select>
      
    </v-select>
  </v-form>
</template>

<script>
import MyDatePicker from "@/components/UI/MyDatePicker.vue";
import MyRadioGroup from "@/components/UI/MyRadioGroup.vue";

export default {
  components: { MyDatePicker, MyRadioGroup },
  data: () => ({
    name: "",
    surname : "",
    lastname : "",
    email: "",
    date: "",
    male : 0,
    //
  }),
  methods: {
    setRadio(data) {
      this.male = data;
    },
    setDate(data){
      this.date = data;
    }
  },
};
</script>