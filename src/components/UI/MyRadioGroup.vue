<template>
    <v-radio-group v-model="answer">
            <v-radio 
                v-for="item in setItemsId" 
                :key="item.id" 
                :label="item.item"
                :value="item.id"
                @click="returnAnswer">
            </v-radio>
    </v-radio-group>
</template>

<script>
export default {
    props:{
        items: []
    },
    data: () =>({
        elements: [],
        asnwer,
    }),
    methods:{
        createElement(id, item){
            return {id, item};
        },
        returnAnswer(){
            this.$emit('answer', asnwer);
        }
    },
    computed:{
        setItemsId: function (){
            let counter = 0;
            this.items.forEach(element => {
                this.elements.push(this.createElement(counter, element))
                counter++;
            });
            return this.elements;
        }
    }
}
</script>