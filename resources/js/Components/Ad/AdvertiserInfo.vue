<template>
    <div>
        <div class="price">
            <span>{{apartment.price }}</span>
        </div>

        <div class="email">
            <p>{{ apartment.user.email }}</p>
        </div>

        <div class="mobile-number">
            <p>{{ apartment.user.mobile_number }}</p>
        </div>
        
        <safety-tips/>
        
        <div class="city">
            <span>{{ apartment.city.city_name }} - Governorate</span>
        </div>

        <div class="address">
            <p>{{ apartment.address }}</p>
        </div>

        <div class="user">
            <p class="flex flex-col">
                <strong>{{ apartment.user.name }}</strong>
                <small>On site since {{ dateFormatted }}</small>
            </p>
        </div>
    </div>
</template>

<script>
    import SafetyTips from '@/Components/Ad/SafetyTips'
    export default {
        components: {
            SafetyTips,
        },
        props: {
            apartment: {
                type: Object,
                required: true,
            }
        },
        computed: {
            dateFormatted() {
                let date = new Date(this.apartment.user.created_at);
                return date.toLocaleString('en-us',{month:'long', year:'numeric'});
            },
        },
    }
</script>
