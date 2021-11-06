<template>

	<div>

        <section class="header"> <Header /> </section>

        <h5>Create Province</h5>


        <section class="main_content">

            <div class=" flex flex-col items-start justify-start w-full h-full p-20 lg:p-20 xl:p-28">

             <form @submit.prevent="saveProvince()">

                        <div class="relative w-full mt-10 space-y-8">

                            <div class="w-full">
                                <label class="font-medium text-gray-900">Name:</label>
                                <input type="text" name="name" v-model="form.name" class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter name...">

                            </div>

                              <div class="w-full">
                                <label class="font-medium text-gray-900">Continent:</label>
                                 <select class="form-control" v-model="form.country_id">

                                 	<option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
        							    
        						 </select>

                            </div>

                            <div class="">
                                <button type="submit" class="inline-block mt-2 w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">Save</button>

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

    		form: {

    			name: '',
    			country_id: '',

    		},
    		countries: [],


    	}


    },

    methods: {

    	getAllCountries()
    	{
    		axios

    		   .get('/api/countries')

    		   .then(res => {
    		   	console.log(res.data.data)

    		   	this.countries = res.data.data
    		   })

    		   .catch(error => {
    		   	console.log(error)
    		   })
    	},

    	saveProvince()
    	{
    		axios

    		   .post('/api/provinces', {

    		   	name: this.form.name,
    		   	country_id: this.form.country_id

    		   })

    		   .then(res => {
    		   	console.log(res.data.element, res.data.message)

    		   	this.$router.push({name: 'IndexProvince'})

    		   })

    		   .catch(error => {
    		   	console.log(error)
    		   })
    	},


    	
    },

    created()
    {
    	this.getAllCountries()    	
    },


}

	
</script>