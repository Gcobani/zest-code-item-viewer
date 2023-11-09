<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Items</h1>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-0">Name</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Added By</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Added At</th>
                            <th scope="col" class="px-3 py-3 text-right text-xs font-medium uppercase tracking-wide text-gray-500">Action</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="item in items" :key="item.id">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ item.name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ item.createdBy }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ item.created_at }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <button type="button" @click="remove(item.id)" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Remove</button>
                            </td>
                        </tr>
                        <tr v-if="isAdding">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="itemName">
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        </tr>
                        <tr>
                            <td class="py-1">
                                <button type="button" @click="adding()" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add item</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, watch} from "vue";
import { router } from '@inertiajs/vue3'
import debounce from 'lodash/debounce';

defineProps({ items: Array})

let isAdding = ref(false)
let itemName = ref('')

watch(itemName, debounce(function (value) {
    router.post('/create', {name: value}, { preserveScroll: true })
}, 500))

let remove = (id) => {
    router.delete('/'+id+'/remove');
}
const adding = () => {
    isAdding.value = !isAdding.value;
    isAdding.value = value
}

const submit  = () => {
}

</script>
