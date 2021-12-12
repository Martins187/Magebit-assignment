<template>
   <div class="mt-10 flex h-full w-full justify-center">
       <div class="flex mr-10 ">
            <select>
                <option>DVD</option>
                <option>Book</option>
                <option>Furniture</option>
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

    let users = ref([])
    let sortingCollumn = ref('created_at')
    let sortingDirection = ref('DESC')

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
                'collumn': sortingCollumn.value, 
                'direction': sortingDirection.value
            }
        ).then((response) => {
            users.value = [...response.data] 
            return response.data
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

</script>