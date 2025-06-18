<template>
    <v-app>
        <v-main>
            <v-container class="pa-0" fluid>
                <Header></Header>
                
                <Navbar :isOrder="isOrder" :isProduct="isProduct">
                    <slot></slot>
                </Navbar>
            </v-container>
        </v-main>
    </v-app>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Navbar from '@/Components/Navbar.vue';


defineProps({
    isOrder: Boolean,
    isProduct: Boolean
})


</script>

<style scoped>

</style>