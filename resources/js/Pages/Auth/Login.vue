<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import ContainedLayout from '@/Layouts/ContainedLayout.vue';

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
    <Head title="Iniciar sesión" />
    <ContainedLayout>

        <div class="min-h-screen flex items-center justify-center">

            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="bg-white  shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 w-full max-w-xl">
                <h2 class="mb-4 font-bold text-2xl text-stone-800">Iniciar sesión</h2>
                <div>
                    <InputLabel for="email" value="Email:" />

                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                        autofocus />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Contraseña: " />

                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                        autocomplete="current-password" />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4 flex justify-between">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2 text-sm text-gray-600">Recordarme</span>
                    </label>
                    <Link v-if="canResetPassword" :href="route('password.request')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-900 focus:ring-offset-2">
                    Olvidé mi contraseña
                    </Link>
                </div>

                <div class="mt-4 flex items-center justify-end">

                    <PrimaryButton
                        class="bg-orange-900 w-full hover:bg-orange-800 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline justify-center"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Ingresar
                    </PrimaryButton>

                </div>
                <div class="mt-2 flex justify-center">
                    <Link :href="route('register')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-800 focus:ring-offset-2 ">
                    No tengo una cuenta </Link>
                </div>
            </form>
        </div>
    </ContainedLayout>
</template>
