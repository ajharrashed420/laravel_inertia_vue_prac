<template>

    <Head :title="` || Register`" />
    <h1 class="text-center text-3xl font-bold text-gray-600 uppercase py-2">Register a new account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label for="name">Name</label>
                <input type="text" v-model="form.name">
                <small>{{ form.errors.name }}</small>
            </div>

            <div class="mb-6">
                <label for="email">Email</label>
                <input type="email" v-model="form.email">
                <small>{{ form.errors.email }}</small>
            </div>

            <div class="mb-6">
                <label for="name">Password</label>
                <input type="password" v-model="form.password">
                <small>{{ form.errors.password }}</small>
            </div>

            <div class="mb-6">
                <label for="name">Confirm Password</label>
                <input type="password" v-model="form.password_confirmation">
            </div>

            <div>
                <p>Already a user? <a class="text-link" href="#">Login</a></p>
                <button class="btn w-full my-2 font-bold" :disabled="form.processing">Register</button>
            </div>

        </form>
    </div>


</template>

<script setup lang="ts">
    import { reactive } from 'vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

const submit = () => {
    form.post(route('register'), {
        onError: () => form.reset("password", "password_confirmation"),
    });
}
</script>

<style scoped>

</style>