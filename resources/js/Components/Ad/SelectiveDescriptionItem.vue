<template>
    <div class="flex flex-row gap-4">
        <h3 class="font-bold capitalize">{{ itemHeader }}</h3>

        <ul v-if="Array.isArray(this.item) && this.item.length > 0">
            <li v-for="obj in item" :key="obj.id">{{ obj.amenity }}</li>
        </ul>

        <p v-else> 
            {{ itemValue }}
        </p>

    </div>
</template>     

<script>

    export default {
        components: {

        },
        props: {
            item: {
                required: true,
            },
            header: {
                required: String,
                required: true,
            }
        },
        methods: {
            
        },
        computed: {
            itemHeader(){
               return this.header.replace('_', ' ');
            },
            itemValue(){
                if(Array.isArray(this.item)) {
                    return this.item.length > 0 ? this.item : 'None';
                }else{  
                    return this.item ? this.item : 'None';
                }
            },
        },
    }
</script>
