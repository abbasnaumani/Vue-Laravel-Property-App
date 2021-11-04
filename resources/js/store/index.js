import { createStore } from 'vuex';
import {auth} from "./modules/auth";
import {user} from "./modules/user";

const store = createStore({
    modules: {
        auth,user
    },
})
export default store;
