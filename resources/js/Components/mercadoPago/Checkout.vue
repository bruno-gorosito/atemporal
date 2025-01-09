<template>
    <div id="wallet_container">
    </div>


</template>

<script>
import { onMounted, ref } from 'vue';

const mp = new MercadoPago('iddeapp', { 
    locale: 'es-AR'
});

const preferenceId = ref('');
fetch("/create_preference", {
        method: "get",
        headers: {
            "Content-Type": "application/json",
            // "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (preference) {
            console.log(preference)
            mp.bricks().create("wallet", "wallet_container", {
                initialization: {
                    preferenceId: preference.id,
                },
            });
        })
        .catch(function () {
        });
onMounted(() => {
    
})


</script>

<style></style>