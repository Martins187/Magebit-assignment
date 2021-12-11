<template>
    <router-view />
</template>

<script setup>
    import { computed } from 'vue'
    import Index from '@/views/Index.vue'
    import { useRoute } from 'vue-router';

    const currentRoute = computed(() => {
      return useRoute().name
    })
    
</script>
