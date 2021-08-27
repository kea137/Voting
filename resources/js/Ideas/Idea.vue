<template>
        <div class="idea-container space-y-6 my-6">
            <div @click="clickAnywhere" class=" bg-white hover:shadow-xl transition duration-150 ease-in flex rounded-xl idea-container cursor-pointer">
                <div class="hidden md:block border-r border-gray-200 px-5 py-8">
                    <div class="text-center">
                        <div :class="{'text-blue-500': voted}" class="font-semibold text-2xl">
                            {{ vote }}
                        </div>
                        <div :class="{'text-blue-500': voted}" class="text-gray-500 uppercase text-xs">Votes</div>
                    </div>
                    <Link :href="route('vote', id)" preserve-scroll as="button" method="post" type="button" :class="{'text-white bg-blue-500':voted, 'bg-gray-200': !voted}" class="w-20 text-xxs  font-bold uppercase rounded-xl mt-4 py-3 px-4 border border-gray-200 hover:border-gray-400 transition ease-in duration-150">
                        <div v-if="voted">
                            Voted
                        </div>
                        <div v-else>
                            Vote
                        </div>
                    </Link>
                </div>
                <div class="px-2 py-6 flex flex-1">
                    <div class="flex-none">
                        <a href="#">
                        <img :src="avatar" alt="" class="w-14 h-14 rounded-xl">
                    </a>
                    </div>
                    <div class="w-full mx-4 flex flex-col justify-between">
                        <h4 class=" text-xl font-semibold">
                        <Link :href="route('idea', slug)" class="idea-link text-gray-900 hover:text-gray-700">{{ title }}</Link>
                        </h4>
                        <div class="text-gray-500 mt-3 line-clamp-3">
                            {{ description }}
                        </div>
                        <div class="md:items-center flex flex-col md:flex-row md:justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold md:space-x-2">
                                <div>{{ moment(time).fromNow() }}</div>
                                <div>&bull;</div>
                                <div>{{ category }}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">Comment</div>
                            </div>
                            <div class="flex items-center space-x-2 mt-3 md:mt-0">
                                <button type="button" :class="{'text-white': true, 'bg-red-500': ('Closed'== status), 'bg-green-500': ('In Progress'==status), 'bg-blue-500': ('Implemented'==status), 'bg-yellow-500': ('Considering'==status), 'bg-gray-500': ('Open'==status)}" class=" text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">{{ status }}</button>
                                <button v-on:click="hide" class="relative dropdown ml-8 bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul v-if="bool" class="absolute w-40 semi-bold bg-white rounded-xl py-3 shadow-lg">
                                        <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Mark as Stamp</a></li>
                                        <li><a href="#" class="hover:bg-gray-200 my-1 transition duration-150 ease-in block">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>

                            <div class="md:hidden flex mt-2 items-center">
                                <div :class="{'text-blue-500': voted}" class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2">
                                <div :class="{'text-blue-500': voted}" class="text-sm font-bold leading-none">{{ vote }}</div>
                                    <div class="text-xxs text-gray-400 leading-none font-semibold uppercase mt-1">Votes</div>
                                </div>
                                <Link :href="route('vote', id)" preserve-scroll as="button" method="post" type="button" class="w-20 text-xxs bg-gray-200 font-bold uppercase rounded-xl py-3 px-4 border border-gray-200 hover:border-gray-400 transition ease-in duration-150">
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
        </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import moment from 'moment'
    import md5 from 'md5'

    export default {
        components: {
            Link,
            moment,
        },

        data() {
            return {
                bool: false,
                moment: moment,
                avatar: '',
            }
        },

        created(){
            this.hash()
        },

        props: ['title', 'time', 'description', 'slug', 'id', 'gravatar', 'category', 'status', 'vote', 'voted'],

        methods:{
            hide: function(){
                this.bool = !this.bool
            },

            close: function(event){
            if(!event.target.closest('.dropdown')){
                this.bool = false
                }
            },

            hash: function (){
                this.avatar = 'http://gravatar.com/avatar/' + md5(this.gravatar)
            },

            clickAnywhere: function(event){

                const target = event.target.tagName.toLowerCase()

                const target2 = document.getElementById('vote')

                target2.addEventListener('click', null)

                // const target =
                const ignores = ['button', 'svg', 'path', 'a', 'img', 'Link']

                if(!ignores.includes(target)){
                    event.target.closest('.idea-container').querySelector('.idea-link').click()
                }
            }
        },

        filters: {
            ago(date){
                return moment(date).fromNow();
            }
        },

        watch:{
            bool(bool){
                if(bool){
                    document.addEventListener('click', this.close)
                }
            }
        }
    }
</script>
