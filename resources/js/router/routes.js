function page(path) {
    return () => import(/* webpackChunkName: '' */ `../pages/${path}`).then(
        m => m.default || m)
}

export default [
    {
        path: '/',
        name: 'login-main',
        component: page('auth/Login'),
        meta:{login: true, meta_title: 'User Login'},
        props: true,
    },
    {
        path: '/login',
        name: 'login',
        component: page('auth/Login'),
        meta:{login: true, meta_title: 'User Login'},
        props: true,
    },
    {
        name: 'user-dashboard',
        path: '/dashboard',
        meta:{public:false,meta_title:'User Dashboard'},
        component: page('user/UserDashboard'),
    },

    // {
    //     path: '/logout',
    //     name: 'logout',
    //     meta: {logout: true, meta_title: 'Logout'},
    //     component: page('auth/Logout')
    // },
];
