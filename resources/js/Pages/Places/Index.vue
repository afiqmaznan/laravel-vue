<template>
    <div class="container mx-auto p-4">
        <!-- <ul class="flex mb-4">
            <li class="mr-3">
                <a class="inline-block border border-blue-500 rounded py-2 px-4 bg-blue-500 text-white" href="#">Offbeat</a>
            </li>
            <li class="mr-3">
                <a class="inline-block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="">Luxe</a>
            </li>
        </ul> -->
        <!-- <nav class="flex flex-col sm:flex-row mb-4">
            <button 
                v-for="(type,index) in types" 
                :key="index" 
                @click="sendType(type)" 
                class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none"
                :selected="index == 0"
            >
                {{type}}
            </button>
        </nav> -->
        <!-- <v-tabs class="flex flex-col sm:flex-row mb-4">
            <v-tab class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">Item One1</v-tab>
            <v-tab class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">Item Two</v-tab>
            <v-tab class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">Item Three</v-tab>
        </v-tabs> -->
        <nav class="flex flex-col sm:flex-row mb-4">
            <tab 
                v-for="(type, index) in types" 
                :key="index" 
                :name="type" 
                :selected="index == 0"
                @click="sendType(type)"
                class="no-underline border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3 mr-8"
            >
                <h1>{{type}}</h1>
            </tab>
        </nav>
  
        <div v-if="this.places.length > 0" class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div v-for="place in this.places" :key="place.id" class="box-border md:box-content p-0">
                <div>
                    <img :src="place.header" class="h-60 sm:h-60 border-2 w-full border-gray-300 rounded" />
                </div>
                
                <div class="grid grid-cols-2">
                    <div class="text-sm font-bold md:text-lg">
                        <p>{{place.city}}, {{place.country}}</p>
                    </div>
                    <div class="text-sm text-right font md:text-lg">
                        <p>{{place.price}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="text-sm font-bold md:text-lg">
                <p>Nothing to show.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {
        
    },
    props: {
        types: Object
    },
    data() {
        return {
            places: [],
        }
    },
    methods: {
        sendType(type) {
            axios.get('/places/filter/'+type)
                .then(response => {
                    console.log(response.data);
                    console.log(type);
                    this.places = response.data.places;
                }).catch(err=>{
                    console.log(err);
                });
        }
    }
};
</script>