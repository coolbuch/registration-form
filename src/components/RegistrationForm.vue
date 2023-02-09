<template>
  <v-form ref="form" 
    lazy-validation>
    <v-text-field
      :rules="[rules.required]"
      counter
      maxlength="100"
      v-model="data.name"
      label="Введите имя"
      required
    ></v-text-field>
    <v-text-field
      :rules="[rules.required]"
      counter
      maxlength="100"
      v-model="data.surname"
      label="Введите фамилию"
      required
    ></v-text-field>
    <v-text-field
      :rules="[rules.required]"
      counter
      maxlength="100"
      v-model="data.lastname"
      label="Введите отчество"
      required
    ></v-text-field>
    <v-text-field
      :rules="[rules.required, rules.email]"
      v-model="data.email"
      label="Введите Email"
      required
    ></v-text-field>
    <my-date-picker :maxDate="yesterday" v-model="data.date" label="Дата рождения"></my-date-picker>
    <my-radio-group v-model="data.sex" :items="['М', 'Ж']"></my-radio-group>
    <v-select v-model="data.group" label="Выберите группу" :items="groupArray" />
    <v-checkbox v-model="data.enableSMS" label="Получать СМС уведомления" />
    <v-btn color="primary" @click="sendForm">Отправить</v-btn>
  </v-form>
</template>

<script>
import MyDatePicker from "@/components/UI/MyDatePicker.vue";
import MyRadioGroup from "@/components/UI/MyRadioGroup.vue";
import axios from "@/plugins/axios"
export default {
  components: { MyDatePicker, MyRadioGroup },
  data: () => ({
    groupArray: ["VIP", "Проблемные", "ОМС"],
    rules: {
      required: (value) => !!value || "Обязательно для заполнения",
      email: value => {
        const validationExpr = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return validationExpr.test(value) || 'Некорректный e-mail'
      },
    },
    yesterday: new Date(Date.now() - 1000*60*60*24).toISOString().substr(0, 10),
    data: {
      name: "",
      surname: "",
      lastname: "",
      email: "",
      date: "",
      sex: "",
      group: null,
      enableSMS: true,
    }
    //
  }),
  methods: {
    sendForm(){
      if(this.$refs.form.validate()){
        axios.post('/saveRecord', this.data)
        .then(res => {console.log(res)})
        .catch(rej => {console.log(rej)});
      }
      
    }
  },
};
</script>