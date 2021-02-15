<template>
    <div class="space-y-3">
        <div class="price bg-gray-100 p-3 rounded-lg text-center">
            <span class="text-lg font-bold">{{apartment.price }} EGP</span>
        </div>

        <div class="email bg-gray-100 p-3 rounded-lg flex flex-row gap-2">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 text-gray-300">
                <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
            </svg>
            <p class="font-medium">{{ apartment.user.email }}</p>
        </div>

        <div class="mobile-number bg-gray-100 p-3 rounded-lg flex flex-row gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 text-gray-300">
                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
            </svg>
            <p class="font-medium">{{ apartment.user.mobile_number }}</p>
        </div>
        
        <safety-tips/>
        
        <div class="address bg-gray-100 p-3 rounded-lg ">
            <p class="font-bold">{{ apartment.city.city_name }} - Governorate</p>
            <p>{{ apartment.address }}</p>
        </div>

        <div class="user bg-gray-100 p-3 rounded-lg flex flex-row gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 text-gray-300">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <p class="flex flex-col font-semibold">
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
