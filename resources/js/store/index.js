import { reactive } from "vue";
import Cart from "@/store/Cart.js";
export const store = reactive({ personalBasket: new Cart() })