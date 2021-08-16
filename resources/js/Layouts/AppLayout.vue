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
        <div class=" w-70">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum corrupti quaerat voluptates commodi accusantium laborum qui rerum quis ullam, nisi blanditiis id placeat accusamus eaque debitis illo distinctio laudantium sequi.
        </div>
        <div class=" w-175">
            <nav class="flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold border-b-4 pb-4 space-x-10">
                    <li><a href="#" class="border-b-4 pb-4 border-blue-500">All Ideas(89)</a></li>
                    <li><a href="#" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-blue-400">Considering(6)</a></li>
                    <li><a href="#" class=" text-gray-600 transition duration-150 ease-in border-b-4 pb-4 hover:border-blue-400">In-Progress(6)</a></li>
                </ul>

                <ul class="flex uppercase font-semibold border-b-4 pb-4 space-x-10">
                    <li><a href="#" class="text-gray-600 border-b-4 pb-4 border-blue-500">Implemented(8)</a></li>
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
