<template>
    <div>

       <section class="header">

           <Header></Header>

       </section>






       <section class="main_content">

           <h5 class="text-2xl text-indigo-500"> Continents Section </h5>

           <div v-show="message_confirm.length > 0">

               <p class="text-2xl p-2 rounded-lg shadow-lg bg-green-800">{{ message_confirm }}</p>

           </div>

                 <div class="flex flex-col justify-center items-center">

                    <div class="flex justify-between">
                          <router-link to="/continents/create" class="mr-10 ml-10">Add continent</router-link>

                          <div class="flex justify-between">

                             <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                        <div class="input-group">
                            <input type="search" v-model="search" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                            <div class="col">

                                  <select v-model="SelectedDepartement" class="form-control">
                                       <option></option>
                                  </select>

                            </div>
                        </div>
                    </form>
        
                          </div>                       
                        
                    </div>

              


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
                                Created_at
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


                        <tr v-for="continent in continents" :key= "continent.id" class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ continent.id }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ continent.name }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ continent.created_at }}
                            </td>
                            <td class="px-6 py-4">
                                <router-link :to="{name: 'EditContinent', params: {id: continent.id}  }">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </router-link>
                            </td>
                            <td class="px-6 py-4">
                                <button v-on:click="deleteContinent(continent.id)">
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






        <section class="footer">

            <Footer />

        </section>


    </div>

</template>

<script>
import Header from "../layouts/Header";

import Footer from "../layouts/Footer";

export default {

    components: {
        Header,
        Footer
    }
    ,

    data() {
        return {

            continents: [],
            message_confirm: '',
            search: '',

        }
    },

    watch: {

        search()
        {
            this.getAllContinents()

        }

    },

    methods: {

        getAllContinents()
        {
            axios
               .get('/api/continents', {

                params: {
                    search: this.search 
                }

               })

               .then(res => {
                   console.log(res.data)

                   this.continents = res.data.data
               })

               .catch(err => {
                   console.log(err)
               })
        },

        deleteContinent(id)
        {
            axios
               .delete('/api/continents/' +id)

               .then(res => {
                 //  console.log(res.data.)

                   this.message_confirm = res.data

                   this.getAllContinents()


               })

               .catch(error => {
                   console.log(error)
               })
        },

    },

    created() {

        this.getAllContinents()

    },

}
</script>
