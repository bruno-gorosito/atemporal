<script setup>
import MenuIcon from './icons/MenuIcon.vue'
import SearchIcon from './icons/SearchIcon.vue'
import CloseIcon from './icons/CloseIcon.vue'
import ArrowSimpleIcon from './icons/ArrowSimpleIcon.vue'
import CartIcon from './icons/CartIcon.vue'

import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Dropdown from './Dropdown.vue'
import DropdownLink from './DropdownLink.vue'
// import { useCartStore } from '@/stores/cartStore'
// import { useAuthStore } from '@/stores/authStore'

// const authStore = useAuthStore();

const menu = ref(false)
const search = ref(false)
const searchValue = ref('');
// const store = useCartStore()

const showingNavigationDropdown = ref(false);
defineProps({
    saludo: {
        type: String,
        required: true
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

</script>
<template>


    <header class="hidden lg:block">
        <div class="header-container">
            <Link :href="route('home')">
            <h1 class="atemporal">Atemporal</h1>
            </Link>
            <ul>
                <li>Relojes</li>
                <li>Accesorios </li>
                <li>Ofertas</li>
                <li>Nosotros</li>
                <li>Accesorios</li>
            </ul>
            <div class="">
                <div class="max-w-7xl px-4 sm:px-6 lg:px-8 flex">
                    <div class="hidden sm:ms-6 sm:flex sm:items-center">
                        <!-- Settings Dropdown -->
                        <div class="relative ms-3">
                            <div v-if="!$page.props.auth.user">
                                <Link :href="route('login')"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Iniciar sesión
                                </Link>

                                <!-- <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            > -->
                                <Link :href="route('register')"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Registrarme
                                </Link>
                            </div>
                            <Dropdown align="right" width="48" v-else>
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center rounded-md border border-transparent px-3 py-2 font-medium leading-4  transition duration-150 ease-in-out  focus:outline-none">
                                            {{ $page.props.auth.user.name }}

                                            <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('dashboard')">
                                        Panel administrativo
                                    </DropdownLink>
                                    <DropdownLink :href="route('profile.edit')">
                                        Perfil
                                    </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Cerrar sesión
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- HEADER MOBILE -->
    <header class="lg:hidden !fixed top-0 left-0 justify-between items-center px-4 py-1 overflow-hidden transition-all"
        :class="{
            'max-h-28': search,
            'max-h-14': !search

        }">
        <div class="flex justify-between w-full items-center">
            <MenuIcon color="white" class="cursor-pointer w-1/12" @click="menu = !menu" />
            <Link :href="{ name: 'home' }">
            <h1 class="atemporal">Atemporal</h1>
            </Link>
            <SearchIcon color="white" class="cursor-pointer" @click="search = !search" />
        </div>
        <div class=" transition-all ease-linear origin-top overflow-hidden h-auto py-1 my-1">
            <input type="text" class="w-full p-2 pr-10 rounded-md text-black" v-model="searchValue">
            <CloseIcon color="fill-primary" :size="14" class="absolute top-1/2 right-3 -translate-y-1/2 "
                @click="e => searchValue = ''" />
        </div>
        <h1>{{ searchValue }}</h1>
    </header>


    <div class="block lg:hidden transition-transform duration-300  bg-white z-50 w-full top-0  h-dvh max-w-xs fixed select-none text-primary"
        :class="{
            'translate-x-0': menu,
            '-translate-x-full': !menu
        }">
        <CloseIcon color="fill-primary" class="w-4 absolute top-4 right-4 cursor-pointer" @click="menu = !menu" />
        <ul class="flex flex-col w-full items-start justify-start !gap-0  text-primary text-lg mt-16">
            <li class="font-medium w-full p-4 transition-all  hover:bg-primary/15">Inicio</li>
            <li class="font-medium w-full p-4 transition-all  hover:bg-primary/15">Ofertas</li>
            <details class="font-medium w-full">
                <summary class="font-medium flex justify-between  p-4 transition-all  hover:bg-primary/15">Productos
                    <ArrowSimpleIcon color="stroke-primary !stroke-2" />
                </summary>
                <ul class="flex flex-col !gap-0">
                    <li class="font-medium w-full p-4 pl-8 transition-all  hover:bg-primary/15">Relojes</li>
                    <li class="font-medium w-full p-4 pl-8 transition-all  hover:bg-primary/15">Accesorios</li>
                    <li class="font-medium w-full p-4 pl-8 transition-all  hover:bg-primary/15">Ofertas</li>

                </ul>
            </details>
            <li class="font-medium w-full p-4 transition-all  hover:bg-primary/15">Contacto</li>
            <li class="font-medium w-full p-4 transition-all  hover:bg-primary/15">Ayuda</li>
        </ul>
        <div v-if="$page.props.auth.user != null" class="absolute w-full bottom-0 flex justify-between text-center">
            <Link :href="route('profile.edit')"
                class="border border-primary w-full py-4 font-medium cursor-pointer transition-all hover:bg-primary/15">Perfil</Link>
            <Link :href="route('dashboard')"
                class="border border-primary w-full py-4 font-medium cursor-pointer transition-all hover:bg-primary/15">Administrativo</Link>
            <Link :href="route('logout')" as="button" method="post"
                class="border border-primary w-full py-4 font-medium cursor-pointer transition-all hover:bg-primary/15">Cerrar sesión</Link>
        </div>
        <div v-else class=" absolute w-full bottom-0 flex justify-between text-center">
            <Link :href="route('register')"
                class="w-1/2 py-4  font-medium cursor-pointer transition-all  hover:bg-primary/15">Crear
            cuenta</Link>
            <Link :href="route('login')"
                class="w-1/2  py-4 font-medium cursor-pointer transition-all  hover:bg-primary/15">
            Iniciar
            sesión</Link>
        </div>
    </div>
    <div class="lg:hidden transition-all fixed top-0 left-0 h-dvh w-full z-40" :class="{
        'bg-black/50 block': menu,
        'bg-transparent hidden': !menu
    }" @click="menu = !menu"></div>
</template>

<style scoped>
header {
    width: 100%;
    background-color: #8c6945;
    position: absolute;
    top: 0;
    z-index: 30;
    color: #FBFBFB;
    border-bottom: 1px solid #fbfbfb93;
    transition: all .5s cubic-bezier(0.165, 0.84, 0.44, 1);
    user-select: none;
}

header:hover {
    box-shadow: inset 0 0 200px rgba(0, 0, 0, 0.5);
}

.header-container {
    width: 100%;
    max-width: 1240px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 4rem;
}

ul {
    display: flex;
    gap: 2rem;
    align-items: center;
    cursor: pointer;

}

.icono {
    aspect-ratio: 1/1;
    height: 1.3rem;
}

.atemporal {
    cursor: pointer;
    font-size: 2rem;
}
</style>