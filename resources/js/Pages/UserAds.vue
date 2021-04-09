<template>
    <app-layout>
        <div>
            <h2 class="text-2xl bg-gray-100 rounded-xl shadow-lg p-3 pl-8 font-semibold text-gray-700 mt-3 max-w-full text-center">Apartment ads</h2>
            <ad-list :ads="apartments" adCategory="apartments" />
        </div>

        <div>
            <h2 class="text-2xl bg-gray-100 rounded-xl shadow-lg p-3 pl-8 font-semibold text-gray-700 mt-3 text-center">Villa ads</h2>
            <ad-list :ads="villas" adCategory="villas"/>
        </div>

        <div>
            <h2 class="text-2xl bg-gray-100 rounded-xl shadow-lg p-3 pl-8 font-semibold text-gray-700 mt-3 text-center">Land ads</h2>
            <ad-list :ads="lands" adCategory="lands"/>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import AdList from '@/Components/Ad/AdList'
    export default {
        components: {
            AppLayout,
            AdList,
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
