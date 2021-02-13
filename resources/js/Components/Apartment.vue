<template>
    <inertia-link :href="route('apartments.show', apartment.id)">
        <div class="max-w-xs overflow-hidden rounded-lg shadow-lg my-3">
            <img class="object-cover w-full h-48" src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Flower and sky"/>
            <div class="px-6 py-4">
                <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">{{ apartment.title }}</h4>
                <p class="font-bold">{{ apartment.price }} EGP</p>
                <p>{{ apartment.city.city_name }}</p>
            </div>
        </div>
    </inertia-link>
</template>

<script>

    export default {
        components: {
        },
        props: {
            apartment: {
                type: Object,
                required: true,
            },
        },
    }
</script>
