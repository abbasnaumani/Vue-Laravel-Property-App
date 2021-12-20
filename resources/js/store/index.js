import { createStore } from 'vuex';
// Load store modules dynamically.
import loader from'~/common/store/modules/loader';
import auth from'~/common/store/modules/auth';
const requireContext = require.context('~/store/modules', false, /.*\.js$/);

const modules = requireContext.keys()
    .map(file =>
        [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
    ).reduce((modules, [name, module])=>(
        modules[name] = module.default,
            modules
    ),{});
modules['loader']=loader;
modules['auth']=auth;
const store = createStore({
    modules: modules,
})
export default store;
