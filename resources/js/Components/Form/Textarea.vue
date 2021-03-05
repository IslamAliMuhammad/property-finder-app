<template>
    <div class="grid grid-cols-12">

        <div class="col-span-2">
            <label class="font-bold" for="description">{{ label }}<span v-if="required" class="text-red-700 text-base">*</span></label>
        </div>

        <div class="col-span-10">
            <textarea
                class="h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline"
                :class="width"
                :id="id"
                :value="modelValue"
                @input="onInput"
                :required="required"
                :maxlength="maxLength"
            ></textarea>
        
            <com-error-message :error="error"/>

            <div v-if="id == 'description'" class="text-xs font-semibold"><span>{{ counter }}</span> characters left</div>
        </div>
    </div>
</template>

<script>
import ComErrorMessage from '@/Components/Form/ErrorMessage'

export default {
    data() {
        return {
            counter: this.maxLength,
        };
    },
    components: {
        ComErrorMessage,
    },
    methods: {
        onInput(e) {
            this.$emit('update:modelValue', e.target.value)

            if(e.data != null){
                this.counter--;
            }else{
                this.counter++;
            }
        }
    },
    props: {
        id: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        width: {
            type: String,
            required: true,
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
        maxLength: {
            type: Number,
            required: false,
        },
    },
    emits: ['update:modelValue'],
};
</script>
