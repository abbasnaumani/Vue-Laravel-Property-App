import { createStore } from 'vuex';
// Load store modules dynamically.
import loader from'~/common/store/modules/loader';
import auth from'~/common/store/modules/auth';
const requireContext = require.context('~/admin/store/modules', false, /.*\.js$/);
console.log('_______________++++++++++++++++____________');
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
console.log('___________________________');
console.log(modules);
const store = createStore({
    modules: modules,
})
export default store;
