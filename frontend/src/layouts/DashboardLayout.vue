<template>
  <v-layout>
    <AppNav />
    <AppAsideMenu />
    <v-main class="main">
      <v-container fluid>
        <slot></slot>
      </v-container>
    </v-main>
    <AppFooter />
  </v-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppNav from '@/layouts/Navbar.vue'
import AppAsideMenu from '@/layouts/Aside.vue'
import AppFooter from '@/layouts/Footer.vue'
export default defineComponent({
  name: 'DashboardLayout',
  components: {
    AppNav,
    AppAsideMenu,
    AppFooter
  }
})
</script>
<style scoped>
.main {
  background-color: #35353500;
}
</style>