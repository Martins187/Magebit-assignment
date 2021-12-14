<template>
    <form class="sm:mt-14.625" novalidate>
        <div class="ml-5 mb-5 pt-1.875 sm:ml-10">
            <h1 class="mb-1 font-georgia text-2xl leading-10 sm:text-2">Subscribe to newsletter</h1>

            <div class="max-w-18.5 text-grey font-arial text-sm leading-relaxed sm:max-w-25 sm:text-1">
                Subscribe to our newsletter and get 10% discount 
                on pineapple glasses.
            </div>
        </div>
    
        <div class="h-15 mx-5 bg-white flex justify-between items-center 
            border-solid border-1 border-cream hover:shadow-bottom focus-within:border-1 
            focus-within:border-solid focus-within:border-blue sm:relative sm:mx-0 sm:w-663px">
            <div class="flex justify-left items-center">
                <div class="w-1 h-15 bg-blue"></div>

                <input
                    v-model="state.email"   
                    class="w-227px h-6 ml-4 outline-none sm:ml-11"
                    placeholder="Type your email address here…" 
                    type="email"
                    required 
                />
            </div>
            <div class="mr-10">
                <button 
                    @click="submitForm($event)" 
                    :class="[v$.$error ? ['bg-grey-arrow'] : ['bg-blue-arrow']]" 
                    class="h-3.5 w-6"
                />
            </div>
        </div>

        <div class="h-8 mx-5 sm:mx-10 text-red-600 font-arial">
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

        <div class="ml-5 mt-1.875 flex sm:ml-10 sm:mt-1.375">
            <div 
                :class="[!state.termsConsent ? ['bg-white']: '']" 
                class="h-26px w-26px mr-0.938 bg-blue border-solid border-cream rounded-3px cursor-pointer">
                <div 
                    @click="state.termsConsent = !state.termsConsent" 
                    :class="[!state.termsConsent ? ['bg-white']: '']" 
                    class="h-26px w-26px bg-no-repeat bg-center bg-check-mark">
                </div>
            </div>
            <span class="text-grey">
                I agree to

                <a 
                    href="#" 
                    class="underline text-dark hover:text-blue active:text-dark-blue">
                    terms of service
                </a>
            </span>
        </div>
    </form>
</template>

<script setup>
    import { required, email, sameAs, helpers } from '@vuelidate/validators'
    import { reactive, computed, onBeforeMount, ref } from 'vue'
    import useValidate from '@vuelidate/core'
    import User from '@/api/User'

    let serverError = ref(false)

    const emit = defineEmits(['change', 'delete'])

    const checkEnding = (value) => value.slice(value.length - 3) != '.co'

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

            User.add({
                email: state.email, 
                email_provider: emailProvider
            }).then((response) => {

                if(response.data == 'success'){
                    emit('changeToSuccessView')
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