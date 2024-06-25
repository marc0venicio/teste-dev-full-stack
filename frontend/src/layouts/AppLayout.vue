<template>
  <component :is="currentLayout">
    <router-view />
  </component>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { useRoute } from 'vue-router';
const route = useRoute();
const currentLayout = computed(() => {
  return route.meta.layout ? `${route.meta.layout}Layout` : 'DefaultLayout';
});

</script>
