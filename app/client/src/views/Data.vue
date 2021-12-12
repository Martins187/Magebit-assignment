<template>
   <div class="mt-10 flex h-full w-full justify-center">
       <div class="flex mr-10 h-10">
            <select>
                <option>All</option>
                <option 
                    v-for="emailProvider in emailProviders"
                    @click="changeSelectedEmailProvider(emailProvider.email_provider)">
                        {{ emailProvider['email_provider']}}
                </option>
            </select>
        </div>
        <table class="border-collapse border border-gray-400 table-auto">
            <tr>
                <td class="border border-gray-300 px-5">
                    <button @click="changeSortingFilters('id')" class="w-full">Id</button>
                </td>
                <td class="border border-gray-300 px-5">
                    <button @click="changeSortingFilters('email')" class="w-full">Email</button>
                </td>
                <td class="border border-gray-300 px-5">
                    <button @click="changeSortingFilters('created_at')" class="w-full">Created at</button>
                </td>
                <td class="border border-gray-300 px-5">Delete user</td>
            </tr>
            <tr v-for="user in users">
                <td class="border border-gray-300 px-5">{{ user.id }}</td>
                <td class="border border-gray-300 px-5">{{ user.email }}</td>
                <td class="border border-gray-300 px-5">{{ user.created_at }}</td>
                <td class="border border-gray-300 px-5">
                    <button @click="deleteUser(user.id)" class="bg-red-400 px-5">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup>
    import { computed, ref, onMounted } from 'vue'
    import User from '@/api/User'

    let sortingCollumn = ref('created_at')
    let sortingDirection = ref('DESC')
    let users = ref([])
    let emailProviders = ref([])
    let selectedEmailProvider = ref('TRUE')

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
                'value': selectedEmailProvider.value
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
            console.log(response.data)
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

    getUsers()
    getEmailProviders()

</script>