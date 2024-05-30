<template>
    <div>
        <p v-if="$page.props.flash.great" class="p-4 bg-green-300">{{ $page.props.flash.great }}</p>
        <h1 class="">Welcome back, {{ $page.props.auth.user.name }}</h1>
    </div>
</template>

<script setup lang="ts">

</script>

<style scoped>

</style>