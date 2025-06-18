<template>
    <Admin :isOrder="false" :isProduct="true">
        <Link href="addProduct">
            <v-btn variant="elevated" color="light-green-lighten-1">
                Ajouter Produit
            </v-btn>
        </Link>
        <AdminList :cat="prods"></AdminList>
    </Admin>
</template>

<script setup>
import AdminList from '@/Components/AdminList.vue';
import Admin from './Admin.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    prods: Object
})


</script>

<style scoped>

</style>