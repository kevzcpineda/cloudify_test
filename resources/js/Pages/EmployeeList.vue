<script setup>
import { onMounted, ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import { reactive } from "vue";

const props = defineProps({
    employees: Object,
    deparments: Object,
});
const deparments = reactive({ ...props.deparments });

const search = ref("");
const departmentId = ref("");

function searchEmployees() {
    router.get("/", { search: search.value, departmentId: departmentId.value });
}
// function filterDepartment() {
//     router.get("/", { departmentId: departmentId.value });
// }
onMounted(() => {
    console.log(props.employees);
});
</script>

<template>
    <AppLayout>
        <div class="flex justify-between content-center mb-10">
            <h1 class="text-2xl font-bold">Employee</h1>
            <form @submit.prevent="searchEmployees">
                <input
                    v-model="search"
                    type="text"
                    placeholder="Search employees name"
                />
                <button type="submit">Search</button>
            </form>

            <div class="mt-2">
                <form @submit.prevent="searchEmployees">
                    <select
                        v-model="departmentId"
                        id="department"
                        name="department"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                    >
                        <option></option>
                        <option
                            v-for="deparment in deparments"
                            :key="deparment.id"
                            :value="deparment.id"
                        >
                            {{ deparment.name }}
                        </option>
                    </select>
                    <button type="submit">Filter</button>
                </form>
            </div>
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
                        <th class="pb-4 pt-6 px-6">Department</th>
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
                                :href="`/${employee.id}/edit`"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{ employee.name }}
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link
                                :href="`/${employee.id}/edit`"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{ employee.address }}
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link
                                :href="`/${employee.id}/edit`"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{ employee.gender }}
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link
                                :href="`/${employee.id}/edit`"
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                {{
                                    employee?.latest_service_record?.department
                                        ?.name
                                }}
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
