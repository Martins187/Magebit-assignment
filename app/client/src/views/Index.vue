<template>
    <div class="flex h-full">
        <div class="w-full bg-pineapple bg-cover bg-center h-screen 
            sm:w-42.5 sm:bg-gradient-to-b from-white to-glass">
            <navigation-bar />

            <div class="my-44 mx-5 pb-1.875 bg-gradient-to-b from-white to-glass 
                sm:ml-6.25 sm:bg-gradient-to-b sm:from-transparent sm:to-transparent">
                <keep-alive>
                    <component 
                        :is= "component"
                        @changeToSuccessView="changeToSuccessView"
                    />
                </keep-alive>
                
                <div class="max-w-18.5 h-1px bg-cream sm:max-w-25 ml-5 mt-5 sm:ml-10 sm:mt-3.125"></div>

                <div class="w-15.25 h-46px flex items-center justify-between ml-3.313 mt-1.25 sm:mt-3.125 sm:ml-7.125">
                    <div class="h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream 
                        cursor-pointer hover:bg-fb-blue hover:shadow-round active:bg-fb-dark-blue">
                        <div class="h-46px w-46px flex bg-fb-logo justify-center items-center cursor-pointer 
                            rounded-circle bg-center bg-no-repeat hover:bg-fb-logo-light"></div>
                    </div> 
                    <div class="h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream
                        cursor-pointer hover:bg-instagram-purple hover:shadow-round active:bg-instagram-dark-purple">
                        <div class="h-46px w-46px flex bg-instagram-logo justify-center items-center cursor-pointer 
                            rounded-circle bg-center bg-no-repeat hover:bg-instagram-logo-light"></div>
                    </div>
                    <div class="h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream 
                        cursor-pointer hover:bg-twitter-blue hover:shadow-round active:bg-twitter-dark-blue">
                        <div class="h-46px w-46px flex bg-twitter-logo justify-center items-center cursor-pointer 
                            rounded-circle bg-center bg-no-repeat hover:bg-twitter-logo-light"></div>
                    </div>
                    <div class="h-46px w-46px flex justify-center items-center border-solid border-2 rounded-circle border-cream 
                        cursor-pointer hover:bg-youtube-red hover:shadow-round active:bg-youtube-dark-red">
                        <div class="h-46px w-46px flex bg-youtube-logo justify-center items-center cursor-pointer 
                            rounded-circle bg-center bg-no-repeat hover:bg-youtube-logo-light"></div>
                    </div>
                </div>
            </div>
        </div>

        <img 
            class="hidden sm:w-screen sm:h-screen sm:block sm:object-cover" 
            src="@img/background-image.png"
        />
    </div>
</template>

<script setup>
    import SubscriptionForm from '@/components/SubscriptionForm.vue'
    import NavigationBar from '@/components/NavigationBar.vue'
    import SubmittedForm from '@/components/SubmittedForm.vue'
    import { shallowRef } from 'vue'

    let component = shallowRef(SubscriptionForm)

    function changeToSuccessView()
    {
        component.value = SubmittedForm
    }
   
</script>