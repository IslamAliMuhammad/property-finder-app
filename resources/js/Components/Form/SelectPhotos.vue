<template>
    <div class="grid grid-cols-12">

        <div class="col-span-2">
            <label class="font-bold">Photos<span v-if="required" class="text-red-700 text-base">*</span></label>
        </div>

        <div class="col-span-10">
            <div class="flex flex-col gap-2">
                <input v-for="(photo, index) in photos" :key="index" type="file" :id="index" @change="onFileChange" :required="required"/>
            </div>
            <com-error-message :error="error"/>
        </div>
    </div>
</template>

<script>
import ComErrorMessage from '@/Components/Form/ErrorMessage'

export default {
    data() {
        return{
            photos: new Array(6),
        }
    },
    components: {
        ComErrorMessage,
    },
    props: {
        error: {
            type: String,
            required: false, 
        },
        required: {
            type: Boolean,
            required: false,
        },
    },
    methods: {
        onFileChange(e) {
            this.photos[e.target.id] = e.target.files[0];
            this.$emit('upload:photos', this.photos);
        },
    },
    emits: ['upload:photos'],
};
</script>
