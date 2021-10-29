import { createApp } from 'vue'
import App from "./App.vue";
import router from "./router";
import store from './store';
import Child from "./components/utilities/Child";

const app = createApp({
    ...App
})
    .use(store)
    .use(router)

router.app = app;
[
    Child,
].forEach(Component => {
    app.component(Component.name, Component)
})
// axios.app = app;
store.$app = app;

// app.mount('#app');
router.isReady().then(() => {
    app.mount('#app')
});
