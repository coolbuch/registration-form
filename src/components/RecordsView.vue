<template>
    <v-container fluid >
        <v-col cols='12' md = "12" sm="12" xs="4"> 
            <v-spacer/>
            <v-data-table text color="primary"
            :headers="headers"
            :items="allRecords"
            :loading="loading">
                
            </v-data-table>
            <v-spacer/>
        </v-col>
    </v-container>
</template>

<script>
import axios from "@/plugins/axios";
export default {
    data: () => ({
        loading: false,
        headers: [
            {value: 'surname',  text: 'Фамилия',},
            {value: 'name', text: 'Имя', sortalbe: true},
            {value: 'lastname', text: 'Отчество',},
            {value: 'email', text: 'E-mail', },
            {value: 'sex', text : 'Пол', },
            {value: 'date', text: 'Дата рождения', },
            {value: 'group', text: 'Группа', },
            {value: 'enableSMS', text: 'СМС-уведомления'},
        ],
        allRecords: [],
    }),
    mounted(){
        this.$emit("titleChange", "Записи");
        this.loading = true;
        axios.get('/records')
        .then(res => {
            console.log(res);
            this.allRecords = res.data;
        })
        .catch(rej => {console.log(rej)})
        .finally(() =>{
            this.loading = false;
        })
    }
}
</script>