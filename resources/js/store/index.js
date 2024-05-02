import { reactive } from "vue";
import Cart from "./Cart.js";
import User from "./User.js"

export const store = reactive({ personalBasket: new Cart(), user: new User() });

