import { createStore } from 'vuex';
import router from "../router";
// Load store modules dynamically.
const requireContext = require.context('~/store/modules', false, /.*\.js$/);

const modules = requireContext.keys()
    .map(file =>
        [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
    ).reduce((modules, [name, module])=>(
        modules[name] = module.default,
            modules
    ),{});
const store = createStore({
    modules: modules,
})
export default store;
