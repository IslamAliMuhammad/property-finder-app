<template>
    <div class="grid grid-cols-12">

        <div class="col-span-2">
            <label v-if="label" for="apartmentTypeInput" class="font-bold">{{
                label
            }}<span v-if="required" class="text-red-700 text-base">*</span></label>
        </div>

        <div class="col-span-10">
            <div class="relative inline-block text-gray-700">
                <select
                    class="h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                    :class="width"
                    :id="id"
                    :value="modelValue"
                    @input="$emit('update:modelValue', $event.target.value)"
                    :required="required"
                >
                    <option value=''>Choose</option>
                    <option v-for="(option, index) in options" :key="index" :value="option.id">
                        {{ optionName(option) }}
                    </option>
                </select>
                <div
                    class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"
                >
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                        ></path>
                    </svg>
                </div>
            </div>

            <com-error-message :error="error"/>
        </div>

    </div>
</template>

<script>
import ComErrorMessage from '@/Components/Form/ErrorMessage'

export default {
    components: {
        ComErrorMessage,
    },
    props: {
        id: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: false,
        },
        options: {
            type: Array,
            required: true,
        },
        optionNameAttribute: {
            type: String,
            required: false,
        },
        width: {
            type: String,
            required: false,
        },
        modelValue: {
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
    },
    emits: ['update:modelValue'],
    methods: {
        optionName(option) {
            if(this.optionNameAttribute){
                return option[this.optionNameAttribute];
            }
            return option;
        },
    },
};
</script>
