<template>
    <div class="space-y-5">
       <div class="header">
            <h1 class="font-bold text-xl">{{ apartment.title }}</h1>
            <p>
                <strong class="text-sm">{{ apartment.city.city_name }}</strong>
                <small>Added at {{ dateFormatted }}</small>
            </p>
       </div>

       <div class="main-photo w-2/3">
            <img v-if="apartment.photos.length > 0" :src="apartment.photos[0].photo_path" alt="ad photo">
            <img v-if="apartment.photos.length == 0" src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483141.jpgs" alt="ad photo">
       </div>

       <div class="description space-y-5">
           <selective-description-list :list="selectiveDescriptionList"/>

           <div class="text p-3">
               <p class="leading-relaxed" :class="textDescriptionOverflow">{{ apartment.description }}</p>
               <button @click="seeMore" class="font-bold underline text-gray-700">{{ isSeeMoreClicked ? 'see less' : 'see more'}}</button>
           </div>

       </div>

        <div class="photos space-y-3">
        <div v-for="photo in apartment.photos" :key="photo.id">
                <img :src="photo.photo_path" alt="ad photo">
            </div>
        </div>
        

        <inertia-link :href="route('apartments.index')" class="flex flex-row gap-1">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 text-gray-600">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
            <span class="font-bold text-gray-600">Back</span>
        </inertia-link>

    </div>
    
</template>     

<script>
    import SelectiveDescriptionList from '@/Components/Ad/SelectiveDescriptionList'

    export default {
        components: {
            SelectiveDescriptionList,
        },
        data() {
            return {
                isSeeMoreClicked: true,  
            }
        },
        props: {
            apartment: {
                type: Object,
                required: true,
            }
        },
        methods: {
            seeMore(e) {
                this.isSeeMoreClicked = !this.isSeeMoreClicked;
            },
        },
        computed: {
            selectiveDescriptionList() {
                return {
                    bedrooms: this.apartment.bedrooms,
                    bathrooms: this.apartment.bathrooms,
                    area: this.apartment.area,
                    furnished: this.isFurnished,
                    level: this.apartment.level,
                    ad_type: this.adType,
                    apartment_type: this.apartment.type,
                    payment_option: this.apartment.payment_option ? this.apartment.payment_option.option : this.apartment.payment_option,
                    amenities: this.apartment.amenities,
                };
            },
            isFurnished() {
                return this.apartment.is_furnished ? 'yes' : 'No';
            },
            adType() {
                return this.apartment.for_sale ? 'For Sale' : 'For Rent';
            },
            dateFormatted() {
                const date = new Date(this.apartment.created_at);
                return date.toLocaleString('en-us', {month: 'long', day: '2-digit', year: 'numeric'});
            },  
            textDescriptionOverflow() {
                return {
                    'h-96': !this.isSeeMoreClicked, 
                    'overflow-ellipsis': !this.isSeeMoreClicked, 
                    'overflow-hidden': !this.isSeeMoreClicked,
                }
            },
        },
    }
</script>
