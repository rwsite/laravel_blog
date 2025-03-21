<script>
import {Head, Link} from '@inertiajs/vue3';
import BlogGuestLayout from "@/Layouts/BlogGuestLayout.vue";

const page = {
    components: {
        BlogGuestLayout,
        Head,
        Link,
    },
    props: {
        post: Object,
        categories: Object,
        title: {
            type: String,
            default: 'Страница статьи'
        },
    },
    methods: {
        log: console.log
    },
}
export default page;

</script>

<template>

    <Head :title="post.title"/>

    <BlogGuestLayout>
        <main class="py-16 lg:py-20">
            <div class="container">
                {{ post.categories }}
                <img :alt="post.title"
                     :src="post.image"
                     class="w-full rounded-xl my-8">

                <div class="prose prose-lg min-w-full prose-img:rounded-xl prose-invert">
                    <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                        {{ post.title }}
                    </h1>

                    <div v-for="category in post.categories"
                         class="flex flex-wrap gap-3 mt-7"
                    >
                        <a class="grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap"
                           :href="route('post.list', category.id)">
                            {{ category.title }}
                        </a>
                    </div>

                    <div class="mt-4 break-words">
                        {{ post.content }}
                    </div>
                </div>
            </div>
        </main>
    </BlogGuestLayout>

</template>
