<script setup>

import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Войти"/>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="container">
            <div class="text-center">
                <Link :href="route('index')" rel="home">
                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500"/>
                </Link>
            </div>
            <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                <h1 class="mb-5 text-lg font-semibold">Вход в аккаунт</h1>
                <form class="space-y-3" @submit.prevent="submit">

                    <TextInput
                        id="email"
                        v-model="form.email"
                        autocomplete="username"
                        autofocus
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        placeholder="E-mail"
                        required
                        type="email"
                    />
                    <InputError :message="form.errors.email" class="mt-3 text-pink text-xxs xs:text-xs"/>

                    <TextInput
                        id="password"
                        v-model="form.password"
                        autocomplete="current-password"

                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        placeholder="Пароль"
                        required
                        type="password"
                    />
                    <InputError :message="form.errors.password" class="mt-3 text-pink text-xxs xs:text-xs"/>

                    <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                   :disabled="form.processing"
                                   class="w-full btn btn-pink">
                        Войти
                    </PrimaryButton>
                </form>

                <div class="space-y-3 mt-5">

                    <div class="text-xxs md:text-xs">
                        <a :href="route('password.request')"
                           class="text-white hover:text-white/70 font-bold"
                        >
                            Забыли пароль?
                        </a>
                    </div>

                    <div class="text-xxs md:text-xs">
                        <a :href="route('register')"
                           class="text-white hover:text-white/70 font-bold">
                            Регистрация
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
