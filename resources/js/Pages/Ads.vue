<template>
    <app-layout>
        <com-ad-list :ads="ads"/>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ComAdList from '@/Components/Ad/AdList'
    export default {
        components: {
            AppLayout,
            ComAdList,
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
        },
    }
</script>
