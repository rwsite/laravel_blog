<script setup>

const props = defineProps({
    pagination: Object
});
</script>

<template>
    <nav class="mt-4">
        <ul class="flex flex-wrap items-center justify-center gap-3">
            <li v-for="link in pagination" :class="{ 'active': link.active, '': !link.url }">
                <a :class="{ 'text-pink': link.active, 'text-white hover:text-pink': !link.url }" :href="link.url"
                   class="block p-3 text-sm font-black leading-none ">
                    {{ link.label }}
                </a>
            </li>
        </ul>
    </nav>
</template>
