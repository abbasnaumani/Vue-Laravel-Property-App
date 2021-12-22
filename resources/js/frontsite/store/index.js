import { createStore } from 'vuex';
// Load store modules dynamically.
const requireContext = require.context('~/frontsite/store/modules', false, /.*\.js$/);
const modules = requireContext.keys()
    .map(file =>
        [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
    ).reduce((modules, [name, module])=>(
        modules[name] = module.default,
            modules
    ),{});
import loaderModule from'~/store/modules/loaderModule';
import authModule from'~/store/modules/authModule';
modules['loaderModule']=loaderModule;
modules['authModule']=authModule;
const store = createStore({
    modules: modules,
})
export default store;
