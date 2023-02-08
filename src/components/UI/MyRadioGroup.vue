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
        items: []
    },
    data: () =>({
        elements: [],
        answer: Number,
    }),
    
    methods:{
        createElement(id, item){
            return {id, item};
        },
        returnAnswer(){
            this.$emit('changed', this.answer);
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