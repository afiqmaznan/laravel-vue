<template>
    <Head title="Airbnb" />
    
    <Header>
    </Header>
    <div class="container mx-auto p-2 md:p-0">
        <!-- <div class="grid grid-cols-1 p-0 mb-4">
            <Link href="/" class="text-2xl text-center text-blue-500 font-bold md:text-xl">
                <p>AIRBNB</p>
            </Link>
        </div> -->     
        <!-- <hr/> -->
        
        <nav class="flex flex-row mb-2 mt-0 md:mb-4 md:mt-4 overflow-x-auto no-scrollbar">
            <button 
                v-for="(type, index) in types" 
                :key="index"
                @click="sendType(type)"
                class="flex-none cursor-pointer text-gray-600 py-1 px-3 md:py-3 md:px-6 hover:text-blue-500 focus:outline-none"
                :class="{'text-blue-500 border-b-2 font-medium border-blue-500': active === type}"
                :disabled="active === type"
            >
                {{type}}
            </button>
        </nav>
  
        <div v-if="this.places.length > 0" class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div v-for="place in this.places" :key="place.id" class="box-border md:box-content p-0">
                <div>
                    <!-- <img :src="place.header" class="h-60 sm:h-60 border-2 w-full border-gray-300 rounded" /> -->
                    <splide :options="options">
                        <splide-slide v-for="image in place.images" :key="image.index">
                            <img :src="image" class="h-76 md:h-60 border-2 w-full border-gray-300 rounded" />
                        </splide-slide>
                    </splide>
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
<style scoped>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.no-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
</style>

<script>
import NProgress from 'nprogress';
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import '@splidejs/splide/dist/css/themes/splide-default.min.css';
import { Link, Head } from '@inertiajs/inertia-vue3';
import Header from '@/Layouts/Header.vue';
export default {
    components: {
        Splide,
        SplideSlide,
        Link,
        Header,
        Head
    },
    props: {
        types: Object
    },
    data() {
        return {
            places: [],
            options: {
                rewind : true,
            },
        }
    },
    beforeMount(){
        this.sendType(this.types[0]);
    },
    methods: {
        sendType(type) {
            NProgress.start();
            this.active = type;
            axios.get('/places/filter/'+type)
                .then(response => {
                    //console.log(response.data);
                    //console.log(type);
                    this.places = response.data.places;
                    NProgress.done();
                }).catch(err=>{
                    console.log(err);
                    NProgress.done();
                });
        }
    }
};
</script>