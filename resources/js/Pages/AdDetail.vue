<template>
    <app-layout>
        <div class="container mx-auto my-5">
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-9">
                    <com-ad-info :ad="ad" :adCategory="adCategory"/>
                </div>
                <div class="col-span-3">
                    <com-advertiser-info :ad="ad" :adCategory="adCategory"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ComAdInfo from '@/Components/Ad/AdInfo'
    import ComAdvertiserInfo from '@/Components/Ad/AdvertiserInfo'

    export default {
        components: {
            AppLayout,
            ComAdInfo,
            ComAdvertiserInfo,
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
    }
</script>
