<template>
    <div>
        <div class="container mx-auto">
            <div v-if="ads.data.length > 0">
                <div class="grid grid-cols-3">
                    <com-ad v-for="ad in ads.data" :key="ad.id" :ad="ad" :adCategory="adCategory"/>
                </div>

                <pagination-nav :links="ads.links" :preserveScroll="preserveScroll"/>
            </div>

            <div v-else>
                <div
                    class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mt-3 text-center"
                    role="alert"
                >
                    <p class="">Sorry, there are no {{ adCategory }} available</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ComAd from '@/Components/Ad'
import PaginationNav from '@/Components/Pagination/Nav'

export default {
    components: {
        ComAd,
        PaginationNav,
    },
    props: {
        ads: {
            type: Object,
            required: true,
        },
        adCategory: {
            type: String,
            required: false,
        },
        preserveScroll: {
            type: Boolean,
            required: false,
        },
    },
};
</script>
