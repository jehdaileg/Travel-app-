<template>
    <div>

        <section class="header"> <Header /> </section>

        <h5>Edit Contient</h5>


        <section class="main_content">

            <div class=" flex flex-col items-start justify-start w-full h-full p-20 lg:p-20 xl:p-28">

             <form @submit.prevent="UpdateContinent()">

                        <div class="relative w-full mt-10 space-y-8">

                            <div class="w-full">
                                <label class="font-medium text-gray-900">Nom:</label>
                                <input type="text" name="nom" v-model="form.name" class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter name...">


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

import Footer from "../layouts/Footer.vue";
export default {

    data() {
        return {

            form :  {

                name: '',


            },

        }
    },

    components:{

        Header,

        Footer

    },

    created() {
        this.getTheContinent()
    },

    methods: {

      getTheContinent()
      {
          axios
             .get('/api/continents/' +this.$route.params.id)

             .then(res => {
                 this.form = res.data.data
             })

             .catch(error => {
                 console.log(error)
             })
      },
        UpdateContinent()
        {
            axios
               .put('/api/continents/'+this.$route.params.id, {

                   name: this.form.name

               })

               .then(res => {
                   console.log(res)

                   this.$router.push({name: 'IndexContinent'})

               })

               .catch(error => {
                   console.log(error)
               })
        }

    },

}
</script>
