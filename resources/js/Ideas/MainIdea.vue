<template>
        <div class="idea-container space-y-6 my-6">
            <div class=" bg-white flex rounded-xl idea-container">
                <div class="px-4 py-6 flex flex-1">
                    <div class="flex-none">
                        <a href="#">
                        <img :src="avatar" alt="" class="w-14 h-14 rounded-xl">
                    </a>
                    </div>
                    <div class="w-full mx-4">
                        <h4 class=" text-xl font-semibold">
                        <a href="#" class="text-gray-900 hover:text-gray-700">{{ title }}</a>
                        </h4>
                        <div class="text-gray-600 mt-3">
                            {{ description }}
                        </div>
                        <div class="items-center flex justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-semibold hidden md:block">{{ user_name }}</div>
                                <div class="hidden md:block">&bull;</div>
                                <div>{{ moment(time).fromNow() }}</div>
                                <div>&bull;</div>
                                <div>{{ category }}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">Comment</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div :class="{'text-white': true, 'bg-red-500': ('Closed'== status), 'bg-green-500': ('In Progress'==status), 'bg-blue-500': ('Implemented'==status), 'bg-yellow-500': ('Considering'==status), 'bg-gray-500': ('Open'==status)}" class="bg-gray-200 text-xxs font-bold border border-none uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4 md:m-0 m-2">{{ status }}</div>
                                <button @click="hide" @keydown.esc="hide" class="relative border border-none dropdown ml-8 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <transition name="fade">
                                        <ul v-if="bool" class="absolute w-40 semi-bold z-30 bg-white md:ml-8 top-8 md:top-6 right-0 md:left-0 rounded-xl py-3 shadow-lg">
                                            <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Mark as Stamp</a></li>
                                            <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Delete Post</a></li>
                                        </ul>
                                    </transition>
                                </button>
                            </div>
                        </div>
                        <div class="md:hidden flex mt-2 items-center">
                                <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2">
                                    <div :class="{'text-blue-600': voted}" class="text-sm font-bold leading-none">{{ vote }}</div>
                                    <div class="text-xxs text-gray-400 leading-none font-semibold uppercase mt-1">Votes</div>
                                </div>
                                <Link as="button" type="button" :href="route('vote', id)" preserve-scroll :class="{'bg-blue-500 text-white': voted, 'bg-gray-200': !voted}" class="w-20 text-xxs font-bold uppercase rounded-xl py-3 px-4 border border-gray-200 hover:border-gray-400 transition ease-in duration-150">
                                    <div v-if="voted">
                                        Voted
                                    </div>
                                    <div v-else>
                                        Vote
                                    </div>
                                </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'
import md5 from 'md5'

export default {
    components: {
        moment,
        Link,
    },

    created(){
        this.hash()
    },

    data() {
        return {
            moment:moment,
            bool: false,
            avatar: '',
            gravatar: this.gravatar,
        }
    },

    methods: {
        hash: function (){
                this.avatar = 'http://gravatar.com/avatar/' + md5(this.gravatar)
        },

        hide: function(){
                this.bool = !this.bool
        },

        close: function(event){
            if(!event.target.closest('.dropdown')){
                this.bool = false
                }
        },
    },

    props: ['id', 'title', 'description', 'slug', 'time', 'user_name', 'gravatar', 'category', 'status', 'vote', 'voted'],

    watch: {
        bool(bool){
                if(bool){
                    document.addEventListener('click', this.close)
                }
        }
    }

}
</script>
