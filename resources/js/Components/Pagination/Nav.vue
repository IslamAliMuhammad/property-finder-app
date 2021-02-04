<template>
    <div class="py-2">
        <nav class="block">
            <ul class="flex pl-0 rounded list-none flex-wrap">
                <pagination-link v-for="link in links" :key="link.label" :link="link"/>
            </ul>
        </nav>
    </div>
</template>

<script>
    import PaginationLink from '@/Components/Pagination/Link'

    export default {
        components: {
            PaginationLink,
        },
        props: {
           links: {
               type: Array,
               required: true,
           },
        },
    }
</script>

