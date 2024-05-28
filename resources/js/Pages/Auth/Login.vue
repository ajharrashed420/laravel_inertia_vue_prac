<template>

    <Head :title="` || Login`" />
    <h1 class="text-center text-3xl font-bold text-gray-600 uppercase py-2">Login your account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            
            <TextInput
             name="email" 
             type="email" 
             v-model="form.email" 
             :message="form.errors.email" 
             />

            <TextInput
             name="password" 
             type="password" 
             v-model="form.password" 
             :message="form.errors.password" 
             />
            
            <div class="flex justify-between my-2">
                <!-- Remember Section -->
                <div>
                    <div class="flex gap-2 items-center">
                        <input id="remember" type="checkbox" v-model="form.remember">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <!-- Register Account Section -->
                <div>
                    <div>Need an account? <Link class="text-link" :href="route('register')">Register</Link></div>
                </div>
            </div>
            <button class="btn w-full my-2 font-bold" :disabled="form.processing">Login</button>

        </form>
    </div>


</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import TextInput from "../Components/TextInput.vue";

const form = useForm({
        email: null,
        password: null,
        remember: null,
    });

const submit = () => {
    form.post(route('login'), {
        onError: () => form.reset("password", ),
    });
}
</script>

<style scoped>

</style>