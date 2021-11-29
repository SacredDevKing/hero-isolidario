<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="min-h-screen bg-gray-100 shadow">
            <nav class="bg-purple-500 border-b border-gray-100 shadow">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="route('home')">
                                    <jet-application-mark class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                                <jet-nav-link :href="route('doacoes')" :active="route().current('doacoes')">
                                    <Icon icon="icon-park-outline:ad-product" style="font-size:32px" class="mr-2"/>
                                    Doações
                                </jet-nav-link>

                                <jet-nav-link :href="route('projetos-caridade')" :active="route().current('projetos-caridade')">
                                    <Icon icon="iconoir:donate" style="font-size:32px" class="mr-2"/>
                                    Projetos
                                </jet-nav-link>

                                <jet-nav-link :href="route('sobre-nos')" :active="route().current('sobre-nos')">
                                    <Icon icon="ant-design:info-circle-outlined" style="font-size:32px" class="mr-2"/>
                                    Sobre
                                </jet-nav-link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <!-- Teams Dropdown -->
                                <jet-dropdown align="right" width="60" v-if="$page.props.jetstream.hasTeamFeatures">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                {{ $page.props.user.current_team.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    Manage Team
                                                </div>

                                                <!-- Team Settings -->
                                                <jet-dropdown-link :href="route('teams.show', $page.props.user.current_team)">
                                                    Team Settings
                                                </jet-dropdown-link>

                                                <jet-dropdown-link :href="route('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                                                    Create New Team
                                                </jet-dropdown-link>

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Switcher -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    Switch Teams
                                                </div>

                                                <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                                    <form @submit.prevent="switchToTeam(team)">
                                                        <jet-dropdown-link as="button">
                                                            <div class="flex items-center">
                                                                <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                <div>{{ team.name }}</div>
                                                            </div>
                                                        </jet-dropdown-link>
                                                    </form>
                                                </template>
                                            </template>
                                        </div>
                                    </template>
                                </jet-dropdown>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ $page.props.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            <Icon icon="healthicons:ui-user-profile-outline" style="font-size:32px" class=""/>
                                            Conta
                                        </div>

                                        <jet-dropdown-link :href="route('profile.show')">
                                            Perfil
                                        </jet-dropdown-link>

                                        <jet-dropdown-link :href="route('minhas-doacoes')">
                                            Minhas Doações
                                        </jet-dropdown-link>

                                        <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                            API Tokens
                                        </jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Sair
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>

                            <Link :href="route('quero-doar')">
                                <jet-button class="ml-4 rounded-full" :href="route('quero-doar')">Quero Doar</jet-button>
                            </Link>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('home')" :active="route().current('home')">
                            Home
                        </jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                API Tokens
                            </jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Log Out
                                </jet-responsive-nav-link>
                            </form>

                            <!-- Team Management -->
                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Team
                                </div>

                                <!-- Team Settings -->
                                <jet-responsive-nav-link :href="route('teams.show', $page.props.user.current_team)" :active="route().current('teams.show')">
                                    Team Settings
                                </jet-responsive-nav-link>

                                <jet-responsive-nav-link :href="route('teams.create')" :active="route().current('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                                    Create New Team
                                </jet-responsive-nav-link>

                                <div class="border-t border-gray-200"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Switch Teams
                                </div>

                                <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                    <form @submit.prevent="switchToTeam(team)">
                                        <jet-responsive-nav-link as="button">
                                            <div class="flex items-center">
                                                <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <div>{{ team.name }}</div>
                                            </div>
                                        </jet-responsive-nav-link>
                                    </form>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </nav>
            
            
            <!-- Page Heading
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header> -->

            <!-- Page Content -->
            <main id="app">
                <slot></slot>
            </main>

            <div class="w-full min-h-screen flex items-center justify-center bg-purple-500">
                <div class="md:w-2/3 w-full px-4 text-white flex flex-col">
                    <div class="flex flex-col">
                        <div>
                            <div class="flex flex-row">
                                <Icon icon="akar-icons:clock" class="text-gray-400" style="font-size:32px"/>
                                <p class="text-gray-400 ml-2 text-lg font-semibold">Horário de funcionamento</p>
                            </div>
                            <div class="flex flex-row">
                                <p class="text-gray-400 text-sm mt-2 ml-6">De Segunda a Sexta das 8h às 12h. E das 14h às 20h.</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex flex-row">
                                <Icon icon="bi:telephone" class="text-gray-400" style="font-size:32px"/>
                                <p class="text-gray-400 ml-2 text-lg font-semibold">Telefone</p>
                            </div>
                            <div class="flex flex-row">
                                <p class="text-gray-400 text-sm mt-2 ml-6">4002-8922</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex flex-row">
                                <Icon icon="bi:telephone" class="text-gray-400" style="font-size:32px"/>
                                <p class="text-gray-400 ml-2 text-lg font-semibold">Localização</p>
                            </div>
                            <div class="flex flex-row">
                                <p class="text-gray-400 text-sm mt-2 ml-6">Av. Thurusbingu Thurusbangu, 666, Mooca - SP</p>
                            </div>
                        </div>
                    <div class="flex mt-24 mb-12 flex-row flex-wrap justify-between">
                        <div class="">
                            <Link :href="route('home')">
                                <jet-application-mark class="block h-9 w-auto" />
                            </Link>
                        </div>
                            <Link :href="route('sobre-nos')">
                                <div class="hidden md:block cursor-pointer text-gray-400 hover:text-white uppercase">Sobre</div>
                            </Link>
                            <a :href="route('terms.show')" class="hidden md:block cursor-pointer text-gray-400 hover:text-white uppercase">Termos de Uso</a>
                            <a :href="route('policy.show')" class="hidden md:block cursor-pointer text-gray-400 hover:text-white uppercase">Políticas de Privacidade</a>
                    </div>
                    <hr class="border-gray-400"/>
                    <p class="w-full text-center my-12 text-gray-400">Copyright © 2021 Herói Solidário</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<style scoped>
    .bg-purple-500 {
        background-color: #3D3D52;
    }
</style>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { Icon } from '@iconify/vue';

    export default {
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            JetButton,
            JetInput,
            Icon,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
