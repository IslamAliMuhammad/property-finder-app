<template>
    <div class="selective grid grid-cols-2 grid-flow-row">
        <selective-description-item v-for="(item, index) in list" :key="index" :item="item" :header="index"/>
    </div>
</template>

<script>
    import SelectiveDescriptionItem from '@/Components/Ad/SelectiveDescriptionItem'

    export default {
        components: {
            SelectiveDescriptionItem,
        },
        props: {
            list: {
                type: Object,
                required: true,
            },
        },
        computed: {
            
        },
    }
</script>
