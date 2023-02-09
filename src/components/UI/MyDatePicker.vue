<template>
  <v-menu
    ref="menu"
    v-model="menu"
    :close-on-content-click="false"
    :return-value.sync="date"
    transition="scale-transition"
    offset-y
    min-width="auto"
  >
    <template v-slot:activator="{ on, attrs }">
      <v-text-field
        v-model="date"
        :label="label"
        readonly
        required
        v-bind="attrs"
        :rules="[v => !!v || 'Обязательно для заполнения']"
        v-on="on"
      ></v-text-field>
    </template>
    <v-date-picker :max="maxDate" color="primary" v-model="date" no-title scrollable>
      <v-spacer></v-spacer>
      <v-btn text @click="menu = false"> Cancel </v-btn>
      <v-btn text @click="setDate"> OK </v-btn>
    </v-date-picker>
  </v-menu>
</template>

<script>
export default {
  mounted() {
    this.setDate();
  },
  props: {
    label: String,
    value: String,
    maxDate: String,
  },
  data: () => ({
    date: "",
    menu: false,
  }),
  methods: {
    setDate() {
      this.$refs.menu.save(this.date);
      this.$emit("input", this.date);
    },
  },
};
</script>