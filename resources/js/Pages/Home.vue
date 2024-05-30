<template>

    <Head :title="` || ${$page.component}`" />

    <h1>All Users</h1>
    <div class="flex justify-end mb-4">
        <div class="w-1/4">
            <input type="search" placeholder="Search" v-model="search" />
        </div>
    </div>
    <table>
        <thead>
            <tr class="bg-slate-300">
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th v-if="can.delete_user">Delete</th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="user in users.data" :key="user.id">
                <td>{{ user.id }}</td>
                <td class="flex  justify-center">
                    <img :src="user.avatar ? ('storage/'+ user.avatar) : 'storage/avatars/default.png'" alt="avatar"
                        class="avatar">
                </td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ getDate(user.created_at) }}</td>
                <td v-if="can.delete_user">
                    <button @click="deleteUser(user.id)" class="rounded-full bg-red-500 h-5 w-5"></button>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- pagination links -->
    <div>
        <PaginationLinks :paginator="users" />
    </div>
</template>

<script setup lang="ts">
    import PaginationLinks from "./Components/PaginationLinks.vue";
    import { ref, watch } from "vue";
    import { router, useForm } from "@inertiajs/vue3";
    import { debounce } from "lodash";
    
    const props = defineProps({
        users: Object,
        searchTerm: String,
        can: Object,
    });

    const search = ref(props.searchTerm);

    watch(search, debounce((q) => router.get("/", { search: q }, {preserveState: true}), 1000));

    //Format Date
    const getDate = (date) =>
        new Date(date).toLocaleDateString("en-us", {
            year: "numeric",
            month: "long",
            day: "numeric",
        });

        const form = useForm({});

        const deleteUser = (id) => {
            if (confirm("Are you sure you want to move this to trash")) {
                form.delete(route('delete',{id:id}), {
                    preserveScroll: true,
                });
            }
        };

</script>

<style scoped>

</style>