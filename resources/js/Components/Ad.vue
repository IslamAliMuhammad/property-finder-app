<template>
    <inertia-link :href="route(adDetailRoute, ad.id)">
        <div class="max-w-xs overflow-hidden rounded-lg shadow-lg my-3 hover:shadow-xl">
            <img class="object-cover w-full h-48" :src="adPhoto"/>

            <div class="px-6 py-4">
                <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800 h-20">{{ ad.title }}</h4>
                <p class="font-bold">{{ priceFormatter }} EGP</p>
                <p>{{ ad.city.city_name }}</p>
                <div v-if="route().current('ads.index')" class="mt-3 space-x-6 text-xl text-gray-500">
                    <inertia-link :href="route(editFormRoute, ad.id)" method="get" class="hover:text-white hover:bg-gray-400 p-2 rounded-lg font-semibold bg-gray-200" preserve-scroll as="button">Update</inertia-link>

                    <inertia-link :href="route(deleteRoute, ad.id)" method="delete" class="hover:text-red-700 hover:bg-gray-400 p-2 rounded-lg font-semibold bg-gray-200" preserve-scroll as="button">Delete</inertia-link>
                </div>
            </div>
        </div>
    </inertia-link>
</template>

<script>

    export default {
        components: {

        },
        props: {
            ad: {
                type: Object,
                required: true,
            },
            adCategory: {
                type: String,
                required: false,
            },
        },
        computed: {
            adDetailRoute() {
                switch(route().current()){
                    case 'apartments.index':
                        return 'apartments.show';
                    case 'villas.index':
                        return 'villas.show';
                    case 'lands.index':
                        return 'lands.show';
                    case 'ads.index':
                        return this.adCategory + '.show';
                }                
            },
            adPhoto() {
                return this.ad.photos.length > 0 ? new URL(this.ad.photos[0].photo_path, window.location.origin) : 'https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg';
            },
            priceFormatter() {
                return new Intl.NumberFormat().format(this.ad.price);
            },
            deleteRoute(){
                return this.adCategory + '.destroy';
            },
            editFormRoute(){
                return this.adCategory + '.edit';
            },
          
        }
    }
</script>
