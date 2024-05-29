<template>

    <Head :title="` || Register`" />
    <h1 class="text-center text-3xl font-bold text-gray-600 uppercase py-2">Register a new account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <!-- Upload Avatar -->
            <div class="grid place-items-center my-5">
                <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                    <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input type="file" id="avatar" @input="change" hidden>
                    <img :src="form.preview ?? 'storage/avatars/default.png'" alt="" class="object-cover w-28 h-28">
                    <small>{{ form.errors.avatar }}</small>
                </div>
            </div>

            <TextInput name="name" v-model="form.name" :message="form.errors.name" />

            <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email" />

            <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password" />

            <TextInput name="confirm password" type="password" v-model="form.password_confirmation" />

            <div>
                <p>Already a user?
                    <Link class="text-link" :href="route('login')">Login</Link>
                </p>
                <button class="btn w-full my-2 font-bold" :disabled="form.processing">Register</button>
            </div>

        </form>
    </div>


</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import TextInput from "../Components/TextInput.vue";

const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        avatar: null,
        preview: null,
    });

    const change = (e) => {
        form.avatar = e.target.files[0];
        form.preview = URL.createObjectURL(e.target.files[0]);
    }

const submit = () => {
    form.post(route('register'), {
        onError: () => form.reset("password", "password_confirmation"),
    });
}
</script>

<style scoped>

</style>