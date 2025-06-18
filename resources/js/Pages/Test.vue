<template>
  <h4 class="text-red-darken-4">{{ Categories }}</h4>
  <h4>{{ prods }}</h4>
</template>

<script setup>
import { ref } from 'vue';
defineProps({
  prods: Object
})


const lunchItems = ref([
{
    id: 1,
    name: 'Daikon Rice Cakes',
    price: 16,
    image: 'https://cdn.usegalileo.ai/sdxl10/c34f8586-f49a-443e-8768-f57aafeb47e5.png'
},
{
    id: 2,
    name: 'Imperial Rolls',
    price: 15,
    image: 'https://cdn.usegalileo.ai/sdxl10/8a499e90-3144-4ed8-9af4-d0b41582ab12.png'
},
{
    id: 3,
    name: 'Crispy Vegetarian Rolls',
    price: 14,
    image: 'https://cdn.usegalileo.ai/sdxl10/a97ab858-bcd2-4b25-8944-38030eb4c8a4.png'
}
]);

const dinnerItems = ref([
{
    id: 4,
    name: 'Dish 1',
    price: 20,
    image: 'https://cdn.usegalileo.ai/sdxl10/53e89331-e8d7-4aff-bf1d-fdb644e93cb4.png'
},
{
    id: 5,
    name: 'Dish 2',
    price: 22,
    image: 'https://cdn.usegalileo.ai/sdxl10/8b8a3201-decb-4925-84db-5ed9f19c2902.png'
},
{
    id: 6,
    name: 'Dish 3',
    price: 18,
    image: 'https://cdn.usegalileo.ai/sdxl10/3a491420-85a0-43cd-a5c4-023742993528.png'
}
]);

const togoItems = ref([
{
    id: 7,
    name: 'Togo 1',
    price: 10,
    image: 'https://cdn.usegalileo.ai/sdxl10/c835cdd2-eff8-4c3b-ab70-84c20294f57a.png'
},
{
    id: 8,
    name: 'Togo 2',
    price: 12,
    image: 'https://cdn.usegalileo.ai/sdxl10/8878734a-2ad9-495b-9c72-5fd2329b5549.png'
},
{
    id: 9,
    name: 'Togo 3',
    price: 14,
    image: 'https://cdn.usegalileo.ai/sdxl10/dbcbcf0f-c446-4cdf-bf8f-85b2658692f7.png'
}
]);

const cocktailItems = ref([
{
    id: 10,
    name: 'Cocktail 1',
    price: 12,
    image: 'https://cdn.usegalileo.ai/sdxl10/f30373fb-6c1a-4460-835d-f1e0d34200fb.png'
},
{
    id: 11,
    name: 'Cocktail 2',
    price: 14,
    image: 'https://cdn.usegalileo.ai/sdxl10/dc21253b-04ca-4c2b-b5af-0bfbba5bb145.png'
},
{
    id: 12,
    name: 'Cocktail 3',
    price: 16,
    image: 'https://cdn.usegalileo.ai/sdxl10/4a13050a-fa17-4a11-9297-53d2ec5b5a7b.png'
}
]);

const wineItems = ref([
{
    id: 13,
    name: 'Wine 1',
    price: 30,
    image: 'https://cdn.usegalileo.ai/sdxl10/7932ca84-3639-4f47-9065-623de192c1dc.png'
},
{
    id: 14,
    name: 'Wine 2',
    price: 32,
    image: 'https://cdn.usegalileo.ai/sdxl10/186754cf-5a19-4664-a780-5c940917ed37.png'
},
{
    id: 15,
    name: 'Wine 3',
    price: 28,
    image: 'https://cdn.usegalileo.ai/sdxl10/fb422d7b-dd93-4f48-8304-4441ed45181f.png'
}
]);

var Categories = [
    {name: "lunch", items: lunchItems},
    {name: "dinner", items: dinnerItems},
    {name: "togo", items: togoItems},
    {name: "cocktail", items: cocktailItems},
    {name: "wine", items: wineItems},
]

</script>

<style lang="scss" scoped>

</style>