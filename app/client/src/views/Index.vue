<template>
    <div class="flex h-full">
        <div class="w-full bg-pineapple bg-cover bg-center h-screen sm:w-42.5 sm:bg-gradient-to-b from-white to-glass">
            <navigation-bar />

            <div class="my-44 mx-5 pb-1.875 sm:ml-6.25 sm:bg-gradient-to-b sm:from-transparent sm:to-transparent bg-gradient-to-b from-white to-glass">
                <keep-alive>
                    <component :is= "component"/>
                </keep-alive>
                
                <div class="sm:max-w-25 max-w-18.5 h-1px ml-5 mt-5 sm:ml-10 sm:mt-3.125 bg-cream"></div>

                <div class="items-center flex justify-between w-15.25 h-46px sm:mt-3.125 sm:ml-7.125 ml-3.313 mt-1.25">
                    <div class="text-red-500 hover:bg-fb-blue hover:shadow-round cursor-pointer active:bg-fb-dark-blue h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream">
                        <img class="fill-current text-green-600" src="@img/facebook-logo.svg" />
                    </div> 
                    <div class="hover:bg-instagram-purple hover:shadow-round cursor-pointer active:bg-instagram-dark-purple h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream">
                        <img src="@img/instagram-logo.svg" />
                    </div>
                    <div class="hover:bg-twitter-blue hover:shadow-round cursor-pointer active:bg-twitter-dark-blue h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream">
                        <img src="@img/twitter-logo.svg" />
                    </div>
                    <div class="hover:bg-youtube-red hover:shadow-round cursor-pointer active:bg-youtube-dark-red h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream">
                        <img src="@img/youtube-logo.svg" />
                    </div>
                </div>
            </div>
        </div>
        <img class="hidden sm:block sm:object-cover sm:h-screen sm:w-screen" src="@img/background-image.png" />
    </div>
</template>

<script setup>
   import SubscriptionForm from '@/components/SubscriptionForm.vue'
   import NavigationBar from '@/components/NavigationBar.vue'
   import SubmittedForm from '@/components/SubmittedForm.vue'
   import { shallowRef } from 'vue'

   let component = shallowRef(SubscriptionForm)
   
</script>