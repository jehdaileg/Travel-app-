<template>
    <div>

        <header>

       <nav class="bg-white py-2 md:py-4">
                <div class="container px-4 mx-auto md:flex md:items-center">

                    <div class="flex justify-between items-center">


                         <div class="flex justify-between items-center">


                        Travel App
                    </div>




                        <button
                            class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
                            id="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <div class="md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">

                        <router-link to="/" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Home</router-link>

                            <router-link to="/continents" class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-gray-400 hover:text-gray-700 transition-colors duration-300">Continent</router-link>

                             <router-link to="/countries" class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-gray-400 hover:text-gray-700 transition-colors duration-300">Country</router-link>

                              <router-link to="/provinces" class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-gray-400 hover:text-gray-700 transition-colors duration-300">Province</router-link>

                               <router-link to="/travels" class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-gray-400 hover:text-gray-700 transition-colors duration-300">Travel</router-link>

                                <router-link to="/users" class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-gray-400 hover:text-gray-700 transition-colors duration-300">Users</router-link>

                                 <router-link to="" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Register</router-link>

                                  <router-link to="" class="p-2 lg:px-4 md:mx-2 text-indigo-400 text-center border border-transparent rounded hover:bg-indigo-600  hover:text-white transition-colors duration-300">Login</router-link>

                    </div>
                </div>
            </nav>

  </header>

    </div>
</template>
