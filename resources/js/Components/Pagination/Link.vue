<template>
     <li>
        <inertia-link :href="linkUrl" :preserve-scroll="preserveScroll" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid text-white" :class="linkColor">
            <span v-if="typeof link.label == 'number'">{{ link.label }}</span>
            <span v-if="typeof link.label == 'string'" v-html="navigationSymbols"></span>
        </inertia-link>
    </li>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        components: {
           
        },
        props: {
           link: {
               type: Object,
               required: true,
           },
           preserveScroll: {
               type: Boolean,
               required: false,
           },
        },
        computed: {
            navigationSymbols() {
                const Symbol = this.link.label.slice(this.link.label.indexOf('&'), this.link.label.indexOf(';') + 1);
                return Symbol; 
            },
             linkColor() {
                 if(this.link.active || this.link.url === null) {
                     return {
                        'border-gray-400': true,
                        'bg-gray-400': true,
                        'cursor-default': true,
                     }
                 }

                return {
                    'border-gray-600': true,
                    'bg-gray-600': true,
                 
                }
            },
            linkUrl() {
                return this.link.url ? this.link.url : '';
            },
        },
    }
</script>
