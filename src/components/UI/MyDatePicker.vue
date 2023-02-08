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
        prepend-icon="mdi-calendar"
        readonly
        v-bind="attrs"
        v-on="on"
      ></v-text-field>
    </template>
    <v-date-picker color="primary" v-model="date" no-title scrollable >
      <v-spacer></v-spacer>
      <v-btn text  @click="menu = false"> Cancel </v-btn>
      <v-btn text  @click="setDate"> OK </v-btn>
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
  },
  data: () => ({
    date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
      .toISOString()
      .substr(0, 10),
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