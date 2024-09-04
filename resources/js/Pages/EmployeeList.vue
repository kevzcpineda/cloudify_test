<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    employees: Object,
});
</script>

<template>
    <AppLayout>
        <div class="flex justify-between content-center mb-10">
            <h1 class="text-2xl font-bold">Employee</h1>
            <Link
                href="/create"
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
                        <th class="pb-4 pt-6 px-6">Address</th>
                        <th class="pb-4 pt-6 px-6">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="employee in employees"
                        :key="employee.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t">
                            <Link
                                href="/{{employee.id}}/edit"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{ employee.name }}
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link
                                href="/{{employee.id}}/edit"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{ employee.address }}
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link
                                href="/{{employee.id}}/edit"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{ employee.gender }}
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
