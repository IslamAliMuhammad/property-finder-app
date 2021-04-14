<template>
    <label class="text-gray-700">
        <input type="checkbox" :value="id" @change="$emit('update:checkbox', $event.target)" :required="required" :checked="isChecked"/>
        <span class="ml-1">{{ label }}</span>
    </label>
</template>

<script>
export default {
     computed: {
        isChecked() {
           for(let amenityChecked of this.amenitiesChecked) {
                if(amenityChecked == this.id){
                    return true;
                }
           }
        },
    },
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
        amenitiesChecked: {
            type: Array,
            required: false,
        },
    },
    emits: ['update:checkbox'],
};
</script>
