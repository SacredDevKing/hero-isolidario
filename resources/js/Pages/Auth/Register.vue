<template>
    <Head title="Register" />

    <jet-authentication-card>
        
        <!--LOGO-->
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <!--Validação de Erros-->
        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">

        <!--Formulário-->
        <jet-label class="block font-semibold text-2xl text-gray-700 mt-4">
            Criar Conta
        </jet-label>

        <div class="flex flex-row">
            <jet-label>Já possui uma conta?</jet-label>
            <Link :href="route('login')" class="underline text-sm text-red-600 hover:red-gray-900 pl-1">
                Fazer login
            </Link>
        </div>

            <!--E-mail-->
            <div class="mt-4">
                <jet-label for="email" value="E-mail" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
            </div>
            
            <!--Nome e Sobrenome-->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                <div class="mt-4"> 
                    <jet-label for="nome" value="Nome" />
                    <jet-input id="nome" type="text" class="mt-1 block w-full" v-model="form.nome" required autofocus autocomplete="first_name"/>
                </div>

                <div class="mt-4">
                    <jet-label for="sobrenome" value="Sobrenome" />
                    <jet-input id="sobrenome" type="text" class="mt-1 block w-full" v-model="form.sobrenome" required autofocus autocomplete="last_name"/>
                </div>
            </div>
            
            <!--Senha e Confirmação-->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                <div class="mt-4">
                    <jet-label for="password" value="Senha" />
                    <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new_password" />
                </div>

                <div class="mt-4">
                    <jet-label for="password_confirmation" value="Confirmação de senha" />
                    <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new_password" />
                </div>
            </div>

            <!--Apelido e Gênero-->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                <div class="mt-4">
                    <jet-label for="apelido" value="Apelido" />
                    <jet-input id="apelido" type="text" class="mt-1 block w-full" v-model="form.apelido" required autofocus autocomplete="username"/>
                </div>

                <div class="mt-4">
                    <jet-label for="genero" value="Gênero" />
                    <select id="genero" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm" v-model="form.genero" required>
                            <option value="masculino">
                                Masculino
                            </option>
                            <option value="feminino">
                                Feminino
                            </option>
                    </select>
                </div>
            </div>

            <!--Data de Nascimento/Celular-->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                <div class="mt-4">
                    <jet-label for="data_nascimento" value="Data de nascimento" />
                    <jet-input id="data_nascimento" type="date" class="mt-1 block w-full" v-model="form.data_nascimento" :max="max" required autocomplete="data_nascimento"></jet-input>
                </div>
                <div class="mt-4">
                    <jet-label for="celular" value="Celular" />
                    <jet-input id="celular" type="text" class="mt-1 block w-full" v-model="form.celular" @keyup="celMask" :maxlength='11' placeholder="(00) 00000-0000" required autocomplete="celular"></jet-input>
                </div>
            </div>

            <!--Rua/Bairro-->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                <div class="mt-4">
                    <jet-label for="rua" value="Rua"/>
                    <jet-input id="rua" type="text" class="mt-1 block w-full" v-model="form.rua" required autofocus autocomplete="rua"/>
                </div>
                <div class="mt-4">
                    <jet-label for="bairro" value="Bairro"/>
                    <jet-input id="bairro" type="text" class="mt-1 block w-full" v-model="form.bairro" required autofocus autocomplete="bairro"/>
                </div>
            </div>

            <!--Numero/Cidade-->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                <div class="mt-4">
                    <jet-label for="numero" value="Número"/>
                    <jet-input id="numero" type="text" class="mt-1 block w-full" v-model="form.numero" required autofocus autocomplete="numero"/>
                </div>
                <div class="mt-4">
                    <jet-label for="cidade" value="Cidade"/>
                    <jet-input id="cidade" type="text" class="mt-1 block w-full" v-model="form.cidade" required autofocus autocomplete="cidade"/>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                <div class="mt-4">
                    <jet-label for="uf" value="UF" />
                    <select id="uf" class="mt-1 block w-full border-gray-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm" v-model="form.uf" required>
                            <option value="ac">
                                AC (Acre)
                            </option>
                            <option value="al">
                                AL (Alagoas)
                            </option>
                            <option value="ap">
                                AP (Amapá)
                            </option>
                            <option value="am">
                                AM (Amazonas)
                            </option>
                            <option value="ba">
                                BA (Bahia)
                            </option>
                            <option value="ce">
                                CE (Ceará)
                            </option>
                            <option value="df">
                                DF (Distrito Federal)
                            </option>
                            <option value="es">
                                ES (Espírito Santo)
                            </option>
                            <option value="go">
                                GO (Goiás)
                            </option>
                            <option value="ma">
                                MA (Maranhão)
                            </option>
                            <option value="mt">
                                MT (Mato Grosso)
                            </option>
                            <option value="ms">
                                MS (Mato Grosso do Sul)
                            </option>
                            <option value="pa">
                                PA (Pará)
                            </option>
                            <option value="pr">
                                PR (Paraíba)
                            </option>
                            <option value="pe">
                                PE (Pernambuco)
                            </option>
                            <option value="pi">
                                PI (Piauí)
                            </option>
                            <option value="rj">
                                RJ (Rio de Janeiro)
                            </option>
                            <option value="rn">
                                RN (Rio Grande do Norte)
                            </option>
                            <option value="rs">
                                RS (Rio Grande do Sul)
                            </option>
                            <option value="ro">
                                RO (Rondônia)
                            </option>
                            <option value="rr">
                                RR (Roraima)
                            </option>
                            <option value="sc">
                                SC (Santa Catarina)
                            </option>
                            <option value="sp">
                                SP (São Paulo)
                            </option>
                            <option value="mg">
                                SE (Sergipe)
                            </option>
                            <option value="to">
                                TO (Tocantins)
                            </option>
                    </select>
                </div>
                <div class="mt-4">
                    <jet-label for="cep" value="CEP"/>
                    <jet-input id="cep" type="text" class="mt-1 block w-full" v-model="form.cep" @keyup="cepMask" :maxlength='8' placeholder="00.000-000" required autofocus autocomplete="cep"/>
                </div>
            </div>
            
                
            <!--Termos de Uso-->
            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" required v-model:checked="form.terms" />

                        <div class="ml-2">
                            Eu aceito os <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Termos de Uso</a> e as <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Políticas de Privacidade</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <!--Criar conta-->
            <div class="flex items-center justify-end mt-4">
                <jet-button class="ml-4" v-on:click='resetMask' :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Criar conta
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { watch } from '@vue/runtime-core'

    export default {
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    nome: '',
                    sobrenome: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    apelido: '',
                    genero:'',
                    data_nascimento: '',
                    celular: '',
                    cidade: '',
                    rua: '',
                    bairro: '',
                    numero: '',
                    uf: '',
                    cep: '',
                    terms: false,
                    
                }),

                max: new Date(2021,1,1)
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            },

            cepMask(){
                this.form.cep = this.form.cep.replace(/[^0-9]/g, '').replace(/^(\d{2})(\d{3})(\d{3})/g, '$1.$2-$3');
            },

            celMask(){
                this.form.celular = this.form.celular.replace(/[^0-9]/g, '').replace(/^(\d{2})(\d{5})(\d{4})/g, '($1) $2-$3')
            },

            resetMask(){
                this.form.cep = this.form.cep.replace(/[^0-9]/g, '');
                this.form.celular = this.form.cep.replace(/[^0-9]/g, '');
            }
        },
    }
</script>