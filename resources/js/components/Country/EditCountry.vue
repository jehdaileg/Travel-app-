<template>

	<div>

        <section class="header"> <Header /> </section>

        <h5>Edit Country</h5>


        <section class="main_content">

            <div class=" flex flex-col items-start justify-start w-full h-full p-20 lg:p-20 xl:p-28">

             <form @submit.prevent="UpdateCountry()">

                        <div class="relative w-full mt-10 space-y-8">

                            <div class="w-full">
                                <label class="font-medium text-gray-900">Name:</label>
                                <input type="text" name="name" v-model="form.name" class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter name...">


                            </div>

                              <div class="w-full">
                                <label class="font-medium text-gray-900">Code Country:</label>
                                <input type="number" name="code_country" v-model="form.code_country" class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter country code...">


                            </div>

                              <div class="w-full">
                                <label class="font-medium text-gray-900">Code phone:</label>
                                <input type="text" name="code_phone" v-model="form.code_phone" class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter code phone...">


                            </div>

                              <div class="w-full">
                                <label class="font-medium text-gray-900">Continent:</label>
                                 <select class="form-control" v-model="form.continent_id">
        							     <option v-for="continent in continents" :key="continent.id" :value="continent.id">{{ continent.name }}</option>
        						 </select>

                            </div>

                            <div class="">
                                <button type="submit" class="inline-block mt-2 w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">Update</button>

                            </div>
                        </div>

                    </form>
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

    components:{

        Header,

        Footer

    },

    data() {

    	return {

    		continents: [],

    		form: {

    			name: '',
    			code_country: '',
    			code_phone: '',
    			continent_id: '',


    		},

    		message: '',


    	}


    },

    methods: {

        getTheCountry()
        {
            axios

               .get('/api/countries/' +this.$route.params.id)

               .then(res => {
                console.log(res.data)

                this.form = res.data.data

               })

        },

        getAllContinents()
        {
            axios

               .get('/api/continents')

               .then(res => {
                console.log(res.data.data)

                this.continents = res.data.data
               })

               .catch(error => {
                console.log(error)
               })

        },

        UpdateCountry()
        {
            axios

               .put('/api/countries/' +this.$route.params.id, {

                name: this.form.name,
                code_country: this.form.code_country,
                code_phone: this.form.code_phone,
                continent_id: this.form.continent_id

               })

               .then(res => {
                console.log(res)

                this.$router.push({name: 'IndexCountrie'})

               })

               .catch(error => {
                console.log(error)
               })
        },



    	
    },

    created()
    {
        this.getTheCountry()
        this.getAllContinents()

    }

   

}

	
</script>