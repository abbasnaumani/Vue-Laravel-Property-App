import {createApp} from 'vue';
import App from "~/admin/App.vue";
import router from "~/admin/router";
import store from '~/admin/store';
import Child from "~/admin/components/utilities/Child";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import VueElementLoading from "vue-element-loading";
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
    VueElementLoading
].forEach(Component => {
    app.component(Component.name, Component);
});
store.$app = app;
router.isReady().then(() => {
    app.mount('#app')
});
