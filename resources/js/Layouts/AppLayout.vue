<template>
    <Head title="Welcome" />
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="#">
            <img src="http://127.0.0.1/Voting/public/images/logo.png" class=" h-10 w-auto" alt="logo">
        </a>

        <div class="items-center mt-2 md:mt-0 flex">
            <form v-if="$page.props.user" method="POST" @submit.prevent="logout">
            <button class="text-sm text-gray-700" type="submit">
                Log out
            </button>
            </form>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700">
                    Log in
                </Link>

                <Link :href="route('register')" class="ml-4 text-sm text-gray-700">
                    Register
                </Link>
            </template>
            <a href="#" class="ml-4">
                <img src="https://www.gravatar.com/avatar/0000?d=mp" class="h-10 w-10 rounded-full" alt="">
            </a>
        </div>
    </header>

    <main class="container flex flex-col md:flex-row mx-auto max-w-custom">
        <div class=" w-70 px-2 py-1 mx-auto md:mx-0">
            <div class="bg-white md:sticky top-6 border border-blue-100 rounded-xl mt-16 p-1 bg-gradient-to-b from-blue-200 to-blue-50">
                <div class="w-full h-full bg-gray-background rounded-xl">
                    <div class="text-center px-6 py-2 pt-6">
                    <h1 class="font-semibold">Add an Idea</h1>
                    <p v-if="$page.props.user" class="text-xs mt-4">
                        Let us know what you think
                    </p>
                        <div v-else>
                        Log in to add your Ideas
                        </div>
                    </div>
                <form @submit.prevent="form.post(route('create'), { preserveScroll: true, onSuccess:()=>form.reset('title', 'description')})" method="POST" class="space-y-4 px-4 py-6">
                    <div v-if="$page.props.user" class="space-y-3">
                        <div v-if="$page.props.flash.message" class=" mx-4 px-8 items-center text-green-600">
                            <p class=" text-xs font-bold ml">{{ $page.props.flash.message }}</p>
                        </div>
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
        <div class="w-full px-2 md:px-0 md:w-175">
            <nav class="hidden md:flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold border-b-4 pb-4 space-x-10">
                    <li><Link :href="route('ideas')" :class="{'border-blue-500': route().current('ideas')}" class="border-b-4 pb-4 hover:border-blue-500 transition ease-in duration-150">All Ideas(89)</Link></li>
                    <li><Link :href="route('considering')" :class="{'border-yellow-500': route().current('considering')}" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-yellow-500">Considering(6)</Link></li>
                    <li><Link :href="route('inprogress')" :class="{'border-green-500': route().current('inprogress')}" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-green-500">In-Progress(6)</Link></li>
                </ul>

                <ul class="flex uppercase font-semibold border-b-4 pb-4 space-x-10">
                    <li><Link :href="route('implemented')" :class="{' border-purple': route().current('implemented')}" class="text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-purple">Implemented(8)</Link></li>
                    <li><Link :href="route('closed')" :class="{'border-red-500': route().current('closed')}" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-red-400">Closed(89)</Link></li>
                </ul>
            </nav>
            <div class="mt-8">
            <slot></slot>
            </div>
        </div>
    </main>
</template>


<script>
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Head,
            Link,
        },

        data(){
            return {
                form: this.$inertia.form({
                    title: null,
                    category: null,
                    description: null,
                }),
            }
        },

        created(){
            this.form.category = 1
        },

        computed: {
            categories(){
                return this.$page.props.categories
            },
            errors(){
                return this.$page.props.errors
            }
        },

        props: {
            // errors: Object,
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            title: String,
            category: Number,
            description: String,
        },

        methods: {
            logout() {
                this.$inertia.post(route('logout'))
            },
        }
    }
</script>
