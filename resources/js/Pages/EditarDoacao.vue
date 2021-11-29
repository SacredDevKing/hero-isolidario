<template>
    <app-layout title="Editar Doacao">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar Doação
            </h2>
        </template>     

        <div class="py-12">

            <form @submit.prevent="createDonation()">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-row content-center">
                        <jet-label class="block font-bold text-2xl ml-4 text-gray-700 mt-4">
                            Quero Doar!
                        </jet-label>
                        <Icon icon="bx:bx-happy-heart-eyes" style="font-size:34px" class="mt-3 ml-1 text-red-500"/>
                    </div>

                    <div class="flex flex-col lg:flex-row justify-center md:justify-evenly items-center pt-6 sm:pt-0">
                        <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                            <div class="mt-4">
                                <jet-label class="block font-bold text-lg ml-4 text-red-500">
                                    Nome *
                                </jet-label>
                                <jet-input id="nome" type="text" class="mt-1 block w-full h-full rounded-full" v-model="form.nome" required />
                            </div>

                            <div class="mt-4">
                                <jet-label class="block font-bold text-lg ml-4 text-red-500">
                                    Descrição
                                </jet-label>
                                <jet-input id="descricao" type="text" class="mt-1 w-full block h-100 rounded-full" v-model="form.descricao"/>
                            </div>

                            <div class="flex flex-row mt-6 justify-center">
                                <div class="flex bg-grey-lighter">
                                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-red-500 rounded-lg shadow-lg tracking-wide uppercase border border-red-500 cursor-pointer hover:bg-red-500 hover:text-white">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="mt-2 text-base font-semibold">Adicione uma Foto do Produto. *.PNG, .JPG **Obrigatória**</span>
                                        <input type="file" v-on:change="getImagePath" class="hidden" required/>
                                    </label>
                                </div>
                                <div class="flex h-44 ml-6 object-contain border border-red-500 rounded-md shadow-lg object-center">
                                    <img class="object-contain object-center rounded-md" v-bind:src="imagePath" alt="">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                                <div class="mt-4">
                                    <jet-label class="block font-bold text-lg ml-4 text-red-500">
                                    Categoria *
                                    </jet-label>
                                <select id="categoria" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-full shadow-sm" v-model="form.categoria" required>
                                    <option value="Autos e peças">
                                        Autos e peças
                                    </option>
                                    <option value="Eletrônicos">
                                        Eletrônicos
                                    </option>
                                    <option value="Instrumentos musicais">
                                        Instrumentos musicais
                                    </option>
                                    <option value="Esportes e lazer">
                                        Esportes e lazer
                                    </option>
                                    <option value="Utensílios domésticos">
                                        Utensílios domésticos
                                    </option>
                                    <option value="Alimentos não perecíveis">
                                        Alimentos não perecíveis
                                    </option>
                                    <option value="Produtos pet">
                                        Produtos pet
                                    </option>
                                    <option value="Moda e beleza">
                                        Moda e beleza
                                    </option>
                                    <option value="Outros">
                                        Outros
                                    </option>
                                </select>   
                            </div>
                            <div class="mt-4">
                                    <jet-label class="block font-bold text-lg ml-4 text-red-500">
                                        Quantidade *
                                    </jet-label>
                                    <input type="number" min="1" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-full shadow-sma" v-model="form.quantidade" required autofocus/>
                                </div>
                            </div>
                            
                            <div class="justify-center">
                                <button type="submit" class="inline-flex items-center justify-center mt-8 px-4 py-2 bg-red-500 border border-transparent justify-center rounded-full text-center font-semibold text-lg text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                                    Anunciar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </app-layout>
</template>
s
<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Icon } from '@iconify/vue';

    export default {
        components: {
            AppLayout,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Icon,
        },

        data(){
            return {   
                imagePath:'', 
                form:{
                    nome: '',   
                    descricao: '',      
                    categoria: '',
                    quantidade: '', 
                    foto: ''
                }, 
            }
        },

        methods:{
            createDonation() {
                let data = new FormData();
                data.append('nome', this.form.nome);
                data.append('descricao', this.form.descricao);
                data.append('categoria', this.form.categoria);
                data.append('quantidade', this.form.quantidade);
                data.append('foto', this.form.foto);

                console.log(data);

                this.$inertia.post(this.route('quero-doar'), data);
            },

            getImagePath:function(e){
                const file = e.target.files[0];
                console.log(file);
                var form = new FormData();
                form.append('image',file);
                axios.post('getImagePath', form).then((res)=>{
                    this.imagePath = res.data;
                    this.form.foto = this.imagePath;
                })
            }
        }
    }
</script>
