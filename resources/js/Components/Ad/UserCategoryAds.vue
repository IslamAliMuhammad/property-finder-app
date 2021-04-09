<template>
    <div>
        <h2 class="text-2xl bg-gray-100 rounded-xl shadow-lg p-3 pl-8 font-semibold text-gray-700 mt-3 max-w-full text-center">{{ header }}</h2>
        <com-ad-list :ads="ads" :adCategory="adCategory" :preserveScroll="preserveScroll"/>
    </div>
</template>

<script>
    import ComAdList from '@/Components/Ad/AdList'

    export default {
        components: {
            ComAdList,
        },
        props: {
            header: {
                type: String,
                required: true,
            },
            ads: {
                type: Object,
                required: true,
            },
            adCategory: {
                type: String,
                required: true,
            },
            preserveScroll: {
               type: Boolean,
               required: false,
           },
        },
    }
</script>
