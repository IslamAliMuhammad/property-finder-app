<template>
    <div class="grid grid-cols-12">

        <div class="col-span-2">
            <label class="font-bold" :for="id">{{ label }}<span v-if="required" class="text-red-700 text-base">*</span></label>
        </div>

        <div class="col-span-10">
            <input
                class="h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline mb-1"
                :class="width"
                :type="type"
                :id="id"
                :value="modelValue"
                @input="onInput"
                :step="step"
                :min="min"
                :required="required"
                :maxlength="maxLength"
            />
            <span class="font-bold" v-if="suffix" v-html="suffix"></span>

            <com-error-message :error="error"/>

            <div v-if="id == 'title'" class="text-xs font-semibold"><span>{{ counter }}</span> characters left</div>
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
            this.$emit('update:modelValue', e.target.value);

            if(e.data != null){
                this.counter--;
            }else{  
                this.counter++;
            }
        },
    },
    computed: {
        inputValue() {
            
        },
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
        type: {
            type: String,
            required: true,
        },
        width: {
            type: String,
            required: true,
        },
        suffix: {
            type: String,
            required: false,
        },
        modelValue: {
            required: true, 
        },
        step: {
            type: String,
            required: false,
        },
        min: {
            type: String,
            required: false,
        },
        max: {
            type: String,
            required: false,
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
