<template>
    <Admin :isOrder="true" :isProduct="false">
      <v-container class="text-center elevation-2 bg-grey-lighten-5 rounded">
          <v-row>
              <v-col cols="3">Date</v-col>
              <v-col cols="1">N°</v-col>
              <v-col cols="5">Order</v-col>
              <v-col cols="3">Action</v-col>
          </v-row>
          <v-divider></v-divider>
          <v-row class="my-1" v-for="order in orders">
            <v-col cols="3">{{formatDate(order.created_at)}}</v-col>
            <v-col cols="1">{{ order.Table_Number }}</v-col>
            <v-col cols="5">
              <span v-for="item in order.items">
                {{ item.product.produit }}
                <span class="font-weight-black">x {{ item.quantity }}</span><br>
              </span>
            </v-col>
            <v-col cols="3">
              <v-btn density="compact" color="blue" variant="outlined" v-if="order.status === 'pending'" @click="changeStatus(order.id)">En Cours</v-btn>
              <v-btn density="compact" color="green" v-else disabled="">Livré</v-btn>
            </v-col>
          <v-divider></v-divider>
          </v-row>
      </v-container>
  </Admin>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import axios from 'axios';

import Admin from './Admin.vue';

const orders = ref([])
const isLoading = ref(false)
const error = ref(null);
let pollInterval = null;

const fetchData = async () => {
  try {
    isLoading.value = true;
    const response = await axios.get('/Api/orders');
    orders.value = response.data;
  } catch (err) {
    error.value = err.response?.data?.message || 'Failed to fetch data';
  } finally {
    isLoading.value = false;
  }
};

const startPolling = (interval = 2000) => {
  fetchData(); // Initial fetch
  pollInterval = setInterval(fetchData, interval); // Poll every 5 seconds
};

const stopPolling = () => {
  if (pollInterval) {
    clearInterval(pollInterval);
    pollInterval = null;
  }
};

onMounted(() => {
  startPolling();
});

onUnmounted(() => {
  stopPolling(); // Clean up when component unmounts
});

const formatDate = (isoString) => {
  const date = new Date(isoString);
  return date.toLocaleString('en-GB', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
  });
};

function changeStatus(id){
  router.patch(`/admin/orders/${id}/`, {
    status: 'Completed',
  })
}

</script>

<style scoped>

</style>