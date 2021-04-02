<template>
    <app-layout>
        <div class="bg-gray-100 rounded-lg p-8 shadow-md mt-10 mb-6 text-center">
            <h1 class="font-bold text-2xl mb-3">
                About Us
            </h1>
            <p> 
                Our mission: To motivate and inspire people to get living the life they deserve. <br>
                When you look for a property, it’s not just a better home you seek, it’s a better future.
            </p>
        </div>

        <safety-tips />

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SafetyTips from "@/Components/Ad/SafetyTips";

    export default {
        components: {
            AppLayout,
            SafetyTips
        },
    }
</script>

