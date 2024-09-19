<script>
import {Head, Link} from '@inertiajs/vue3';
import BlogGuestLayout from "@/Layouts/BlogGuestLayout.vue";

export default {
    components: {
        BlogGuestLayout,
        Head,
        Link,
    },
    props: {
        title: {
            type: String,
            default: 'Лучшие статьи'
        },
        posts: Object,
    },
    methods: {
        even(posts) {
            console.log(posts)
            return posts.filter(post => post % 2 === 0)
        }
    },
};
</script>

<template>
    <Head :title="'Главная. ' + title"/>

    <BlogGuestLayout>
    <main class="py-16 lg:py-20">
        <div class="container">

            <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                {{ title }}
            </h1>

            <div class="tasks grid gap-4 grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-14 xl:gap-y-20 mt-12 md:mt-20"
            >
                <!-- содержимое -->
                <div v-for="post in posts"
                     :key="post.id" class="tasks-card flex flex-col rounded-3xl md:rounded-[40px] bg-card">

                    <div class="tasks-card-photo overflow-hidden h-40 xs:h-48 sm:h-[280px] rounded-3xl md:rounded-[40px]">
                        <Link :href="route('post.show', post.id)" preserve-scroll>
                            <img :alt="post.title"
                                 class="object-cover w-full h-full"
                                 :src="post.image">
                        </Link>
                    </div>

                    <div class="grow flex flex-col pt-6 sm:pt-10 pb-6 sm:pb-10 2xl:pb-14 px-5 sm:px-8 2xl:px-12">
                        <h3 class="text-md md:text-lg 2xl:text-xl font-black">{{ post.title }}</h3>
                        <div class="mt-auto">
                            <div v-for="category in post.categories"
                                 class="flex flex-wrap gap-3 mt-7">
                                <a :href="route('post.list')"
                                   class="grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap">
                                    {{ category.title }}
                                </a>
                            </div>
                            <div class="flex flex-wrap sm:items-center justify-center sm:justify-between mt-8 sm:mt-10">
                                <Link :href="route('post.show', post.id)" class="btn btn-pink">
                                    Подробнее
                                </Link>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- # содержимое -->
            </div>

        </div>
    </main>
    </BlogGuestLayout>
</template>
