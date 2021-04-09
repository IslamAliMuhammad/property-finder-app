<template>
    <app-layout>
        <com-user-category-Ads header="Apartment ads" :ads="apartments" adCategory="apartments" :preserveScroll="true"/>
       
        <com-user-category-Ads header="Villa ads" :ads="villas" adCategory="villas" :preserveScroll="true"/>

        <com-user-category-Ads header="Land ads" :ads="lands" adCategory="lands" :preserveScroll="true"/>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ComUserCategoryAds from '@/Components/Ad/UserCategoryAds'
    export default {
        components: {
            AppLayout,
            ComUserCategoryAds,
        },
        props: {
            apartments: {
                type: Object,
                required: true,
            },
             villas: {
                type: Object,
                required: true,
            },
             lands: {
                type: Object,
                required: true,
            },
        },
    }
</script>
