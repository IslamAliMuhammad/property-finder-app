<template>
    <app-layout>
        <div class="container mx-auto">

            <div v-if="ads.data.length > 0">
                <div class="grid grid-cols-3">
                    <com-ad v-for="ad in ads.data" :key="ad.id" :ad="ad"/>
                </div>

                <pagination-nav :links="ads.links"/>
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
    import ComAd from '@/Components/Ad'
    import PaginationNav from '@/Components/Pagination/Nav'

    export default {
        components: {
            AppLayout,
            ComAd,
            PaginationNav,
        },
        props: {
            ads: {
                type: Object,
                required: true,
            },
        },
    }
</script>
