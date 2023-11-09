<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Table from "@/Components/Table.vue";
import { Head } from '@inertiajs/vue3';

defineProps({items: Array, appLogo: String, primary_color: String})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :appLogo="appLogo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white my-2.5 rounded-xl p-3 pb-3">
            <Table :items="items" :primary_color="primary_color"></Table>
        </div>
    </AuthenticatedLayout>
</template>
