<template>
    <v-list class="bg-light-grey-lighten-3">
        <div v-for="(cate, i) in cat">
            <v-list-group :value="cate.name">
                <!-- List Title -->
                <template v-slot:activator="{ props }">
                    <v-list-item v-bind="props" :title="cate.name" class="text-h6 font-weight-bold"></v-list-item>
                </template>
                <!-- List Title -->

                <!-- List Items -->
                <v-list-item v-for="(item, j) in cate.items">
                    <template v-slot:prepend>
                        <v-avatar circle size="70">
                            <v-img :src="`/storage/${item.file_path}`"></v-img>
                        </v-avatar>
                    </template>
                    <v-list-item-title>{{ item.produit }}</v-list-item-title>
                    <v-list-item-subtitle>{{ item.price }} .00 DA</v-list-item-subtitle>
                    <template v-slot:append>
                        <v-btn variant="tonal" :color="isSelected(item) ? 'red' : 'green'" size="small" @click="addToCard(item, i,j)">
                            {{ isSelected(item) ? 'Supprimer' : 'Ajouter' }}
                        </v-btn>
                    </template>
                </v-list-item>
                <!-- List Items -->
            </v-list-group>
            <v-divider></v-divider>
        </div>
    </v-list>
</template>

<script setup>

var props = defineProps({
    cat: Array,
    selected: Array
})

var emit = defineEmits(['first']);

function addToCard(item, category, product){
    var AddedItem = {item: item, category: category, product: product}
    emit('first', AddedItem)
}

var vare = props.selected

function isSelected(promp){
    return vare.some(item => item.id === promp.id)
}



</script>

<style>

</style>