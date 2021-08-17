<template>
    <Head title="Welcome" />
    <header class="flex items-center justify-between px-8 py-4">
        <a href="#">
            <img src="http://127.0.0.1/Voting/public/images/logo.png" class=" h-10 w-auto" alt="logo">
        </a>

        <div class="items-center flex">
            <form v-if="$page.props.user" method="POST" @submit.prevent="logout">
            <button class="text-sm text-gray-700" type="submit">
                Log out
            </button>
            </form>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700">
                    Register
                </Link>
            </template>
            <a href="#" class="ml-4">
                <img src="https://www.gravatar.com/avatar/0000?d=mp" class="h-10 w-10 rounded-full" alt="">
            </a>
        </div>
    </header>

    <main class="container flex mx-auto max-w-custom">
        <div class=" w-70 px-2 py-1">
            <div class="bg-white border border-blue-100 rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h1 class="font-semibold">Add an Idea</h1>
                    <p class="text-xs mt-4">let us know what you think</p>
                </div>
                <form action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input type="text" class="bg-gray-100 border-none placeholder-gray-900 text-sm rounded-xl w-full px-4 py-2" placeholder="Your Idea">
                    </div>
                    <div>
                        <select name="category_add" id="category_add" class=" bg-gray-100 text-sm border-none rounded-xl px-4 py-2 w-full">
                            <option value="1">Category One</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="idea" id="idea" cols="30" rows="4" class="rounded-xl px-4 py-2 border-none text-sm placeholder-gray-900 w-full bg-gray-100" placeholder="Describe your idea..."></textarea>
                    </div>
                    <div class="flex justify-between items-center space-x-3">
                        <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs font-semibold border border-gray-200 hover:border-gray-400 bg-gray-200 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-2">Attach</span>
                        </button>
                        <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs font-semibold border border-blue-500 text-white hover:bg-blue-400 bg-blue-500 rounded-xl transition duration-150 ease-in px-6 py-3">
                            <span>Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class=" w-175">
            <nav class="flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold border-b-4 pb-4 space-x-10">
                    <li><a href="#" class="border-b-4 pb-4 border-blue-500">All Ideas(89)</a></li>
                    <li><a href="#" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-blue-400">Considering(6)</a></li>
                    <li><a href="#" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-blue-400">In-Progress(6)</a></li>
                </ul>

                <ul class="flex uppercase font-semibold border-b-4 pb-4 space-x-10">
                    <li><a href="#" class="text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-blue-400">Implemented(8)</a></li>
                    <li><a href="#" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-blue-400">Closed(89)</a></li>
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

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },

        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
