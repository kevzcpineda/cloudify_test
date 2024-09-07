<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    departments: Object,
});

const search = ref("");

function searchDeparments() {
    router.get("/department", { search: search.value });
}
</script>

<template>
    <AppLayout>
        <div class="flex justify-between content-center mb-10">
            <h1 class="text-2xl font-bold">Departments</h1>
            <form @submit.prevent="searchDeparments">
                <input v-model="search" type="text" placeholder="Search " />
                <button type="submit">Search</button>
            </form>
            <Link
                href="/department/create"
                as="button"
                type="button"
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >Create
            </Link>
        </div>

        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="department in departments"
                        :key="department.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t">
                            <Link
                                :href="`/department/${department.id}/edit`"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{ department.name }}
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
