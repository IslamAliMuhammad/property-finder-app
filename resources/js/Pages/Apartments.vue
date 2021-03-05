<template>
    <app-layout>
        <div class="container mx-auto">

            <div v-if="apartments.data.length > 0">
                <div class="grid grid-cols-3">
                    <apartment v-for="apartment in apartments.data" :key="apartment.id" :apartment="apartment"/>
                </div>

                <pagination-nav :links="apartments.links"/>
            </div>

            <div v-else>
                <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mt-3 text-center" role="alert">
                    <p class="">Sorry, there are no apartments available</p>
                </div>
            </div>
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
