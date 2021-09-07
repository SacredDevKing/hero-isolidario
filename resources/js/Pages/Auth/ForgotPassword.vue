<template>
    <Head title="Forgot Password" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>
        
        <!--Formulário-->
        <jet-label class="block font-semibold text-2xl text-gray-700 mt-4">
            Redefinir senha
        </jet-label>

        <div class="flex flex-row">
            <jet-label>Já possui uma conta?</jet-label>
            <Link :href="route('login')" class="underline text-sm text-red-600 hover:red-gray-900 pl-1">
                Fazer login
            </Link>
        </div>

        <div class="mt-4 mb-4 text-sm text-gray-600">
            Esqueceu sua senha? Sem problemas! Apenas deixe a gente saber seu endereço de email e nós iremos lhe enviar um email com o link para criar uma nova.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Enviar
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { Head } from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'

    export default {
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    }
</script>
