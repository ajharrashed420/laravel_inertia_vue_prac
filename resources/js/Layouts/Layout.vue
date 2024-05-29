<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" :class="{ 'bg-slate-700' : $page.component === 'Home'}"
                        class="nav-link">Home</Link>
                </div>



                <div v-if="$page.props.auth.user" class="space-x-6 flex items-center">

                    <img :src="$page.props.auth.user.avatar ? ('/storage/' + $page.props.auth.user.avatar) : '/storage/avatars/default.png'"
                        alt="avatar" class=" w-10 h-10 rounded-full border-2 border-slate-200">

                    <Link :href="route('dashboard')" class="font-bold nav-link"
                        :class="{ 'bg-slate-700' : $page.component === 'Dashboard'}">Dashboard</Link>
                    <Link :href="route('logout')" method="post" as="button" type="button" class="font-bold nav-link">
                    Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link :href="route('login')" class="font-bold nav-link"
                        :class="{ 'bg-slate-700' : $page.component === 'Auth/Login'}">Login</Link>
                    <Link :href="route('register')" class="font-bold nav-link"
                        :class="{ 'bg-slate-700' : $page.component === 'Auth/Register'}">Register</Link>
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