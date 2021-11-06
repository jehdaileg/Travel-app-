<template>
    <div>

        <section><Header /></section>


             <section class="main_content">

           <h5 class="text-2xl text-indigo-500"> Provinces Section </h5>

           <div v-show="message_confirm.length > 0">

               <p class="text-2xl p-2 rounded-lg shadow-lg bg-green-800">{{ message_confirm }}</p>

           </div>

                 <div class="flex flex-col justify-center items-center">

                <router-link to="/provinces/create">Add Province</router-link>


        <div class="w-full mb-2 flex flex-col justify-center items-center">

            <div class="border-b border-gray-200 shadow">


                <table class="divide-y divide-gray-300 ">


                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Name
                            </th>

                            <th class="px-6 py-2 text-xs text-gray-500">
                               Created At
                            </th>

                             <th class="px-6 py-2 text-xs text-gray-500">
                               Country 
                            </th>

                            <th class="px-6 py-2 text-xs text-gray-500">
                                Edit
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">


                        <tr v-for="province in provinces" :key= "province.id" class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ province.id }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ province.name }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ province.created_at }}
                            </td>

                             <td class="px-6 py-4 text-sm text-gray-500">
                                {{ province.country.code_country }}
                            </td>


                            <td class="px-6 py-4">
                                <router-link :to="{name: 'EditProvince', params: {id: province.id} }" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </router-link>
                            </td>
                            <td class="px-6 py-4">
                                <button v-on:click="deleteProvince(province.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

       </section>

     

        <section><Footer /></section>

    </div>
</template>

<script>

import Header from "../layouts/Header";

import Footer from "../layouts/Footer";
export default {

    components: {
        Header,
        Footer
    },

    data()
    {
        return {

            provinces: [],
            message_confirm: '',

        }
    },

    created()
    {
        this.getAllProvinces()

    },

    methods: {

        getAllProvinces()
        {
            axios

               .get('/api/provinces')

               .then(res => {
                console.log(res.data.data)

                this.provinces = res.data.data
               })

               .catch(error => {
                console.log(error)
               })
        },

        deleteProvince(id)
        {
            axios

               .delete('/api/provinces/' +id)

               .then(res => {

                console.log(res.data)

                this.message_confirm = res.data

                this.getAllProvinces()
               })

               .catch(error => {
                console.log(error)
               })

        },


    },



}
</script>
