<script setup>
import ContainedLayout from '@/Layouts/ContainedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

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
    <ContainedLayout>

        <Head title="Crear cuenta" />

        <div class="min-h-screen flex items-center justify-center">
            <form @submit.prevent="submit" class="bg-white  shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 w-full max-w-xl">
                <h2 class="mb-4 font-bold text-2xl text-stone-800">Registrarme</h2>

                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                        autocomplete="name" />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                        autocomplete="username" />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                        autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirm Password" />

                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                        v-model="form.password_confirmation" required autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="mt-4 flex items-center justify-end">

                    <PrimaryButton
                        class="bg-orange-900 w-full hover:bg-orange-800 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline justify-center"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Crear cuenta
                    </PrimaryButton>
                </div>
                <div class="mt-2 flex justify-center">
                    <Link :href="route('login')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-800 focus:ring-offset-2">
                    ¿Ya tienes una cuenta? Iniciar sesión
                    </Link>
                </div>
            </form>
        </div>
    </ContainedLayout>
</template>
