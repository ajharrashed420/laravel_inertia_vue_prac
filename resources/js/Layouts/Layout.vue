<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                </div>
                
                <div v-if="$page.props.auth.user">
                    <Link :href="route('logout')" method="post" as="button" type="button" class="font-bold">Logout</Link> 
                </div>
                <div v-else class="space-x-6">
                    <Link :href="route('login')" class="font-bold">Login</Link> 
                    <Link :href="route('register')" class="font-bold">Register</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>



<script setup lang="ts">
</script>

<style scoped>

</style>