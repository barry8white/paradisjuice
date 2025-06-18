<template>
  <v-btn icon class="fixed bottom-4 right-4 z-10 ma-4" color="green" @click="cartOpen = !cartOpen">
    <v-icon>mdi-cart</v-icon>
  </v-btn>
  <v-bottom-sheet v-model="cartOpen" inset>
    <v-card elevation="10" class="pa-3 overflow-y-auto mx-height">
      
      <div class="text-center text-grey" v-show="cart.length === 0">
        La Carte Est Vide
      </div>
      <v-list v-show="cart.length > 0">
        <form @submit.prevent="submitOrder">
          <v-list-item v-for="(item, i) in cart" :key="i" class="py-3 px-0 border-b-sm">
            <template v-slot:prepend>
              <v-avatar circle size="70">
                <v-img :src="`/storage/${item.file_path}`"></v-img>
              </v-avatar>
            </template>

            <v-list-item-title class="font-weight-bold">{{ item.produit }}</v-list-item-title>
            <v-list-item-subtitle>{{ item.price }} .00 DA x {{ quantities[i] }}</v-list-item-subtitle>
            <v-list-item-title>
              <h2>{{ item.price * quantities[i] }} .00 DA</h2>
            </v-list-item-title>
            
            <template v-slot:append>
              <div class="d-flex flex-column align-center mr-2">
                <v-number-input 
                  class="d-none" 
                  v-model="prodIds[i]" 
                  :value="item.id">
                </v-number-input>
                <v-select 
                  variant="outlined" 
                  :items="[1,2,3,4,5,6,7,8,9]" 
                  v-model="quantities[i]"
                  @update:modelValue="updateItemQuantity(i, $event)">
                </v-select>
              </div>
              <v-btn icon size="small" color="red" class="ml-2" @click="removeFromCart(i)">
                <v-icon>mdi-delete</v-icon>
              </v-btn>
            </template>
          </v-list-item>
          <v-btn color="green" type="submit" :disabled="form.processing || cart.length === 0">
            confirmer
          </v-btn>
        </form>
      </v-list>
    </v-card>
  </v-bottom-sheet>
</template>

<script setup>
import { ref, watch, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  cart: Array,
  tnum: Number
});

const cartOpen = ref(false);
const quantities = ref([]);
const prodIds = ref([]);

// Initialize quantities when cart changes
watch(() => props.cart, (newCart) => {
  quantities.value = newCart.map(() => 1);
  prodIds.value = newCart.map(item => item.id);
}, { immediate: true, deep: true });

// Update Ditems whenever quantities change
const Ditems = computed(() => {
  return props.cart.map((item, i) => ({
    product_id: item.id,
    quantity: quantities.value[i] || 1
  }));
});

const form = useForm({
  table_number: props.tnum,
  items: Ditems.value
});

// Update form items when Ditems changes
watch(Ditems, (newItems) => {
  form.items = newItems;
}, { deep: true });

function removeFromCart(index) {
  props.cart.splice(index, 1);
}

function updateItemQuantity(index, value) {
  quantities.value[index] = value;
}

function submitOrder() {
  // Ensure we have the latest quantities
  form.items = Ditems.value;
  
  console.log('Submitting order:', form.data());
  
  form.post(route('orderStore'), {
    forceFormData: true, // Important for file uploads if any
    onSuccess: () => {
      form.reset();
      props.cart.splice(0, props.cart.length); // Clear cart
    },
    onError: (errors) => {
      console.error('Order submission error:', errors);
    }
  });
}
</script>

<style scoped>
.mx-height {
  max-height: 60vh;
}

.quantity-btn {
  min-width: 30px;
  height: 30px;
}

.quantity-value {
  min-width: 30px;
}
</style>