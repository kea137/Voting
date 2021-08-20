<template>
        <div class="comment-container relative space-y-6 my-6">
            <div class=" bg-white flex rounded-xl idea-container">
                <div class="px-4 py-6 flex flex-1">
                    <div class="flex-none">
                        <a href="#">
                        <img src="https://www.gravatar.com/avatar/0000?d=mp" alt="" class="w-14 h-14 rounded-xl">
                    </a>
                    </div>
                    <div class="w-full mx-4">
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
                                <button @click="toggle" class="relative dropdown ml-8 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <transition name="fade">
                                        <ul v-if="bool" class="absolute w-40 semi-bold z-30 bg-white rounded-xl py-3 shadow-lg md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                            <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Mark as Stamp</a></li>
                                            <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Delete Post</a></li>
                                        </ul>
                                    </transition>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
</template>

<script>

export default {
    data(){
        return {
            bool: false,
        }
    },
    methods: {
        toggle: function(){
            this.bool = !this.bool
        },

        close: function(event){
            if(!event.target.closest('.dropdown')){
                this.bool = false
            }
        }
    },

    watch: {
        bool(bool){
            if(bool) {
                document.addEventListener('click', this.close)
            }
        }
    }
}
</script>