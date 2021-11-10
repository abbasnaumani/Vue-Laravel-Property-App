import {createApp} from 'vue';
import App from "./App.vue";
import router from "~/router";
import store from '~/store';
import Child from "~/components/utilities/Child";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const app = createApp({
    ...App
})
.use(store)
.use(router)
.use(Toast, {timeout: 3500});
router.app = app;

// Global Component Registration
[
    Child,
].forEach(Component => {
    app.component(Component.name, Component);
});
store.$app = app;
router.isReady().then(() => {
    app.mount('#app')
});
