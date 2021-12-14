<template>
   <div class="flex w-full h-full justify-center mt-10 ">
       <div class="flex mr-10 h-10">
            <select 
                @change="changeSelectedEmailProvider(selectedEmailProvider)" 
                v-model="selectedEmailProvider">
                <option :value="'email_provider'">
                    All
                </option>

                <option 
                    v-for="emailProvider in emailProviders"
                    :value="emailProvider.email_provider">
                        {{ emailProvider.email_provider }}
                </option>
            </select>
        </div>

        <table class="table-auto border-collapse border border-gray-400">
            <tr>
                <td class="px-5 border border-gray-300">
                    <button 
                        @click="changeSortingFilters('id')" 
                        class="w-full">
                        Id
                    </button>
                </td>

                <td class="px-5 border border-gray-300">
                    <button 
                        @click="changeSortingFilters('email')" 
                        class="w-full">
                        Email
                    </button>
                </td>

                <td class="px-5 border border-gray-300">
                    <button 
                        @click="changeSortingFilters('created_at')" 
                        class="w-full">
                        Created at
                    </button>
                </td>

                <td class="px-5 border border-gray-300">Delete user</td>
            </tr>

            <tr v-for="user in users">
                <td class="px-5 border border-gray-300">{{ user.id }}</td>
                <td class="px-5 border border-gray-300">{{ user.email }}</td>
                <td class="px-5 border border-gray-300">{{ user.created_at }}</td>
                <td class="px-5 border border-gray-300">

                    <button 
                        @click="deleteUser(user.id)" 
                        class="bg-red-400 px-5">
                        Delete
                    </button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup>
    import { computed, ref, onMounted } from 'vue'
    import User from '@/api/User'

    let selectedEmailProvider = ref("email_provider")
    let sortingCollumn = ref('created_at')
    let sortingDirection = ref('DESC')
    let emailProviders = ref([])
    let users = ref([])

    function changeSelectedEmailProvider(provider)
    {
        selectedEmailProvider.value = provider

        getEmailProviders()
        getUsers()

    }

    function changeSortingFilters(collumn)
    {
        sortingCollumn.value = collumn

        if(sortingDirection.value == 'ASC'){
            sortingDirection.value = 'DESC'
        }
        else{
            sortingDirection.value = 'ASC'
        }

        getUsers()
    }

    function getUsers()
    {
        User.get(
            {
                'sortingCollumn': sortingCollumn.value, 
                'sortingDirection': sortingDirection.value,
                'selectedCollumn': '*',
                'ruleCollumn': 'email_provider',
                'value': selectedEmailProvider.value == 'email_provider' ? 
                selectedEmailProvider.value : "'" + selectedEmailProvider.value + "'"
            }
        ).then((response) => {
            users.value = [...response.data] 
        })
    }

    function getEmailProviders()
    {
        User.get(
            {
                'sortingCollumn': 'email_provider', 
                'sortingDirection': 'DESC',
                'selectedCollumn': 'email_provider',
                'selectionRule': 'DISTINCT',
                'ruleCollumn': 'email_provider',
                'value': 'email_provider'
            }
        ).then((response) => {
            emailProviders.value = [...response.data] 
        })
    }

    function deleteUser(id)
    {
        User.delete([id]).then((response) => {
            if(response.data == 'success')
            {
                getUsers()
            }
            else{
                alert('failed to delete')
            }
        })
    }

    getEmailProviders()
    getUsers()

</script>