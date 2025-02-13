<template>
    
    <NavBar2 class="">
      <div class="flex align-items-center gap-2">
  <DarkModeToggle/>
  <div class="">

      <div v-if="canLogin" class="p-2">
      <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
      >

      <template v-else>
          <Link
              :href="route('contact')"
              class=" text-black dark:text-white hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
              ><Button class="  p-2 text-xs md:text-sm ">CONTACT US</Button></Link
          >
          <Link
              :href="route('login')"
              class="text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
              ><Button class="border-2  rounded-full p-2 text-xs md:text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
          >
        
  
      </template>

  </div>

  </div>
</div>
    </NavBar2>
    <div class=" h-content  md:mt-0 tracking-wider	">
        <div class="bg-white dark:bg-black text-black dark:text-white h-content  relative">
    <img src="../../../../images/bg.png" 
       class="absolute inset-0 w-full h-full opacity-10 object-cover rounded-lg" 
       alt="Coal in Bag Background">

  <div>
      <img src="../../../../images/sectors.png" class="w-full" 
  </div>
  <h1 class="text-xl md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black px-5">Consumer Goods Service Sector</h1>

<section id="consumer-goods" class="md:p-20 py-5 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../../images/consumer_goods.png" class="w-40 md:w-96" data-aos="zoom-in" data-aos-duration="3000">
            </div>
            <div class="md:w-2/3 p-5" >
            <p class="text-lg md:text-xl">
                QSS offers a range of services across 2 broad categories of Consumer Goods namely,<br/>
                

                <br/>
                <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
        Consumer Non Durables - Fast Moving Consumer Goods</span> 
</p>
<p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
        Soft Goods </span> 
    </p>
<br/> <br/>
Our Consumer Non Durables team has the expertise to provide quality and quantity services for Edible Items (perishable items such as frozen fruits & vegetables, meat, sea food & processed food items) and Water.
            </p>
            <h2 class="text-lg md:text-xl py-4 font-semibold ">Testing of Consumer Goods</h2>
<p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
    Physical Analysis of Rice/ Raw Grains/ Pulses/ Spices/ Oil Seeds: Admixture, Foreign matter, Broken, Weevil led, live insects, Immature/ Shriveled, Damaged /Discolor
</span> 
</p>
<p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Biological Testing</span>
    
    </p>
<p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Chemical Testing
    </span>
    
</p>
  </div>


            
        </section>   
        <div class="md:flex  w-full pb-20">
            <div class="w-full  md:w-1/2  md:mx-20 rounded-lg shadow-md" data-aos="zoom-in" data-aos-duration="3000">
    <h2 class="bg-blue-600 text-white p-2 text-center font-semibold rounded-t-lg">
        Biological Testing
    </h2>
    <table class="w-full border border-gray-300 mt-2">
        <tbody>
            <tr><td class="border border-gray-300 p-2">✔ Bakery & Confectionery Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Canned & Processed Foods</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Cereal, Pulses & Cereal Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Edible Oils & Fats</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Meat & Meat Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Fresh & Processed Fruits & Vegetable Products</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Milk & Dairy Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Ready-To-Eat Foods</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Frozen Foods</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Egg & Egg Products</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Fruit & Fruit Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Herbs, Spices & Condiments</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Honey & Honey Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Jam, Juices, Sauces & Concentrates</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Oil Seeds & By-Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Snacks & Instant Mixes</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Vegetable & Vegetable Products</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Edible Colours & Flavours</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Fish & Seafood</td></tr>
            <tr><td class="border border-gray-300 p-2">✔  Drinking Water</td></tr>
            <tr><td class="border border-gray-300 p-2">✔  Ground Water/Surface Water</td></tr>
            <tr><td class="border border-gray-300 p-2">✔  Water For Swimming Pool and Spas</td></tr>
            <tr><td class="border border-gray-300 p-2">✔  Water Processed Food Industry/Water For Industrial Purposes</td></tr>
            <tr><td class="border border-gray-300 p-2">✔  Packaged Natural Mineral Water</td></tr>
            <tr><td class="border border-gray-300 p-2">✔  Packaged Drinking Water</td></tr>

        </tbody>
    </table>
</div>
<div class="w-full  md:w-1/2 md:mx-20  rounded-lg shadow-md" data-aos="zoom-in" data-aos-duration="3000">
    <h2 class="bg-blue-600 text-white p-2 text-center font-semibold rounded-t-lg">
        Chemical Testing
    </h2>
    <table class="w-full border border-gray-300 mt-2">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-400 p-2 text-left">Category</th>
                <th class="border border-gray-400 p-2 text-left">Products</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 p-2">Milk & Dairy Products</td>
                <td class="border border-gray-300 p-2">Cream, Milk, Dahi, Chana (Paneer), Cheese, Kulfi Mix, Chakka, Shrikhand, Condensed Milk, Partly Skimmed Milk, Skimmed Condensed Milk, Pasteurized Milk, Sterilized Milk, Ice Cream</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Oils, Fats & Related Products</td>
                <td class="border border-gray-300 p-2">Ghee, Palm Oil, Sunflower Oil, Mustard Oil, Soybean Oil, Hydrogenated Oil, Arachis Oil, Coconut Oil, Cottonseed Oil, Grapeseed Oil, Maize Oil, Mustardseed Oil, Palm Kernel Oil, Palm Olein, Palm Stearin, Rapeseed Oil, Safflowerseed Oil, Sesame Oil</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Fruit & Vegetable Products</td>
                <td class="border border-gray-300 p-2">Soup Powders, Fruit Juice, Vegetable Juice, Canned Products, Jams, Jellies, Marmalades, Juices, Concentrates</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Cereal, Pulses & By-Products</td>
                <td class="border border-gray-300 p-2">Maize, Bengal Gram, Rice, Bajra, Jowar, Tur (Arhar/Rahar), Chana Dal, Cholia, Lobhia, Dalia, Kabuli Chana, Masoor, Matar, Moong, Motth, Poha, Rajma, Urad Dal</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Meat & Meat Products</td>
                <td class="border border-gray-300 p-2">Seekh Kebab, Canned Meat</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Bakery & Confectionery Products</td>
                <td class="border border-gray-300 p-2">Toffees, Biscuits, Chocolates</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Spices & Condiments</td>
                <td class="border border-gray-300 p-2">Whole & Ground Chilli, Coriander, Cumin, Dhania</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Oil Seeds & By-Products</td>
                <td class="border border-gray-300 p-2">Mustard Seeds, Palm Products, Rapeseed Oil</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Nutritional Labeling & Analysis</td>
                <td class="border border-gray-300 p-2">Milk, Dahi, Paneer, Cheese, Ice Cream, Ready-to-Eat Snacks, Canned Products</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Coffee & By-Products</td>
                <td class="border border-gray-300 p-2">Coffee Beans, Instant Coffee</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Tea & Tea Products</td>
                <td class="border border-gray-300 p-2">Green Tea, Black Tea, Herbal Tea</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Honey & Honey Products</td>
                <td class="border border-gray-300 p-2">Raw Honey, Processed Honey</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Sugar & By-Products</td>
                <td class="border border-gray-300 p-2">Refined Sugar, Brown Sugar, Molasses</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Water</td>
                <td class="border border-gray-300 p-2">Swimming Pool water, Potable Water Used For Drinking Purposes, 
                    Raw/Bore Well/ Ground Water/Surface Water, Industrial Water, Packaged Natural Mineral Water
                </td>
            </tr>

        </tbody>
    </table>
</div>


        </div>
        
    </div>
</div>
<Footer/>
</template>
<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


</script>