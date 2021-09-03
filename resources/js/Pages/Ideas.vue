<template>
    <app-layout title="Dashboard">
        <div class="filters flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
            <select name="category_add" @change="onChange" v-model="key" id="category_add" class=" bg-gray-100 text-sm border-none rounded-xl px-4 py-2 w-full">
                            <option disabled value="0">Select Category</option>
                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
            </select>
            <select v-model="filter" name="OtherFilters" @change="onFilter" id="OtherFilters" class=" border-gray-300 rounded-xl px-8 py-2 md:w-44 w-full">
                    <option disabled value="0">Select Filter</option>
                    <option value="1">Most Voted</option>
                <div v-if="$page.props.user">
                    <option value="2">My Ideas</option>
                </div>
            </select>

            <div class="relative w-full md:w-2/3">
                <input type="search" v-model="search" placeholder="Find an Idea" class="rounded-xl px-4 py-2 pl-8 w-full border-gray-300" name="" id="">
                <div class="absolute ml-2 h-full flex top-0 items-center">
                    <svg class=" w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
            <div v-for="idea in filteredIdeas">
                <idea  :title="idea.title" :status="idea.status.name" :gravatar="idea.user.email" :id="idea.id" :category="idea.category.name" :description="idea.description" v-bind:slug="idea.slug" v-bind:time="idea.created_at" :voted="idea.userVoted" :vote="idea.vote.length"></idea>
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
                search: '',
            }
        },

        mounted(){
            return [
                this.filter = this.$page.props.selected_filter,
                this.key = this.$page.props.selected_category
            ]
        },

        computed: {
            ideas() {
            return this.$page.props.ideas
            },
            categories(){
                return this.$page.props.categories
            },

            filteredIdeas() {
                return this.ideas.filter((idea)=>{
                    return idea.title.toLowerCase().match(this.search.toLowerCase())
                })
            },
        },

        methods:{
            hide: function(){
                this.bool = !this.bool
            },
            //routing using multiple parameters
            onChange(){
                if(route().current('ideas') | route().current('ideas', {'category': this.key, 'filter': this.filter})){
                        window.location.href = route('ideas', {'category': this.key, 'filter': this.filter})
                } else if(route().current('considering') | route().current('considering', {'category': Boolean(this.key)})) {
                        window.location.href = route('considering', {'category': this.key, 'filter': this.filter})
                } else if(route().current('inprogress') | route().current('inprogress', {'category': Boolean(this.key)})){
                        window.location.href = route('inprogress', {'category': this.key, 'filter': this.filter})
                } else if(route().current('implemented') | route().current('implemented', {'category': Boolean(this.key)})){
                        window.location.href = route('implemented', {'category': this.key, 'filter': this.filter})
                } else if (route().current('closed') | route().current('closed', {'category': Boolean(this.key)})){
                        window.location.href = route('closed', {'category': this.key, 'filter': this.filter})
                }
            },

            onFilter(){
                if(Boolean(this.filter)){
                    window.location.href = route(route().current(), {'category': this.key, 'filter': this.filter})
                }
            },

            onSearch(){
                if(this.search != ''){

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
