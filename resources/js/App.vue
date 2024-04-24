<template>
    <div>
        <mishka-mebel-header></mishka-mebel-header>
        <router-view/>
        <mishka-mebel-footer></mishka-mebel-footer>
    </div>
</template>

<script>
import header from "@/components/blocks/Header.vue";
import footer from "@/components/blocks/Footer.vue";
// import { saveUserData } from "@/store/index.js";
export default {
    // data(){
    //     return {
    //         userData: saveUserData
    //     };
    // },
    components:{
        "MishkaMebelHeader": header,
        "MishkaMebelFooter": footer
    },
}
</script>
