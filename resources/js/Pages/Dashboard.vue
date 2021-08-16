<template>
    <app-layout title="Dashboard">
        <div class="filters flex space-x-6">
            <select name="category" id="category" class=" border-gray-300 rounded-xl px-4 py-2 w-1/3">
                <option value="1">Category One</option>
            </select>
            <select name="OtherFilters" id="OtherFilters" class=" border-gray-300 rounded-xl px-4 py-2 w-1/3">
                <option value="1">Filter One</option>
            </select>

            <div class="relative w-2/3">
                <input type="search" placeholder="Find an Idea" class="rounded-xl px-4 py-2 pl-8 border-gray-300" name="" id="">
                <div class="absolute ml-2 h-full flex top-0 items-center">
                    <svg class=" w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
