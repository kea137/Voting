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
        <div class="ideas-container space-y-6 my-6">
            <div class=" bg-white hover:shadow-xl transition duration-150 ease-in flex rounded-xl idea-container cursor-pointer">
                <div class=" border-r border-gray-200 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">
                            12
                        </div>
                        <div class="text-gray-500 uppercase text-xs">Votes</div>
                    </div>
                    <button class="w-20 text-xxs bg-gray-200 font-bold uppercase rounded-xl mt-4 py-3 px-4 border border-gray-200 hover:border-gray-400 transition ease-in duration-150">
                        Vote
                    </button>
                </div>
                <div class="px-2 py-6 flex">
                    <a href="#" class="flex-none">
                        <img src="https://www.gravatar.com/avatar/0000?d=mp" alt="" class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="mx-4">
                        <h4 class=" text-xl font-semibold">
                        <a href="#" class="text-gray-900 hover:text-gray-700">Random Heading goes here...</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. In quis rem enim modi, possimus quaerat dolorum. Eligendi, dolores molestiae, placeat harum quaerat asperiores tempora fugit officiis culpa debitis modi repellat!
                        </div>
                        <div class="items-center flex justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div>10 hours ago</div>
                                <div>&bull;</div>
                                <div>Category</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">Comment</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                <button class="relative ml-8 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul class="absolute w-40 semi-bold bg-white rounded-xl py-3 shadow-lg">
                                        <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Mark as Stamp</a></li>
                                        <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
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
