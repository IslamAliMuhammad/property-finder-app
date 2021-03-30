<template>
    <div class="space-y-5">
       <div class="header">
            <h1 class="font-bold text-xl">{{ ad.title }}</h1>
            <p>
                <strong class="text-sm">{{ ad.city.city_name }} - {{ ad.city.governorate.governorate_name }}</strong>
                <small>Added at {{ dateFormatted }}</small>
            </p>
       </div>

       <div class="main-photo w-2/3">
            <img v-if="ad.photos.length > 0" :src="URL(ad.photos[0].photo_path)" alt="ad photo" class="rounded-2xl">
            <img v-if="ad.photos.length == 0" src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483141.jpgs" class="rounded-2xl" alt="ad photo">
       </div>

       <div class="description space-y-5">
           <selective-description-list :list="selectiveDescriptionList"/>

           <div class="text p-3">
               <div class="address flex flex-col gap-1 mb-3">
                   <h3 class="font-semibold underline capitalize">{{ adCategory }} address: </h3>
                   <p>{{ ad.address }}, <span class="font-semibold">{{ ad.city.city_name }} - {{ ad.city.governorate.governorate_name }}</span>.</p>
                </div>

               <p class="leading-relaxed" :class="textDescriptionOverflow">{{ ad.description }}</p>
               <button @click="seeMore" class="font-bold underline text-gray-700">{{ isSeeMoreClicked ? 'see less' : 'see more'}}</button>
           </div>

       </div>

        <div class="photos space-y-3">
            <div v-for="photo in excludeMainPhoto" :key="photo.id">
                <img :src="URL(photo.photo_path)" class="rounded-2xl" alt="ad photo">
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
            ad: {
                type: Object,
                required: true,
            },
            adCategory: {
              type: String,
              required: true,
          },
        },
        methods: {
            seeMore(e) {
                this.isSeeMoreClicked = !this.isSeeMoreClicked;
            },
            URL(url){
                return new URL(url, window.location.origin);
            }
        },
        computed: {
            selectiveDescriptionList() {
                return {
                    bedrooms: this.ad.bedrooms,
                    bathrooms: this.ad.bathrooms,
                    area: this.ad.area,
                    furnished: this.isFurnished,
                    level: this.ad.level,
                    ad_type: this.adType,
                    ad_type: this.ad.type.type,
                    payment_option: this.ad.payment_option ? this.ad.payment_option.option : this.ad.payment_option,
                    amenities: this.ad.amenities,
                };
            },
            excludeMainPhoto(){
                return this.ad.photos.slice(1);
            },
            isFurnished() {
                if(this.ad.is_furnished == null){
                    return null;
                }
                return this.ad.is_furnished ? 'yes' : 'No';
            },
            adType() {
                return this.ad.for_sale ? 'For Sale' : 'For Rent';
            },
            dateFormatted() {
                const date = new Date(this.ad.created_at);
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
