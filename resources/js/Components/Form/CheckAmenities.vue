<template>
    <div class="grid grid-cols-12">
        
        <div class="col-span-2">
            <label class="font-bold">Amenities<span v-if="required" class="text-red-700 text-base">*</span></label>
        </div>

        <div class="col-span-10">
            <div class="grid grid-rows-5 grid-flow-col gap-2">
                <com-checkbox
                    v-for="amenity in amenities"
                    :key="amenity.id"
                    :id="amenity.id"
                    :label="amenity.amenity"
                    @update:checkbox="$emit('update:checkbox', $event)"
                    :required="required"
                    :amenitiesChecked="amenitiesChecked"
                />
            </div>
            <com-error-message :error="error"/>
        </div>

    </div>
</template>

<script>
import ComCheckbox from "@/Components/Form/Checkbox";
import ComErrorMessage from '@/Components/Form/ErrorMessage';


export default {
    components: {
        ComCheckbox,
        ComErrorMessage,
    },
    props: {
        amenities: {
            type: Array,
            required: true,
        },
        error: {
            type: String,
            required: false,
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
};
</script>
