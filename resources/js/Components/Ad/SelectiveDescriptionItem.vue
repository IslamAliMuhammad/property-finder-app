<template>
    <div class="flex flex-row gap-4 text-sm">
        <h3 class="font-bold capitalize">{{ headerFormatted }}</h3>

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
             header: {
                required: String,
                required: true,
            },
            item: {
                required: true,
            },    
        },
        methods: {
            
        },
        computed: {
            headerFormatted(){
               return this.header.replace('ad_', ' ');
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
