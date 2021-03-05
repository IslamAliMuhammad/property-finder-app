<template>
    <label class="text-gray-700">
        <input type="checkbox" :value="id" @change="$emit('update:checkbox', $event.target)" :required="required"/>
        <span class="ml-1">{{ label }}</span>
    </label>
</template>

<script>
export default {
    props: {
        id: {
            type: Number,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        required: {
            type: Boolean,
            required: false,
        },
    },
    emits: ['update:checkbox'],
};
</script>
