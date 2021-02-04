<template>
     <li>
        <a :href="link.url" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 text-white bg-red-500">
            {{ link.label }}
        </a>
    </li>
</template>

<script>

    export default {
        components: {

        },
        props: {
           link: {
               type: Object,
               required: true,
           },
        },
    }
</script>
