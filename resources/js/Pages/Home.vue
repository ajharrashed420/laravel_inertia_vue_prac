<template>
    <Head :title="` || ${$page.component}`"/>
    <h1 class="text-2xl text-red-500"> {{ $page.props.auth.user }} </h1>
</template>

<script setup lang="ts">
</script>

<style scoped>

</style>