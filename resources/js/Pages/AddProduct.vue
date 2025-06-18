<template>
    <Admin :isOrder="false" :isProduct="true">
        <AddProduct></AddProduct>
    </Admin>
</template>

<script setup>
import Admin from './Admin.vue';
import AddProduct from '@/Components/AddProduct.vue';

</script>

<style scoped>

</style>