<template>
    <app-layout>
        <div class="bg-gray-200 p-14 rounded-xl my- my-8 shadow-2xl">
            <form class="space-y-4 text-gray-700" @submit.prevent="submit">
                <div class="space-y-5">
                    <com-input
                        id="title"
                        label="Title"
                        type="text"
                        width="w-full"
                        :modelValue="form.title"
                        @update:modelValue="form.title = $event"   
                        :error="errors.title"
                        :required="true"
                        :maxLength="70"
                    />

                    <com-textarea
                        id="description"
                        label="Description"
                        width="w-full"
                        :modelValue="form.description"
                        @update:modelValue="form.description = $event"
                        :error="errors.description"
                        :required="true"
                        :maxLength="4096"
                    />

                    <com-select-photos @upload:photos="form.photos = $event" :error="errors.photos"/>

                    <com-input
                        id="address"
                        label="Address"
                        type="text"
                        width="w-full"
                        :modelValue="form.address"
                        @update:modelValue="form.address = $event"
                        :error="errors.address"
                        :required="true"
                    />

                    <com-select
                        id="city"
                        label="City"
                        :options="cities"
                        optionNameAttribute="city_name"
                        width="w-52"
                        :modelValue="form.city_id"
                        @update:modelValue="form.city_id = $event"
                        :error="errors.city_id"
                        :required="true"
                    />

                    <div class="space-y-4">
                        <com-select
                            id="propertyType"
                            label="Property Type"
                            :options="propertyTypes"
                            optionNameAttribute="type"
                            width="w-52"
                            :modelValue="form.property_type_id"
                            @update:modelValue="form.property_type_id = $event"
                            :error="errors.property_type_id"
                            :required="true"
                        />

                        <com-select
                            id="adType"
                            label="Ad Type"
                            :options="[{'id': 1, type: 'For Sale'}, {'id': 0, type: 'For Rent'}]"
                            optionNameAttribute="type"
                            width="w-52"
                            :modelValue="form.for_sale"
                            @update:modelValue="form.for_sale = $event"
                            :error="errors.for_sale"
                            :required="true"
                        />

                        <com-input
                            id="price"
                            label="Price"
                            type="number"
                            suffix="EGP"
                            width="w-52"
                            :modelValue="form.price"
                            @update:modelValue="form.price = $event"
                            step="0.01"
                            min="0"
                            :error="errors.price"
                            :required="true"
                        />

                        <com-check-amenities :amenities="amenities" :amenitiesChecked="form.amenities" @update:checkbox="amenitiesChecks" :error="errors.amenities" v-if="!isCurrentRoute('lands.*')"/>

                        <com-select
                            id="paymentOption"
                            label="Payment Options"
                            :options="paymentOptions"
                            optionNameAttribute="option"
                            width="w-52"
                            :modelValue="form.payment_option_id"
                            @update:modelValue="form.payment_option_id = $event"
                            :error="errors.payment_option_id"
                        />

                        <com-input
                            id="area"
                            label="Area"
                            type="number"
                            width="w-52"
                            :modelValue="form.area"
                            @update:modelValue="form.area = $event"
                            :error="errors.area"
                            suffix="(m<sup>2</sup>)"
                            :required="true"
                        />

                        <com-input
                            v-if="isCurrentRoute('apartments.create')"
                            id="level"
                            label="Level"
                            type="number"
                            width="w-20"
                            :modelValue="form.level"
                            @update:modelValue="form.level = $event"
                            :error="errors.level"
                            :required="true"
                        />

                        <com-input
                            v-if="!isCurrentRoute('lands.*')"
                            id="bedrooms"
                            label="Bedrooms"
                            type="number"
                            width="w-20"
                            :modelValue="form.bedrooms"
                            @update:modelValue="form.bedrooms = $event"
                            :error="errors.bedrooms"
                            :required="true"
                        />

                        <com-input
                            v-if="!isCurrentRoute('lands.*')"
                            id="bathrooms"
                            label="Bathrooms"
                            type="number"
                            width="w-20"
                            :modelValue="form.bathrooms"
                            @update:modelValue="form.bathrooms = $event"
                            :error="errors.bathrooms"
                            :required="true"
                        />

                        <com-select
                            v-if="!isCurrentRoute('lands.*')"
                            id="furnished"
                            label="Furnished"
                            :options="[{id: 1, option: 'Yes'}, {id: 0, option: 'No'}]"
                            optionNameAttribute="option"
                            width="w-52"
                            :modelValue="form.is_furnished"
                            @update:modelValue="form.is_furnished = $event"
                            :error="errors.is_furnished"
                        />
                    </div>
                </div>
                
                <button type="submit" class="h-10 px-5 m-2 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">Submit</button>


            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ComSelect from "@/Components/Form/Select";
