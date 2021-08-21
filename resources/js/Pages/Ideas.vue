<template>
    <app-layout title="Dashboard">
        <div class="filters flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
            <select name="category" id="category" class=" border-gray-300 rounded-xl px-4 py-2 md:w-1/3 w-full">
                <option value="1">Category One</option>
            </select>
            <select name="OtherFilters" id="OtherFilters" class=" border-gray-300 rounded-xl px-4 py-2 md:w-1/3 w-full">
                <option value="1">Filter One</option>
            </select>

            <div class="relative w-full md:w-2/3">
                <input type="search" placeholder="Find an Idea" class="rounded-xl px-4 py-2 pl-8 w-full border-gray-300" name="" id="">
                <div class="absolute ml-2 h-full flex top-0 items-center">
                    <svg class=" w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
            <div v-for="idea in ideas">
                <idea :title="idea.title" :id="idea.id" :description="idea.description" v-bind:slug="idea.slug" v-bind:time="idea.created_at"></idea>
            </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Idea from '@/Ideas/Idea.vue'

    export default {
        components: {
            AppLayout,
            Idea,
        },

        data() {
            return {
                bool: false,
            }
        },

        computed: {
            ideas() {
            return this.$page.props.ideas
            }
        },

        methods:{
            hide: function(){
                this.bool = !this.bool
            },

            close: function(event){
            if(!event.target.closest('.dropdown')){
                this.bool = false
                }
            },

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
