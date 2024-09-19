<script setup>
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Регистрация"/>

        <div class="container">

            <div class="text-center">
                <Link :href="route('index')" rel="home">
                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500"/>
                </Link>
            </div>

            <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                <h1 class="mb-5 text-lg font-semibold">Регистрация</h1>
                <form class="space-y-3" @submit.prevent="submit">

                    <TextInput
                        id="email"
                        v-model="form.email"
                        autocomplete="email"
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        placeholder="E-mail"
                        required
                        type="email"
                    />
                    <InputError :message="form.errors.email" class="mt-2"/>

                    <TextInput
                        id="name"
                        v-model="form.name"
                        autocomplete="name"
                        autofocus
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        placeholder="Имя"
                        required
                        type="text"
                    />
                    <InputError :message="form.errors.name" class="mt-2"/>


                    <TextInput
                        id="password"
                        v-model="form.password"
                        autocomplete="new-password"
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        placeholder="Пароль"
                        required
                        type="password"
                    />
                    <InputError :message="form.errors.password" class="mt-2"/>


                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        autocomplete="new-password"
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        placeholder="Повторите пароль"
                        required
                        type="password"
                    />
                    <InputError :message="form.errors.password_confirmation" class="mt-2"/>

                    <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="w-full btn btn-pink"
                            type="submit">Зарегистрироваться
                    </button>
                </form>

                <div class="space-y-3 mt-5">
                    <div class="text-xxs md:text-xs">
                        Есть аккаунт? <a :href="route('login')"
                                         class="text-white hover:text-white/70 font-bold underline underline-offset-4">Войти</a>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
