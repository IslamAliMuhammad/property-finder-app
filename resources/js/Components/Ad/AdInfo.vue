<template>
    <div>
       <div class="header">
            <h1 class="font-bold">{{ apartment.title }}</h1>
            <p>
                <strong>{{ apartment.city.city_name }}</strong>
                <small>Added at {{ dateFormatted }}</small>
            </p>
       </div>

       <div class="main-photo w-2/3">
            <img v-if="apartment.photos.length > 0" :src="apartment.photos[0].photo_path" alt="ad photo">
            <img v-if="apartment.photos.length == 0" src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483141.jpgs" alt="ad photo">
       </div>

       <div class="description">
           <selective-description-list :list="selectiveDescriptionList"/>

           <div class="text">
               <p>{{ apartment.description }}</p>
           </div>

       </div>

        <div class="photos">
            <div v-for="photo in apartment.photos" :key="photo.id">
                <img :src="photo.photo_path" alt="ad photo">
            </div>
        </div>

    </div>
    
</template>     

<script>
    import SelectiveDescriptionList from '@/Components/Ad/SelectiveDescriptionList'

    export default {
        components: {
            SelectiveDescriptionList,
        },
        props: {
            apartment: {
                type: Object,
                required: true,
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
        },
    }
</script>
