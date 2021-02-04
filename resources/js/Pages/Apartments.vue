<template>
    <app-layout>
        <div class="container mx-auto">
            <div class="grid grid-cols-3">
                <apartment v-for="apartment in apartments.data" :key="apartment.id" :apartment="apartment"/>
            </div>

            <pagination-nav :links="apartments.links"/>

        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Apartment from '@/Components/Apartment'
    import PaginationNav from '@/Components/Pagination/Nav'

    export default {
        components: {
            AppLayout,
            Apartment,
            PaginationNav,
        },
        props: {
            apartments: {
                type: Object,
                required: true,
            },
        },
    }
</script>
