import { createStore } from 'vuex';
// Load store modules dynamically.
import hoodies from'~/store/modules/hoodies';
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
modules['hoddies']=hoodies;
console.log('___________________________');
console.log(modules);
const store = createStore({
    modules: modules,
})
export default store;
