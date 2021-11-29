<template>
    <app-layout title="Minhas Doaçoes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Minhas Doações
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table class="rounded-t-lg mt-5 min-w-full mx-auto bg-gray-800 text-gray-100">
                    <thead>
                        <tr class="text-left border-b border-gray-300">
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Foto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nome</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Descrição</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Categoria</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Quantidade</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-700 border-b border-gray-600 text-gray-200">
                        <tr v-for="donation in donations" :key="donation.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="object-contain object-center rounded-md" v-bind:src="donation.foto" alt="">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">{{donation.nome}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm max-w-xs font-medium truncate">{{donation.descricao}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">{{donation.categoria}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">{{donation.quantidade}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">{{donation.status}}</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components: {
            AppLayout,
            Link
        },

        props:{
            donations: Array
        }
    }
</script>
