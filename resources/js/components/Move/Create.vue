<template>
	<div>

		<section class="header"> <Header /> </section>


		<section class="main_content">

			<h1 class="text-2xl">Create Move</h1>



			<div class=" flex flex-col items-start justify-start w-full h-full p-20 lg:p-20 xl:p-28">

				<form @submit.prevent="saveMove()">

					<div class="relative w-full mt-10 space-y-8">

						<div class="w-full">
							<label class="font-medium text-gray-900">Code Move</label>
							<input type="text" v-model="form.code_move" name="name"  class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter name...">


						</div>

						<div class="w-full">
							<label class="font-medium text-gray-900">Name:</label>
							<input type="text" v-model="form.name" name="code_country" class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter country code..."> </div>


							<div class="relative mb-4">
								<label for="message" class="leading-7 text-sm text-gray-600">Description:</label>
								<textarea id="message" v-model="form.description" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
							</div>

							<div class="w-full">
								<label class="font-medium text-gray-900">Departure Day:</label>
								<input type="text" v-model="form.departure_day" name="code_phone" class="block w-full px-2 py-2 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50 " placeholder="Enter code phone...">


							</div>



							<div class="w-full">
								<label class="font-medium text-gray-900">Status:</label>
								<select v-model="form.status" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg  focus:shadow-outline">
									<option value="0">Inachieved</option>
									<option value="1">Achieved</option>
								</select>

							</div>

							<div class="w-full">
								<label class="font-medium text-gray-900">Continent:</label>
								<select v-model="form.continent_id" @change="getCountries()" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg  focus:shadow-outline">
									<option v-for="continent in continents" :key="continent.id" :value="continent.id">{{ continent.name }}</option>
								</select>

							</div>

							<div class="w-full">
								<label class="font-medium text-gray-900">Country:</label>
								<select @change="getProvinces()" v-model="form.country_id" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg  focus:shadow-outline">
									<option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
								</select>

							</div>

							<div class="w-full">
								<label class="font-medium text-gray-900">Province:</label>
								<select v-model="form.province_id" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg  focus:shadow-outline">
									<option v-for="province in provinces" :key="province.id" :value="province.id">{{ province.name }}</option>
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

	//import DatePicker from "vuejs-datepicker";

	import moment from 'moment';


	export default {

		components: {

			//DatePicker,
			Header,
			Footer,

		},

		data()
		{
			return {

				continents: [],
				countries: [],
				provinces: [],

				form: {

					continent_id: '',
					country_id: '',
					province_id: '',
					departure_day: '',
					name: '',
					code_move: '',
					description: '',
					status: '',

				},


			}
		},

		methods: {

			getAllContinents()
			{
				axios

				.get('/api/moves/get-continents')

				.then(res => {
					console.log(res.data)

					this.continents = res.data
				})

				.catch(err => {
					console.log(err)
				})
			},

			getCountries()
			{
				axios

				.get('/api/moves/' +this.form.continent_id+ '/get-countries')

				.then(res => {

					console.log(res.data)

					this.countries = res.data

					
				})

				.catch(error => {
					console.log(error)
				})
			},

			getProvinces()
			{

				axios

				.get('/api/moves/' +this.form.country_id+ '/get-provinces')

				.then(res => {

					console.log(res.data)

					this.provinces = res.data

				})

				.catch(err => {

					console.log(err)

				})

			},

			saveMove()
			{

				axios

				   .post('/api/moves', {

				   	code_move: this.form.code_move,
				   	name: this.form.name,
				   	description: this.form.description,
				   	status: this.form.status,
				   	departure_day: this.format_date(this.form.departure_day),
				   	continent_id: this.form.continent_id,
				   	country_id: this.form.country_id,
				   	province_id: this.form.province_id

				   })

				   .then(res => {
				   	console.log(res)

				   	this.$router.push({name: 'IndexMove'})

				   })

				   .catch(err => {
				   	console.log(err)
				   })

			},

			format_date(value)
			{
				if(value)
				{
					return moment(String(value)).format("YYYYMMDD");
				}
			}

		},

		created()
		{

			this.getAllContinents()

		}

	}
	
	</script>