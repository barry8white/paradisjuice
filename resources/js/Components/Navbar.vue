<template>
<v-btn class="ma-2" variant="tonal" @click.stop="drawer = !drawer"><v-icon color="" icon="mdi-format-list-bulleted"></v-icon></v-btn>
<v-app>
    <v-navigation-drawer app permanent class="text-center" :width="150" v-model="drawer" temporary>
    <v-list dense nav>
        <Link href="/admin/orders">
            <v-list-item link :class="isOrder ? 'bg-light-green-lighten-4' : ''">
                <v-list-item-title item-title><h5>Commandes</h5></v-list-item-title>
            </v-list-item>
        </Link>
        <Link href="/admin/products">
            <v-list-item link :class="isProduct ? 'bg-light-green-lighten-4' : ''">
                <v-list-item-title><h5>Produits</h5></v-list-item-title>
            </v-list-item>
        </Link>
    </v-list>
    </v-navigation-drawer>

    <v-main>
    <v-container>
        <slot></slot>
    </v-container>
    </v-main>
</v-app>

</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    isOrder: Boolean,
    isProduct: Boolean
})

var drawer = ref(false)

</script>
<style>


</style>