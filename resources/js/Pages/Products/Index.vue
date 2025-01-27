<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '../../Components/Pagination.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import DangerButton from '../../Components/DangerButton.vue';

const submitDelete = () => {
    const form = useForm();
    form.delete(route('products.destroy'));
};

defineProps({
    products: Object,
});

</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="flex justify-content-between">
                    <div></div>
                    <div>
                        <Link :href="route('products.create')" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add Product</Link>
                    </div>
                </div>
                <table id="" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="product in products.data"
                            :key="product.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ product.name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ product.category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ new Date(product.created_at).toLocaleString('en-US', { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', hour12: true }) }}
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <Link :href="route('products.edit',product.id)"><PrimaryButton>Edit</PrimaryButton></Link>
                                <form @submit.prevent="submitDelete" class="inline">
                                    <input type="hidden" id="product" v-model="product.id">
                                    <DangerButton type="submit">Delete</DangerButton>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Pass the pagination links as props to Pagination component -->
                <Pagination :links="products.links" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
