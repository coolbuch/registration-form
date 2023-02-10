<template>
  <v-form ref="form" lazy-validation>
    <v-row>
      <v-spacer />
      <v-col cols="12" md="8" xs="4" sm="6">
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
          counter
          maxlength="100"
          v-model="data.lastname"
          label="Введите отчество"
        ></v-text-field>
        <v-text-field
          :rules="[rules.required, rules.email]"
          v-model="data.email"
          label="Введите Email"
          required
        ></v-text-field>
        <v-row no-gutters>
          <v-col cols="12" md="4" xs="12" sm="12">
            <my-date-picker
              :maxDate="yesterday"
              v-model="data.date"
              label="Дата рождения"
            ></my-date-picker>
          </v-col>
          <v-spacer />

          <v-spacer />
          <v-col cols="12" md="4" xs="12" sm="12">
            <v-select
              v-model="data.group"
              label="Выберите группу"
              :items="groupArray"
            />
          </v-col>
        </v-row>
        <my-radio-group v-model="data.sex" :items="['М', 'Ж']"></my-radio-group>
        <v-checkbox v-model="data.enableSMS" label="Получать СМС уведомления" />
        <v-btn :loading="btnLoading" color="primary" @click="sendForm"
          >Отправить</v-btn
        >
      </v-col>
      <v-spacer />
    </v-row>
    <v-snackbar v-model="snackBar.status" :timeout="3000" :color="snackBar.type" >
      <div class="text-center"> {{snackBar.text}} </div>
    </v-snackbar>
  </v-form>
  
</template>

<script>
import MyDatePicker from "@/components/UI/MyDatePicker.vue";
import MyRadioGroup from "@/components/UI/MyRadioGroup.vue";
import axios from "@/plugins/axios";
export default {
  components: { MyDatePicker, MyRadioGroup },
  data: () => ({
    btnLoading: false,
    snackBar: {status: false, type: "success", text: "Успех"},
    groupArray: ["VIP", "Проблемные", "ОМС"],
    rules: {
      required: (value) => !!value || "Обязательно для заполнения",
      email: (value) => {
        const validationExpr =
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return validationExpr.test(value) || "Некорректный e-mail";
      },
    },
    yesterday: new Date(Date.now() - 1000 * 60 * 60 * 24)
      .toISOString()
      .substr(0, 10),
    data: {
      name: "1",
      surname: "1",
      lastname: "1",
      email: "1@aa.ru",
      date: "",
      sex: "",
      group: " ",
      enableSMS: true,
    },
    //
  }),
  methods: {
    sendForm() {
      if (this.$refs.form.validate()) {
        this.btnLoading = true;
        axios
          .post("/addrecord", this.data)
          .then((res) => {
            console.log(res);
            this.snackBar.status = true;
            this.snackBar.type = "success";
            this.snackBar.text = "Успешно";
            this.clearData();
          })
          .catch((rej) => {
            this.snackBar.status = true;
            this.snackBar.type = "error";
            this.snackBar.text = "Произошла ошибка";
            console.log(rej);
          })
          .finally(() => {
            this.btnLoading = false;
            this.$refs.form.reset();
            this.$refs.form.resetValidation()
          })
      }
    },
    clearData() {
      this.data.name = "";
      this.data.surname = "";
      this.data.lastname = "";
      this.data.email = "";
      this.data.date = "";
      this.data.sex = "";
      this.data.group = null;
      this.data.enableSMS = true;
    },
  },
};
</script>