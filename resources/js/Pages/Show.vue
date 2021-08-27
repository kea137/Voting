<template>
    <app-layout>
        <div>
            <a :href="route('ideas')" class="font-semibold flex items-center hover:text-gray-500 transition duration:150 ease-in">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-1 hover:underline">All ideas</span>
            </a>
        </div>


        <main-idea :id="idea.id" :title="idea.title" :gravatar="idea.user.email" :category="idea.category.name" :description="idea.description" :slug="idea.slug" :time="idea.created_at" :user_name="idea.user.name" :voted="$page.props.voted" :status="idea.status.name" :vote="idea.vote.length" ></main-idea>

        <div class="flex items-center justify-between mt-4">
            <div class="flex justify-between items-center space-x-3 ml-3">
                        <div class="relative reply">
                            <button @click="hideReply" type="button" class="flex items-center justify-center h-11 w-32 text-xs font-semibold border border-blue-500 text-white hover:bg-blue-700 bg-blue-500 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <span>Reply</span>
                            </button>
                                <transition name="fade">
                                    <div v-if="replyBool" class="absolute z-10 w-104 text-left font-semibold rounded-xl mt-2 text-sm bg-white shadow-dialog">
                                        <form action="#" method="POST" class="space-y-4 px-4 py-6">
                                            <div>
                                                <textarea name="post_comment" id="post_comment" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border border-none px-4 py-6" placeholder="Your thoughts..."></textarea>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <button type="button" class="flex items-center justify-center h-11 w-1/2 text-xs font-semibold border border-blue-500 text-white hover:bg-blue-700 bg-blue-500 rounded-xl transition duration-150 ease-in px-6 py-3">
                                                    <span>Post Comment</span>
                                                </button>
                                                <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs font-semibold border border-gray-200 hover:border-gray-400 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                    </svg>
                                                    <span class="ml-2">Attach</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </transition>
                        </div>
                        <div class="relative status">
                            <button @click="hideStatus" type="button" class="flex items-center justify-center h-11 text-xs font-semibold border border-gray-200 hover:border-gray-400 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <span class="mr-2">Set Status</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                            <transition name="fade">
                                <div v-if="statusBool" class="absolute z-20 w-76 text-left font-semibold rounded-xl mt-2 text-sm bg-white shadow-dialog">
                                <form action="#" method="POST" class="space-y-4 px-4 py-6">
                                    <div class="space-y-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="bg-gray-200 text-gray-600 border-none" name="status" value="1" checked>
                                        <span class="ml-2">Open</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="bg-gray-200 text-purple border-none" name="status" value="2">
                                        <span class="ml-2">Considering</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="bg-gray-200 text-yellow-500 border-none" name="status" value="3">
                                        <span class="ml-2">In Progress</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="bg-gray-200 text-green-500 border-none" name="status" value="3">
                                        <span class="ml-2">Implemented</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="bg-gray-200 text-red-500 border-none" name="status" value="3">
                                        <span class="ml-2">Closed</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <textarea name="update_comment" id="update_comments" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Add an update comment (optional)"></textarea>
                            </div>
                            <div class="flex items-center justify-between space-x-3">
                                <button
                                    type="button"
                                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                                >
                                    <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                                <button
                                    type="submit"
                                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                                >
                                    <span class="ml-1">Update</span>
                                </button>
                            </div>
                            <div>
                                <label class="font-normal inline-flex items-center">
                                    <input type="checkbox" name="notify_voters" class="rounded bg-gray-200" checked="">
                                    <span class="ml-2">Notify all voters</span>
                                </label>
                            </div>
                                </form>
                            </div>
                            </transition>
                        </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="hidden md:block bg-white font-semibold text-center rounded-xl px-3 py-2">
                    <div :class="{'text-blue-500': $page.props.voted}" class="text-xl leading-snug">{{ idea.vote.length }}</div>
                    <div :class="{'text-blue-500':$page.props.voted}" class="text-gray-400 text-xxs leading-none uppercase">Votes</div>
                </div>
                <Link method="post" as="button" preserve-scroll :href="route('vote', $page.props.idea.id)" type="button" :class="{'text-white bg-blue-500': $page.props.voted}" class="h-11 text-xs font-semibold border border-gray-200 hover:border-gray-400 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                    <span class="mr-2 uppercase">
                        <div v-if="$page.props.voted">
                            Voted
                        </div>
                        <div v-else>
                            Vote
                        </div>
                    </span>
                </Link>
            </div>
        </div>

        <div class="comments-container ml-24 my-6 space-y-8 relative mt-1 pt-6">
        <comment></comment>
        <admin-comment></admin-comment>
        <comment></comment>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Comment from '@/Comments/Comment.vue'
    import MainIdea from '@/Ideas/MainIdea.vue'
    import AdminComment from '@/Comments/Admin_comment.vue'
    import { Link } from '@inertiajs/inertia-vue3'


    export default {
        components: {
            AppLayout,
            MainIdea,
            Comment,
            AdminComment,
            Link
        },

        data(){
            return {
                replyBool: false,
                statusBool: false,
                bool: false,
            }
        },

        methods: {
            hide: function(){
                this.bool = !this.bool
            },
            hideReply: function(){
                this.replyBool = !this.replyBool
            },

            hideStatus: function(){
                this.statusBool = !this.statusBool
            },

            close: function(event){
                if(!event.target.closest('.dropdown')){
                    this.bool = false
                }
            },

            closeReply: function(event){
                if(!event.target.closest('.reply')){
                    this.replyBool = false
                }
            },

            closeStatus: function(event){
                if(!event.target.closest('.status')){
                    this.statusBool = false
                }
            }
        },

        watch: {
            bool(bool){
                if(bool){
                    document.addEventListener('click', this.close)
                }
            },
            replyBool(replyBool){
                if(replyBool){
                    document.addEventListener('click', this.closeReply)
                }
            },
            statusBool(statusBool){
                if(statusBool){
                    document.addEventListener('click', this.closeStatus)
                }
            }

        },

        computed: {
            idea(){
                return this.$page.props.idea
            },
        },

    }
</script>
