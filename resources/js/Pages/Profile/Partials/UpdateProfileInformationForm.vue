<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Informações de perfil
        </template>

        <template #description>
            Atualizar a informação do seu perfil e endereço de e-mail.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4" v-if="$page.props.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Foto" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Selecione uma nova foto
                </jet-secondary-button>

                <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                    Remover foto
                </jet-secondary-button>

                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Nome -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="nome" value="Nome" />
                <jet-input id="nome" type="text" class="mt-1 block w-full" v-model="form.nome" autocomplete="first_name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Sobrenome -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="sobrenome" value="Sobrenome" />
                <jet-input id="sobrenome" type="text" class="mt-1 block w-full" v-model="form.sobrenome" autocomplete="last_name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Apelido -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="apelido" value="Apelido" />
                <jet-input id="apelido" type="text" class="mt-1 block w-full" v-model="form.apelido"/>
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email"/>
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>
                
            <!-- Genero -->
            <div class="col-span-6 sm:col-span-4">
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
            
            <!--Data de Nascimento/Celular-->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="data_nascimento" value="Data de nascimento" />
                <jet-input id="data_nascimento" type="date" class="mt-1 block w-full" v-model="form.data_nascimento" :max="max" required autocomplete="data_nascimento"></jet-input>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="celular" value="Celular" />
                <jet-input id="celular" type="text" class="mt-1 block w-full" v-model="form.celular" @keyup="celMask" :maxlength='11' placeholder="(00) 00000-0000" required autocomplete="celular"></jet-input>
            </div>

            <!--Rua/Bairro-->
            
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="rua" value="Rua"/>
                    <jet-input id="rua" type="text" class="mt-1 block w-full" v-model="form.rua" required autocomplete="rua"/>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="bairro" value="Bairro"/>
                    <jet-input id="bairro" type="text" class="mt-1 block w-full" v-model="form.bairro" required autocomplete="bairro"/>
                </div>
            

            <!--Numero/Cidade-->
            
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="numero" value="Número"/>
                    <jet-input id="numero" type="text" class="mt-1 block w-full" v-model="form.numero" required autocomplete="numero"/>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="cidade" value="Cidade"/>
                    <jet-input id="cidade" type="text" class="mt-1 block w-full" v-model="form.cidade" required autocomplete="cidade"/>
                </div>
            

            
                <div class="col-span-6 sm:col-span-4">
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
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="cep" value="CEP"/>
                    <jet-input id="cep" type="text" class="mt-1 block w-full" v-model="form.cep" @keyup="cepMask" :maxlength='8' placeholder="00.000-000" required autocomplete="cep"/>
                </div>
            
            
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Salvo.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Salvar
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    nome: this.user.nome,
                    sobrenome: this.user.sobrenome,
                    apelido: this.user.apelido,
                    email: this.user.email,
                    genero: this.user.genero,
                    data_nascimento: this.user.data_nascimento,
                    celular: this.user.celular,
                    cidade: this.user.cidade,
                    rua: this.user.rua,
                    bairro: this.user.bairro,
                    numero: this.user.numero,
                    uf: this.user.uf,
                    cep: this.user.cep,
                    photo: null
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const photo = this.$refs.photo.files[0];

                if (! photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);
            },

            deletePhoto() {
                this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                });
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },

            cepMask(){
                this.form.cep = this.form.cep.replace(/[^0-9]/g, '').replace(/^(\d{2})(\d{3})(\d{3})/g, '$1.$2-$3');
            },

            celMask(){
                this.form.celular = this.form.celular.replace(/[^0-9]/g, '').replace(/^(\d{2})(\d{5})(\d{4})/g, '($1) $2-$3')
            },

            resetMask(){
                this.form.cep = this.form.cep.replace(/[^0-9]/g, '');
                this.form.celular = this.form.celular.replace(/[^0-9]/g, '');
            }
        },
    }
</script>
