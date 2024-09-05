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
});
const serviceRecord = reactive({ ...props.serviceRecord });

const form = useForm({
    title: serviceRecord.title ? serviceRecord.title : null,
    start_date: serviceRecord.start_date ? serviceRecord.start_date : null,
    salary: serviceRecord.salary ? serviceRecord.salary : null,
});
console.log(serviceRecord);
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
