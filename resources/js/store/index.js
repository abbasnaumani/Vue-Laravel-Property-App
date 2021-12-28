import { createStore } from 'vuex';
// Load store modules dynamically.
const requireContext = require.context('~/store/modules', false, /.*\.js$/);
console.log('_______________++++++++++++++++____________');
console.log(requireContext);
const modules = requireContext.keys()
.map(file =>
    [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
).reduce((modules, [name, module])=>(
    modules[name] = module.default,
        modules
),{});

console.log(modules);
const store = createStore({
    modules: modules,
})
export default store;
