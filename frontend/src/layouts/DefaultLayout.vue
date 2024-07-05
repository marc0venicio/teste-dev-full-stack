<template>
  <v-layout>
    <v-main class="main">
      <slot></slot>
    </v-main>
  </v-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
export default defineComponent({
  name: 'DefaultLayout'
})
</script>
<style scoped>
.main {
  background-color: #35353500;
}
</style>