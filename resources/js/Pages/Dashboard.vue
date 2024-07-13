<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    'contacts': Array,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <v-data-table
                        :headers="headers"
                        :items="contacts"
                        class="elevation-1"
                        hide-default-footer
                        :mobile-breakpoint="600"
                    >
                        <template v-slot:top>
                            <v-toolbar flat>
                                <v-toolbar-title>Contacts</v-toolbar-title>
                                <v-divider class="mx-4" inset vertical></v-divider>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                        </template>
                    </v-data-table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
