<template>
    <div id="index">
        <navigation-bar />

        <subscription-form />
        <submitted-form />

        <div class="separating-line"></div>

        <div class="social-items-container">
            <img src="@img/facebook-logo.png" />
            <img src="@img/instagram-logo.png" />
            <img src="@img/twitter-logo.png" />
            <img src="@img/youtube-logo.png" />
        </div>
    </div>
    
    <img class="background-image" src="@img/background-image.png" />
    
</template>

<script setup>
   import NavigationBar from '@/components/NavigationBar.vue'
   import SubscriptionForm from '@/components/SubscriptionForm.vue'
   import SubmittedForm from '@/components/SubmittedForm.vue'
</script>