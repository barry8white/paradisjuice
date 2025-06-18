<script setup>
import { ref, onMounted } from 'vue'
</script>

<template>
  <v-container class="fill-height d-flex flex-column justify-center align-center text-center">
    <v-icon color="success" size="80">mdi-check-circle</v-icon>

    <h1 class="mt-4 text-h4 font-weight-bold">
      Commande passée avec succès !
    </h1>

    <p class="text-subtitle-1 mt-2">
      Veuillez patienter pendant que votre commande est en cours de préparation.
    </p>
  </v-container>
</template>

<style scoped>
.fill-height {
  min-height: 100vh;
}
</style>
