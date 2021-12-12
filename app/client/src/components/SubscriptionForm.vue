<template>
    <form class="sm:mt-14.625" novalidate>
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
                    type="email"
                    placeholder="Type your email address here…" 
                    required 
                    v-model="state.email"
                />
            </div>
            <div class="mr-10">
                <button @click="submitForm($event)" class="bg-grey-arrow h-3.5 w-6 hover:bg-blue-arrow"/>
            </div>
        </div>

        <div class="text-red-600 font-arial h-8 mx-5 sm:mx-10">
            <div v-if="v$.email.$error">
                {{v$.email.$errors[0].$message}}
            </div>
            <div v-else-if="v$.termsConsent.$error">
                {{v$.termsConsent.$errors[0].$message}}
            </div>
            <div v-else-if="serverError">
                Problems with the server
            </div>
        </div>

        <div class="flex ml-5 mt-1.875 sm:ml-10 sm:mt-1.375">
            <div :class="[!state.termsConsent ? ['bg-white']: '']" class="cursor-pointer h-26px w-26px mr-0.938 bg-blue border-solid border-cream rounded-3px">
                <div @click="state.termsConsent = !state.termsConsent" :class="[!state.termsConsent ? ['bg-white']: '']" class="h-26px w-26px bg-no-repeat bg-center bg-check-mark"></div>
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
    import { required, email, sameAs, helpers } from '@vuelidate/validators'
    import { reactive, computed, onBeforeMount, ref } from 'vue'
    import { useRouter, useRoute } from 'vue-router'
    import useValidate from '@vuelidate/core'
    import User from '@/api/User'

    let serverError = ref(false)

    const checkEnding = (value) => value.slice(value.length - 3) != '.co'

    const router = useRouter()

    const state = reactive({
        email:'',
        termsConsent: false
    })

    const rules = computed(() => {
        return{
            email: { 
                required : helpers.withMessage('Email address is required', required), 
                email: helpers.withMessage('Please provide a valid e-mail address', email), 
                checkEnding: helpers.withMessage('We are not accepting subscriptions from Columbia emails', checkEnding)
            },
            termsConsent: {  
                sameAs: helpers.withMessage('You must accept terms and conditions', sameAs(true)) 
            }
        }
    })

    const v$ = useValidate(rules, state)

    function submitForm(event)
    {
        event.preventDefault()
        v$.value.$validate()

        if(!v$.value.$error)
        {
            const emailProvider = state.email.split('@')[1].split('.')[0]

            User.add({email: state.email, email_provider: emailProvider}).then((response) => {
                console.log(response)
                if(response.data == 'success'){
                    router.push('/success')
                    serverError.value = false
                }
                else{
                    serverError.value = true
                }
            })

        }
    }

    onBeforeMount(() => {
       v$.value.$validate()
    })

</script>