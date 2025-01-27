<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import  DangerButton  from '@/Components/DangerButton.vue';
import  PrimaryButton  from '@/Components/PrimaryButton.vue';
import  InputError  from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
const form = useForm({
    name: '',
    category: '',
    description: '',
});

const submit = () => {
    form.post(route('products.store'));
};
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Product</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <form @submit.prevent="submit" class="max-w-sm mx-auto">
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="name" id="name" v-model="form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Name" required />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="mb-5">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <input type="text" id="category" v-model="form.category"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Category" required />
                        <InputError class="mt-2" :message="form.errors.category" />
                    </div>
                    <div class="max-w-sm mx-auto">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Product Description"  v-model="form.description" ></textarea>
                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>
                    <PrimaryButton type="submit" class="mr-2 mt-2">Submit</PrimaryButton>
                    <Link :href="route('products')"><DangerButton>Cancel</DangerButton></Link>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
