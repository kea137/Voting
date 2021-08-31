<template>
    <app-layout title="Dashboard">
        <div class="filters flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
            <select name="category_add" @change="onChange" v-model="key" id="category_add" class=" bg-gray-100 text-sm border-none rounded-xl px-4 py-2 w-full">
                            <option disabled value="0">Select Category</option>
                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
            </select>
            <select v-model="filter" name="OtherFilters" @change="onFilter" id="OtherFilters" class=" border-gray-300 rounded-xl px-4 py-2 md:w-1/3 w-full">
                <option disabled value="0">Filter One</option>
                <option value="1">Most Voted</option>
                <option value="2">My Ideas</option>
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
                <idea  :title="idea.title" :status="idea.status.name" :gravatar="idea.user.email" :id="idea.id" :category="idea.category.name" :description="idea.description" v-bind:slug="idea.slug" v-bind:time="idea.created_at" :voted="$page.props.voted.includes(idea.id)" :vote="idea.vote.length"></idea>
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
                key: '0',
                filter: '0',
            }
        },

        mounted(){
            return this.key = this.$page.props.selected_category
        },

        computed: {
            ideas() {
            return this.$page.props.ideas
            },
            categories(){
                return this.$page.props.categories
            },
        },

        methods:{
            hide: function(){
                this.bool = !this.bool
            },

            onChange(){
                if(route().current('ideas') | route().current('ideas', {'category': Boolean(this.key)})){
                        window.location.href = route('ideas', this.key)
                } else if(route().current('considering') | route().current('considering', {'category': Boolean(this.key)})) {
                        window.location.href = route('considering', this.key)
                } else if(route().current('inprogress') | route().current('inprogress', {'category': Boolean(this.key)})){
                        window.location.href = route('inprogress', this.key)
                } else if(route().current('implemented') | route().current('implemented', {'category': Boolean(this.key)})){
                        window.location.href = route('implemented', this.key)
                } else if (route().current('closed') | route().current('closed', {'category': Boolean(this.key)})){
                        window.location.href = route('closed', this.key)
                }
            },

            onFilter(){
                if(Boolean(this.filter)){
                    window.location.href = route(route().current(), this.filter)
                }
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
            },
        },
    }
</script>
