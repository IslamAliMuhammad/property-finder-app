<template>
    <div class="space-y-5">
       <div class="header">
            <h1 class="font-bold text-xl">{{ apartment.title }}</h1>
            <p>
                <strong class="text-sm">{{ apartment.city.city_name }} - {{ apartment.city.governorate.governorate_name }}</strong>
                <small>Added at {{ dateFormatted }}</small>
            </p>
       </div>

       <div class="main-photo w-2/3">
            <img v-if="apartment.photos.length > 0" :src="prefixBaseURL(apartment.photos[0].photo_path)" alt="ad photo" class="rounded-2xl">
            <img v-if="apartment.photos.length == 0" src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483141.jpgs" class="rounded-2xl" alt="ad photo">
       </div>

       <div class="description space-y-5">
           <selective-description-list :list="selectiveDescriptionList"/>

           <div class="text p-3">
               <div class="address flex flex-row gap-2 mb-3">
                   <h3 class="font-semibold underline">Apartment Address: </h3>
                   <p>{{ apartment.address }}, <span class="font-semibold">{{ apartment.city.city_name }} - {{ apartment.city.governorate.governorate_name }}</span>.</p>
                </div>

               <p class="leading-relaxed" :class="textDescriptionOverflow">{{ apartment.description }}</p>
               <button @click="seeMore" class="font-bold underline text-gray-700">{{ isSeeMoreClicked ? 'see less' : 'see more'}}</button>
           </div>

       </div>

        <div class="photos space-y-3">
            <div v-for="photo in excludeMainPhoto" :key="photo.id">
                <img :src="prefixBaseURL(photo.photo_path)" class="rounded-2xl" alt="ad photo">
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
                isSeeMoreClicked: false,  
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
            prefixBaseURL(endpoint){
                return window.location.origin+ '/' + endpoint;
            }
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
                    apartment_type: this.apartment.type.type,
                    payment_option: this.apartment.payment_option ? this.apartment.payment_option.option : this.apartment.payment_option,
                    amenities: this.apartment.amenities,
                };
            },
            excludeMainPhoto(){
                return this.apartment.photos.slice(1);
            },
            isFurnished() {
                if(this.apartment.is_furnished == null){
                    return null;
                }
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
                    'h-16': !this.isSeeMoreClicked,
                    'overflow-ellipsis': !this.isSeeMoreClicked, 
                    'overflow-hidden': !this.isSeeMoreClicked,
                }
            },
        },
    }
</script>
