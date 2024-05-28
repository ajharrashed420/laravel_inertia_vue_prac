<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                </div>
        
                <div class="space-x-6">
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