<template>
    <div class="container mx-auto p-4">
        <ul class="flex mb-4">
            <li class="mr-3">
                <a class="inline-block border border-blue-500 rounded py-2 px-4 bg-blue-500 text-white" href="#">Offbeat</a>
            </li>
            <li class="mr-3">
                <a class="inline-block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="">Luxe</a>
            </li>
        </ul>
  
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div v-for="place in places" :key="place.id" class="box-border md:box-content p-0">
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
    </div>
</template>

<script>
export default {
    components: {
        
    },
    props: {
        places: Object,
    },
};
</script>