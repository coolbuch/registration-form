<template>
    <v-radio-group row v-model="answer">
            <v-radio 
                v-for="item in elements" 
                :key="item.id" 
                :label="item.item"
                :value="item.id"
                @click="returnAnswer">
            </v-radio>
    </v-radio-group>
</template>

<script>
export default {
    mounted(){
        this.setItemsId();
    },
    props:{
        items: [],
        value : String,
    },
    data: () =>({
        elements: [],
        answer: String,
    }),
    
    methods:{
        createElement(id, item){
            return {id, item};
        },
        returnAnswer(){
            this.$emit('input', this.items[this.answer]);
        },
        setItemsId(){
            let counter = 0;
            this.elements = [];
            this.items.forEach(element => {
                this.elements.push(this.createElement(counter, element))
                counter++;
            });
    },
    
}
}
</script>