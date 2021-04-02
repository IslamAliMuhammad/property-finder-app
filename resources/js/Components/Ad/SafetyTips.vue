<template>
    <div class="max-w- overflow-hidden rounded-lg shadow-lg p-3" :class="{isAboutUsPage: 'max-w-full'}">
        <div class="px-6 py-4">
            <h4 class="mb-3 text-xl font-bold tracking-tight text-gray-800">Important Safety Tips</h4>
            <ol class="list-decimal space-y-2 text-sm">
                <li>Only meet in public/crowded places for example metro stations and malls.</li>
                <li>Never go alone to meet a buyer/seller, always take someone with you.</li>
                <li>Check and inspect the product properly before purchasing it.</li>
                <li>Never pay anything in advance or transfer money before inspecting the product.</li>
            </ol>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            isAboutUsPage() {
                return route().current('aboutus.index');
            },
        },
    }
</script>