import ComInput from "@/Components/Form/Input";
import ComTextarea from "@/Components/Form/Textarea";
import ComSelectPhotos from "@/Components/Form/SelectPhotos";
import ComCheckAmenities from "@/Components/Form/CheckAmenities";

export default {
    data() {
        return {
            form: this.$inertia.form({
                title: null,
                description: null,
                photos: [],
                address: null,
                city_id: null,
                property_type_id: null,
                for_sale: null,
                price: null,
                amenities: [],
                payment_option_id: null,
                area: null,
                level: null, 
                bedrooms: null,
                bathrooms: null,
                is_furnished: null,
                _method: this.httpMethod(),
            }),
        };
    },
    components: {
        AppLayout,
        ComSelect,
        ComInput,
        ComTextarea,
        ComSelectPhotos,
        ComCheckAmenities,
    },
    props: {
        cities: {
            type: Array,
            required: true,
        },
        propertyTypes: {
            type: Array,
            required: true,
        },
        amenities: {
            type: Array,
            required: false,
        },
        paymentOptions: {
            type: Array,
            required: true,
        },
        errors: {
            type: Object,
            required: false,
        },
        ad: {
            type: Object,
            required: false,
        },
    },
    mounted() {
        if(this.ad){
            this.form.title = this.ad.title;
            this.form.description = this.ad.description;
            this.form.address = this.ad.address;
            this.form.city_id = this.ad.city_id;
            this.form.property_type_id = this.propertyTypeId; 
            this.form.for_sale = this.ad.for_sale;
            this.form.price = this.ad.price;
            this.form.amenities = this.amenitiesIds; 
            this.form.payment_option_id = this.ad.payment_option_id;
            this.form.area = this.ad.area;
            this.form.level = this.ad.level;
            this.form.bedrooms = this.ad.bedrooms;
            this.form.bathrooms = this.ad.bathrooms;
            this.form.is_furnished = this.ad.is_furnished;

        }
    },
    computed: {
        propertyTypeId() {
            if(this.ad.apartment_type_id){
                return this.ad.apartment_type_id;
            }else if(this.ad.villa_type_id){
                return this.ad.villa_type_id;
            }else if(this.ad.land_type_id){
                return this.ad.land_type_id;
            }
        },
        amenitiesIds() {
            if(!this.isCurrentRoute('lands.*')){
                return this.ad.amenities.map(amenitiy => amenitiy['id'].toString());

            }
        },
    },
    methods: {
        amenitiesChecks(e) {
           if(e.checked){
            this.form.amenities.push(e.value)
           }else{
               const index = this.form.amenities.indexOf(e.value);
               if(index > -1){
                   this.form.amenities.splice(index, 1);
               }
           }
        },
        baseCurrentRoute() {
            const currentRoute = route().current();
            const index = currentRoute.indexOf('.');
            const baseCurrentRoute = currentRoute.slice(0, index);

            return baseCurrentRoute;
        },
        submit() {
            if(route().current('*.create')){
                console.log('create ad');
                this.form.post(route(this.baseCurrentRoute() + '.' + 'store'));
            }else if(route().current('*.edit')){
                this.form.post(route(this.baseCurrentRoute() + '.' + 'update', this.ad.id));
            }
        },
        isCurrentRoute(comparedRoute) {
            return route().current(comparedRoute);
        },
        httpMethod() {
            if(route().current('*.create')){
                return 'post';

            }else if(route().current('*.edit')){
                return 'put';
            }
        },
    },
};
</script>
