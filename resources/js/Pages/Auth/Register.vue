<template>

    <Head :title="` || Register`" />
    <h1 class="text-center text-3xl font-bold text-gray-600 uppercase py-2">Register a new account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label for="name">Name</label>
                <input type="text" v-model="form.name">
            </div>

            <div class="mb-6">
                <label for="email">Email</label>
                <input type="email" v-model="form.email">
            </div>

            <div class="mb-6">
                <label for="name">Password</label>
                <input type="password" v-model="form.password">
            </div>

            <div class="mb-6">
                <label for="name">Confirm Password</label>
                <input type="password" v-model="form.password_confirmation">
            </div>

            <div>
                <p>Already a user? <a class="text-link" href="#">Login</a></p>
                <button class="btn w-full my-2 font-bold">Register</button>
            </div>

        </form>
    </div>


</template>

<script setup lang="ts">
    import { reactive } from 'vue'

    const form = reactive({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

    const submit = () => {
        console.log(form);
    }
</script>

<style scoped>

</style>