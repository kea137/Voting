<template>
    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div v-if="modal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen">
            <!--
            Background overlay, show/hide based on modal state.

            Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
            Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
            <!--
            Modal panel, show/hide based on modal state.

            Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
            Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="modal bg-white rounded-tl-xl rounded-tr-xl overflow-hidden transform transition-all sm:max-w-lg sm:w-full py-4">
                <button @click="hideModal" class="absolute top-0 right-0 pt-4 pr-4 hover:text-red-500 transition duration-150 ease-in">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="text-center px-6 py-2 pt-2">
                    <h1 class="font-semibold">Edit Your Idea</h1>
                    <p v-if="$page.props.user" class="text-xs mt-4">
                        You have only 1 hour to Edit your Idea!
                    </p>
                        <div v-else>
                        Log in to add your Ideas
                        </div>
                </div>
                <form @submit.prevent="form.put(route('edit', this.$page.props.idea), { preserveScroll: true, onSuccess:()=>form.reset('title', 'description')})" class="space-y-4 px-4 py-6">
                    <div v-if="$page.props.user" class="space-y-3">
                    <div>
                        <p class="text-xs font-semibold text-red-500 items-center" v-if="errors.title">{{ errors.title }}</p>
                        <input type="text" v-model="form.title" class="bg-gray-100 border-none placeholder-gray-900 text-sm rounded-xl w-full px-4 py-2" placeholder="Your Idea's Title">
                    </div>
                    <div >
                        <select v-model="form.category" name="category_add"  id="category_add" class=" bg-gray-100 text-sm border-none rounded-xl px-4 py-2 w-full">
                            <p class="text-xs items-center font-semibold text-red-500" v-if="errors.category">{{ errors.category }}</p>
                            <option selected="selected" :value="1">First</option>
                            <template v-for="category in categories">
                                <option v-if="category.id != 1" :value="category.id">{{ category.name }}</option>
                            </template>
                        </select>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-red-500 items-center" v-if="errors.description">{{ errors.description }}</p>
                        <textarea name="idea" id="idea" v-model="form.description" cols="30" rows="4" class="rounded-xl px-4 py-2 border-none text-sm placeholder-gray-900 w-full bg-gray-100" placeholder="Describe your idea..."></textarea>
                    </div>
                    <div class="flex justify-between items-center space-x-3">
                        <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs font-semibold border border-gray-200 hover:border-gray-400 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-2">Attach</span>
                        </button>
                        <button type="submit" :disabled="form.processing" class="flex items-center justify-center w-1/2 h-11 text-xs font-semibold border border-blue-500 text-white hover:bg-blue-400 bg-blue-500 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <span>Submit</span>
                        </button>
                    </div>
                    </div>
                    <div v-else class=" flex items-center flex-col space-y-3">
                        <Link :href="route('login')" class="flex items-center justify-center w-1/2 h-11 text-xs font-semibold border border-gray-300 text-gray-900 hover:bg-gray-100 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                            Log in
                        </Link>
                        <Link :href="route('register')" class="flex items-center justify-center w-1/2 h-11  text-xs font-semibold border border-blue-500 text-white hover:bg-blue-400 bg-blue-500 rounded-xl transition duration-150 ease-in px-4 py-3">
                            Register
                        </Link>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>

    </div>
</template>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue3';


export default {
    components: {
            Head,
            Link,
        },

        props: ['modal'],

        data(){
            return {
                hide: false,
                form: this.$inertia.form({
                    title: null,
                    category: null,
                    description: null,
                }),
            }
        },

        methods: {
            hideModal: function(){
                this.$emit('modalClosed', false)
            },

            closeModal: function(event){
                if(!event.target.closest('.modal')){
                    this.$emit('modalClosed', false)
                }
            },
        },

        created(){
            this.form.category = 1
        },

        watch: {
            modal: function(){
                if(this.modal){

                    // document.addEventListener('click', this.closeModal)
                }
            }
        },

        computed: {
            categories(){
                return this.$page.props.categories
            },
            errors(){
                return this.$page.props.errors
            }
        },
}
</script>