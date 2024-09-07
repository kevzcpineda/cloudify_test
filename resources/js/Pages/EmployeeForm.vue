<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    employee: {
        type: Object,
        required: true,
    },
    errors: Object,
});
const employee = reactive({ ...props.employee });

const form = useForm({
    name: employee.name ? employee.name : null,
    address: employee.address ? employee.address : null,
    gender: employee.gender ? employee.gender : null,
});

function submit() {
    if (employee.id) {
        router.put(`/${employee.id}`, form);
    } else {
        router.post("/", form);
    }
}
</script>

<template>
    <AppLayout>
        <Link
            v-if="employee.id"
            method="delete"
            :href="`/${employee.id}`"
            class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
        >
            Delete
        </Link>
        <form @submit.prevent="submit">
            <div>
                <label
                    for="name"
                    class="block text-sm font-semibold leading-6 text-gray-900"
                >
                    Name</label
                >
                <div class="mt-2.5">
                    <input
                        v-model="form.name"
                        type="text"
                        name="name"
                        id="name"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                    <div v-if="errors.name" class="text-red-500">
                        {{ errors.name }}
                    </div>
                </div>
            </div>
            <div>
                <label
                    for="address"
                    class="block text-sm font-semibold leading-6 text-gray-900"
                    >Address</label
                >
                <div class="mt-2.5">
                    <input
                        v-model="form.address"
                        type="text"
                        name="address"
                        id="address"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                    <div v-if="errors.address" class="text-red-500">
                        {{ errors.address }}
                    </div>
                </div>
            </div>
            <div>
                <label
                    for="gender"
                    class="block text-sm font-semibold leading-6 text-gray-900"
                    >Gender</label
                >
                <div class="mt-2.5">
                    <input
                        v-model="form.gender"
                        type="text"
                        name="gender"
                        id="gender"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                    <div v-if="errors.gender" class="text-red-500">
                        {{ errors.gender }}
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
                href="/"
                class="text-sm font-semibold leading-6 text-gray-900"
            >
                Cancel
            </Link>
        </form>
    </AppLayout>
</template>
