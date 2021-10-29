<template>
    <div id="app">
        <transition name="page" mode="out-in">
            <component :is="layout" v-if="layout" />
        </transition>
    </div>
</template>

<script>
import Default from "./layouts/Default";

const requireContext = require.context('./layouts', false, /.*\.vue$/)

const layouts = requireContext.keys()
    .map(file =>
        [file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
    )
    .reduce((components, [name, component]) => {
        components[name] = component.default || component
        return components
    }, {})

export default {
    name: "app",

    props:{
        slug: String,
    },
    data: () => ({
        defaultLayout: 'Default'
    }),
    computed: {
        layout() {
            return layouts[this.$route.meta.layout] || layouts['Default'];
        }
    },
    mounted() {
    },
}
</script>
