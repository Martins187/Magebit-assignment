<template>
    <router-view />
</template>

<script setup>
    import Index from '@/views/Index.vue'
    import { useRoute } from 'vue-router'
    import { computed } from 'vue'

    const currentRoute = computed(() => {
      return useRoute().name
    })
    
</script>
