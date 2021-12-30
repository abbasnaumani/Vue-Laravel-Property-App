import { createStore } from 'vuex';
// Load store modules dynamically.
import loader from'~/store/modules/loaderModule';
import auth from'~/store/modules/authModule';
const requireContext = require.context('~/admin/store/modules', false, /.*\.js$/);
console.log('_______________Admin ++++++++++++++++____________');
console.log(requireContext);
const modules = requireContext.keys()
    .map(file =>
        [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
    ).reduce((modules, [name, module])=>(
        modules[name] = module.default,
            modules
    ),{});
modules['loader']=loader;
modules['auth']=auth;
console.log(modules);
const store = createStore({
    modules: modules,
})
export default store;
