<template>
    <app-layout>
        <div>
            <a href="http://127.0.0.1/Voting/public/dashboard" class="font-semibold flex items-center hover:text-gray-500 transition duration:150 ease-in">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-1 hover:underline">All ideas</span>
            </a>
        </div>


        <div class="ideas-container space-y-6 my-6">
            <div class=" bg-white flex rounded-xl idea-container">
                <div class="px-4 py-6 flex flex-1">
                    <div class="flex-none">
                        <a href="#">
                        <img src="https://www.gravatar.com/avatar/0000?d=mp" alt="" class="w-14 h-14 rounded-xl">
                    </a>
                    </div>
                    <div class="w-full mx-4">
                        <h4 class=" text-xl font-semibold">
                        <a href="#" class="text-gray-900 hover:text-gray-700">Random Heading goes here...</a>
                        </h4>
                        <div class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta commodi impedit aut. Fuga nisi expedita hic ea ullam incidunt deleniti consectetur dolores! Deserunt iste dolorum animi accusamus harum hic alias!
                        </div>
                        <div class="items-center flex justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-semibold">John Doe</div>
                                <div>&bull;</div>
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
                                    <ul class="hidden absolute w-40 semi-bold bg-white rounded-xl py-3 shadow-lg">
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

        <div class="flex items-center justify-between mt-4">
            <div class="flex justify-between items-center space-x-3 ml-3">
                        <button type="button" class="flex items-center justify-center h-11 w-32 text-xs font-semibold border border-blue-500 text-white hover:bg-blue-700 bg-blue-500 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <span>Submit</span>
                        </button>
                        <button type="button" class="flex items-center justify-center h-11 text-xs font-semibold border border-gray-200 hover:border-gray-400 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <span class="mr-2">Set Status</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
            </div>
            <div class="flex items-center space-x-3">
                <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                    <div class="text-xl leading-snug">12</div>
                    <div class="text-gray-400 text-xxs leading-none uppercase">Votes</div>
                </div>
                <button type="button" class="h-11 text-xs font-semibold border border-gray-200 hover:border-gray-400 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                    <span class="mr-2 uppercase">Vote</span>
                </button>
            </div>
        </div>

        <div class="comments-container ml-24 my-6 space-y-8 relative mt-1 pt-6">
            <div class="comment-container relative space-y-6 my-6">
            <div class=" bg-white flex rounded-xl idea-container">
                <div class="px-4 py-6 flex flex-1">
                    <div class="flex-none">
                        <a href="#">
                        <img src="https://www.gravatar.com/avatar/0000?d=mp" alt="" class="w-14 h-14 rounded-xl">
                    </a>
                    </div>
                    <div class="w-full mx-4">
                        <!-- <h4 class=" text-xl font-semibold">
                        <a href="#" class="text-gray-900 hover:text-gray-700">Random Heading goes here...</a>
                        </h4> -->
                        <div class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta commodi impedit aut. Fuga nisi expedita hic ea ullam incidunt deleniti consectetur dolores! Deserunt iste dolorum animi accusamus harum hic alias!
                        </div>
                        <div class="items-center flex justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 space-x-2">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="relative ml-8 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul class="hidden absolute w-40 semi-bold bg-white rounded-xl py-3 shadow-lg">
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
            <div class="comment-container relative is-admin space-y-6 my-6">
            <div class=" bg-white flex rounded-xl idea-container">
                <div class="px-4 py-6 flex flex-1">
                    <div class="flex-none">
                        <a href="#">
                        <img src="https://www.gravatar.com/avatar/0000?d=mp" alt="" class="w-14 h-14 rounded-xl">
                        <div class="font-bold text-blue-500 text-xxs mt-3 text-center">Admin</div>
                    </a>
                    </div>
                    <div class="w-full mx-4">
                        <h4 class=" text-xl font-semibold">
                        <a href="#" class="text-gray-900 hover:text-gray-700">Random Heading goes here...</a>
                        </h4>
                        <div class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta commodi impedit aut. Fuga nisi expedita hic ea ullam incidunt deleniti consectetur dolores! Deserunt iste dolorum animi accusamus harum hic alias!
                        </div>
                        <div class="items-center flex justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 space-x-2">
                                <div class="font-bold text-blue-500">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="relative ml-8 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul class="hidden absolute w-40 semi-bold bg-white rounded-xl py-3 shadow-lg">
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

            <div class="comment-container relative space-y-6 my-6">
            <div class=" bg-white flex rounded-xl idea-container">
                <div class="px-4 py-6 flex flex-1">
                    <div class="flex-none">
                        <a href="#">
                        <img src="https://www.gravatar.com/avatar/0000?d=mp" alt="" class="w-14 h-14 rounded-xl">
                    </a>
                    </div>
                    <div class="w-full mx-4">
                        <!-- <h4 class=" text-xl font-semibold">
                        <a href="#" class="text-gray-900 hover:text-gray-700">Random Heading goes here...</a>
                        </h4> -->
                        <div class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta commodi impedit aut. Fuga nisi expedita hic ea ullam incidunt deleniti consectetur dolores! Deserunt iste dolorum animi accusamus harum hic alias!
                        </div>
                        <div class="items-center flex justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 space-x-2">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="relative ml-8 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul class="hidden absolute w-40 semi-bold bg-white rounded-xl py-3 shadow-lg">
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
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    export default {
        components: {
            AppLayout,
        },
    }
</script>
