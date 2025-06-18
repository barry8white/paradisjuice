<template>
    
    <v-app>
        <v-main>
            <v-container class="pa-0" fluid>
                <Card :cart="cartItems" :tnum="numberTab"></Card>
                <Header></Header>
                <h4 class="d-inline text-decoration-underline ">Table {{ numberTab }}</h4>
                <List :cat="prods" :selected="cartItems" @first="second"></List>
            </v-container>
        </v-main>
    </v-app>
</template>

<script setup>
import Card from '@/Components/Card.vue';
import Header from '@/Components/Header.vue';
import List from '@/Components/List.vue';

import { ref } from 'vue';

var props = defineProps({
    prods: Object,
    numberTab: Number
})



const cartItems = ref([]);

const second = (recievedValue) => {
    var addedItem = recievedValue
    var categoryNumber = addedItem.category
    var productNumber = addedItem.product
    var ItemToAdd = props.prods[categoryNumber].items[productNumber]
    const index = cartItems.value.findIndex(item => item.id === ItemToAdd.id)
    if (index >= 0) {
        cartItems.value.splice(index, 1)
    }else {
        cartItems.value.push(ItemToAdd)
    }
}

</script>

<style scoped>

</style>