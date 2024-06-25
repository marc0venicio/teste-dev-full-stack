<template>
  <div>
    <v-app-bar class="text-white" color="deepteal600" elevation="0" flat app>
      <template v-slot:prepend>
        <v-app-bar-nav-icon
        flat
          aria-label="button-drawer"
          color="white"
          @click="storeLayout.drawer = !storeLayout.drawer"
        />
        <!-- <v-img class="ml-1" width="150" src="/images/LOGO_BLANCO.webp" alt="Logo-control-unity" /> -->
      </template>
      <v-spacer />
      <span class="pr-5 font-weight-medium text-white text-md-body-1">
        Bem vindo(a) <br/>
      </span>
    </v-app-bar>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
// Store
import { useLayoutStore } from '@/stores'
// Initialization Store
const storeLayout = useLayoutStore()
// Const
const nameProfile = ref<string>('Name user')
</script>
