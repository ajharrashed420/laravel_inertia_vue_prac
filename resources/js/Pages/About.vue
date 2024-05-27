<template>
    <div>
        <h1>Username: {{ user }}</h1>
    </div>
</template>

<script setup lang="ts">
    defineProps({
        user: String
    })

    import Layout from "../Layouts/Layout.vue";
    defineOptions({ layout: Layout });
</script>

<style scoped>

</style>