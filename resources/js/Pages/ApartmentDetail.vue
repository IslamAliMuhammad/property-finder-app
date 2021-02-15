<template>
    <app-layout>
        <div class="container mx-auto my-5">
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-9">
                    <ad-info :apartment="apartment"/>
                </div>
                <div class="col-span-3">
                    <advertiser-info :apartment="apartment"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import AdInfo from '@/Components/Ad/AdInfo'
    import AdvertiserInfo from '@/Components/Ad/AdvertiserInfo'

    export default {
        components: {
            AppLayout,
            AdInfo,
            AdvertiserInfo,
        },
        props: {
          apartment: {
              type: Object,
              required: true,
          },
        },
    }
</script>
