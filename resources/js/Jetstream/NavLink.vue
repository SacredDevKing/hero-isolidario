<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link,
        },
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                    ? 'inline-flex fill-current items-center px-1 pt-1 border-b-2 border-red-400 text-sm font-medium font-semibold leading-5 text-red-500 focus:outline-none focus:border-red-500 transition'
                    : 'inline-flex fill-current items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium font-semibold leading-5 text-gray-50 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition'
            }
        }
    }
</script>


