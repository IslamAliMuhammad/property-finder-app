<template>
    <div class="error text-red-700" v-if="error">{{ error }}</div>
</template>

<script>
    export default {
        props: {
            error: {
                type: String,
                required: false,
            }
        },
    }
</script>

