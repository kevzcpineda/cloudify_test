<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    department: {
        type: Object,
        required: true,
    },
});
const department = reactive({ ...props.department });

const form = useForm({
    name: department.name ? department.name : null,
});
console.log(department);
function submit() {
    if (department.id) {
        router.put(`/department/${department.id}`, form);
    } else {
        router.post("/department", form);
    }
}
</script>

<template>
    <AppLayout>
        <Link
            v-if="department.id"
            method="delete"
            :href="`/department/${department.id}`"
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
                    <div v-if="form.errors.name" class="text-red-500">
                        {{ form.errors.name }}
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
                href="/department"
                class="text-sm font-semibold leading-6 text-gray-900"
            >
                Cancel
            </Link>
        </form>
    </AppLayout>
</template>
