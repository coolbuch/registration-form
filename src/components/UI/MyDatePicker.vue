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
            color="purple"
            :label="label"  
            prepend-icon="mdi-calendar"
            readonly
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker
          v-model="date"
          no-title
          scrollable
          color = "purple"
        >
          <v-spacer></v-spacer>
          <v-btn
            text
            color="purple"
            @click="menu = false"
          >
            Cancel
          </v-btn>
          <v-btn
            text
            color="purple"
            @click="setDate"
          >
            OK
          </v-btn>
        </v-date-picker>
      </v-menu>
</template>

<script>
export default {
    mounted(){
      this.setDate();
    },
    props: {
        label: String,
    },
    data: () => ({
      date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
      menu: false,
    }),
    methods:{
      setDate(){
        this.$refs.menu.save(this.date);
        this.$emit('changed', this.date)
      }
    }
}
</script>