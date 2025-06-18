<template>
  <v-container class="max-width-md">
    <v-card class="pa-6">
      <v-card-title class="text-h5 mb-6">Ajouter Produit</v-card-title>
      
      <v-form 
        @submit.prevent="handleSubmit"
         enctype="multipart/form-data"
      >
        <!-- Category Input -->
        <v-text-field
          v-model="formData.category"
          label="Category"
          
          variant="outlined"
          density="comfortable"
          class="mb-4"
        />

        <!-- Product Input -->
        <v-text-field
          v-model="formData.produit"
          label="Produit"
          
          variant="outlined"
          density="comfortable"
          class="mb-4"
        />

        <!-- Price Input -->
        <v-text-field
          v-model="formData.price"
          label="Prix"
          type="number"
          
          variant="outlined"
          density="comfortable"
          class="mb-4"
        />

        <!-- Image Input -->
        <v-file-input
          v-model="formData.image"
          label="Image"
          accept="image/*"
          
          variant="outlined"
          density="comfortable"
          prepend-icon="mdi-camera"
          class="mb-6"
          @change="handleFile"
        />

        <!-- Submit Button -->
        <v-btn 
          type="submit"
          color="success"
          class="w-full"
          :disabled="formData.processing"
        >
          Ajouter
        </v-btn>
      </v-form>
    </v-card>
  </v-container>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const formData = useForm({
  category: '',
  produit: '',
  price: 0,
  image: null
})

function handleFile(e) {
  formData.image = e.target.files[0]
}

function handleSubmit(){
  formData.post(route('productStoreFunction.store'),{
    forceFormData: true,
    onSuccess: () => {
      formData.reset()
    },
  })
}
</script>

<style scoped>
.v-card-title {
  word-break: normal;
}
</style>