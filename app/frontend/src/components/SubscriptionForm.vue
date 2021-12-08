<template>
    <form class="form-container">
        <div class="ml-5 mb-5 pt-1.875 sm:ml-10">
            <h1 class="mb-1 font-georgia text-2xl sm:text-2 leading-10">Subscribe to newsletter</h1>

            <div class="max-w-18.5 sm:max-w-25 text-grey font-arial text-sm sm:text-1 leading-relaxed">
                Subscribe to our newsletter and get 10% discount 
                on pineapple glasses.
            </div>
        </div>
    
        <div class="hover:shadow-bottom focus-within:border-1 focus-within:border-solid focus-within:border-blue flex border-solid border-1 border-cream sm:relative items-center bg-white mx-5 sm:mx-0 h-15 sm:w-663px justify-between">
            <div class="flex justify-left items-center">
                <div class="w-1 h-15 bg-blue"></div>

                <input 
                    class="w-227px h-6 ml-4 outline-none sm:ml-11"
                    for="email" 
                    type="email"
                    placeholder="Type your email address here…" 
                    required 
                    v-model="email"
                />
            </div>
            <div class="mr-10">
                <button class="bg-grey-arrow h-3.5 w-6 hover:bg-blue-arrow"/>
            </div>
        </div>

        <div class="flex ml-5 mt-1.875 sm:ml-10 sm:mt-3.375">
            <div class="h-26px w-26px mr-0.938 bg-blue rounded-3px">
                <button class="h-26px w-26px bg-no-repeat bg-center bg-check-mark" />
            </div>
            <span class="text-grey">
                I agree to

                <a href="#" class="underline text-dark hover:text-blue active:text-dark-blue">
                    terms of service
                </a>
            </span>
        </div>
    </form>
</template>

<script setup>
    import { computed, ref, shallowRef, watch } from 'vue'

</script>