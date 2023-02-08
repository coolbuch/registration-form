<template>
  <v-form>
    <v-text-field v-model="name" label="Введите имя"></v-text-field>
    <v-text-field v-model="surname" label="Введите фамилию"></v-text-field>
    <v-text-field v-model="lastname" label="Введите отчество"></v-text-field>
    <v-text-field v-model="email" label="Введите Email"></v-text-field>
    <my-date-picker v-model="date"  label="Дата рождения"></my-date-picker>
    <my-radio-group v-model="sex" :items="['М', 'Ж']"></my-radio-group>
    <v-select v-model="group" label="Выберите группу" :items="groupArray"/>
    <v-checkbox v-model="enableSMS" label="Получать СМС уведомления"/>
    <v-btn color="primary">Отправить</v-btn>
  </v-form>
</template>

<script>
import MyDatePicker from "@/components/UI/MyDatePicker.vue";
import MyRadioGroup from "@/components/UI/MyRadioGroup.vue";

export default {
  //@changed="setDate"
  components: { MyDatePicker, MyRadioGroup },
  data: () => ({
    groupArray : ['VIP', 'Проблемные', 'ОМС'],

    name: "",
    surname : "",
    lastname : "",
    email: "",
    date: "",
    sex : "",
    group: "",
    enableSMS: false,
    //
  }),
  methods: {
    
  },
};
</script>