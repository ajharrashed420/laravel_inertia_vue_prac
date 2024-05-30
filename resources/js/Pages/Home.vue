<template>

    <Head :title="` || ${$page.component}`" />

    <h1>All Users</h1>
    <table>
        <thead>
            <tr class="bg-slate-300">
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
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
    defineProps({
        users: Object,
    });

    //Format Date
    const getDate = (date) =>
        new Date(date).toLocaleDateString("en-us", {
            year: "numeric",
            month: "long",
            day: "numeric",
        });
</script>

<style scoped>

</style>