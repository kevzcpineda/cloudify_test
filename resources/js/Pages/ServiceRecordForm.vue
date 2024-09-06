<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    serviceRecord: {
        type: Object,
        required: true,
    },
    employees: {
        type: Object,
        required: true,
    },
    departments: {
        type: Object,
        required: true,
    },
});
const serviceRecord = reactive({ ...props.serviceRecord });
const employees = reactive({ ...props.employees });
const departments = reactive({ ...props.departments });

const form = useForm({
    title: serviceRecord.title || null,
    start_date: serviceRecord.start_date || null,
    salary: serviceRecord.salary || null,
    employee_id: serviceRecord.employee_id || null,
    department_id: serviceRecord.department_id || null,
});

function submit() {
    if (serviceRecord.id) {
        router.put(`/service-record/${serviceRecord.id}`, form);
    } else {
        router.post("/service-record", form);
    }
}
</script>

<template>
    <AppLayout>
        <div class="flex">
            <Link
                v-if="serviceRecord.id"
                method="delete"
                :href="`/service-record/${serviceRecord.id}`"
                class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
            >
                Delete
            </Link>
        </div>

        <form @submit.prevent="submit">
            <div>
                <label
                    for="title"
                    class="block text-sm font-semibold leading-6 text-gray-900"
                >
                    Title</label
                >
                <div class="mt-2.5">
                    <input
                        v-model="form.title"
                        type="text"
                        name="title"
                        id="title"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                    <div v-if="form.errors.title" class="text-red-500">
                        {{ form.errors.title }}
                    </div>
                </div>
            </div>
            <div>
                <label
                    for="Start Date"
                    class="block text-sm font-semibold leading-6 text-gray-900"
                    >Start Date</label
                >
                <div class="mt-2.5">
                    <input
                        v-model="form.start_date"
                        type="date"
                        name="start_date"
                        id="start_date"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                    <div v-if="form.errors.start_date" class="text-red-500">
                        {{ form.errors.start_date }}
                    </div>
                </div>
            </div>
            <div>
                <label
                    for="salary"
                    class="block text-sm font-semibold leading-6 text-gray-900"
                    >Salary</label
                >
                <div class="mt-2.5">
                    <input
                        v-model="form.salary"
                        type="text"
                        name="salary"
                        id="salary"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                    <div v-if="form.errors.salary" class="text-red-500">
                        {{ form.errors.salary }}
                    </div>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label
                    for="employee"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Employee</label
                >
                <div class="mt-2">
                    <select
                        v-model="form.employee_id"
                        id="employee"
                        name="employee"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                    >
                        <option></option>
                        <option
                            v-for="employee in employees"
                            :key="employee.id"
                            :value="employee.id"
                        >
                            {{ employee.name }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label
                    for="department"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Department</label
                >
                <div class="mt-2">
                    <select
                        v-model="form.department_id"
                        id="department"
                        name="department"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                    >
                        <option></option>
                        <option
                            v-for="department in departments"
                            :key="department.id"
                            :value="department.id"
                        >
                            {{ department.name }}
                        </option>
                    </select>
                </div>
            </div>
            <button
                type="submit"
                :disabled="form.processing"
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Submit
            </button>
            <Link
                href="/service-record"
                class="text-sm font-semibold leading-6 text-gray-900"
            >
                Cancel
            </Link>
        </form>
    </AppLayout>
</template>
