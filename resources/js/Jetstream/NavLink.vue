<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                            ? 'inline-flex text-lg items-center px-1 pt-1 border-b-2 border-gray-300 text-sm font-medium leading-5 text-gray-700 hover:border-gray-700 focus:outline-none focus:border-gray-700 transition duration-150 ease-in-out'
                            : 'inline-flex text-lg items-center px-1 pt-1 border-b-2 border-transparent font-medium leading-5 text-gray-700 hover:text-gray-700 hover:border-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
            }
        }
    }
</script>
