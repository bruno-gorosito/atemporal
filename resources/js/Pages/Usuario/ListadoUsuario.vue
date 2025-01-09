<script setup>
import SectionBox from '@/Components/SectionBox.vue';
import Table from '@/Components/Table.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps({
    usuarios: Array
})


const eliminar = usuarioId => {
    // const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // if (!csrfToken) {
    //     console.error('CSRF token no encontrado.');
    //     return;
    // }

    axios.delete(`/usuarios/${usuarioId}`, {
        headers: {
            // 'X-CSRF-TOKEN': csrfToken // Incluye el token CSRF en los encabezados
        }
    })
        .then(response => {
            // console.log('Usuario eliminado con éxito:', response.data); 
            props.usuarios.splice(props.usuarios.findIndex(user => user.id == usuarioId), 1);

        })
        .catch(error => {
            console.error('Error:', error);
        });
};

</script>

<template>

    <Head title="Usuarios" />
    <AdminLayout>
        <!-- <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Listado de usuarios
            </h2>
        </template> -->
        <SectionBox>
            <!-- <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8  relative overflow-scroll no-scrollbar"> -->
            <template #title>
                Listado de usuarios
            </template>
            <!-- <div class=""> -->
            <Table>
                <template #thead>
                    <tr>
                        <th>
                            Nombre completo
                        </th>
                        <th>
                            Correo electrónico
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </template>
                <template #tbody>
                    <tr v-for="usuario in usuarios" :key="usuario.id">
                        <th>
                            {{ usuario.name }}
                        </th>
                        <td>
                            {{ usuario.email }}
                        </td>
                        <td>
                            <button class="btn-red" @click="e => eliminar(usuario.id)">Eliminar</button>
                        </td>
                    </tr>
                </template>

            </Table>
            <!-- </div> -->

            <!-- </div> -->


        </SectionBox>
        <SectionBox>
            Hola!
        </SectionBox>
    </AdminLayout>
</template>

<style scoped></style>