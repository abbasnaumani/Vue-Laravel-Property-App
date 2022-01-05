function page(path) {
    return () => import(/* webpackChunkName: '' */ `~/frontsite/pages/${path}`).then(
        m => m.default || m)
}

export default [
    {
        path: '/',
        name: 'dashboard',
        component: page('agency/Dashboard'),
        meta: {public: true, meta_title: 'KS Property'},
    },
    {
        path: '/login',
        name: 'main-login',
        component: page('auth/Login'),
        meta: {login: true, meta_title: 'User Login'},
        props: true,
    },
    {
        path: '/signup',
        name: 'register',
        component: page('auth/Register'),
        meta: {login: true, meta_title: 'User Registration'},
        props: true,
    },
    {
        path: '/forgot/password',
        name: 'forgot-password',
        component: page('auth/ForgotPassword'),
        meta: {login: true, meta_title: 'Forgot Password'},
        props: true,
    },
    {
        path: '/reset/password/:encodedToken',
        name: 'reset-password',
        component: page('auth/ResetPassword'),
        meta: {login: true, meta_title: 'Reset Password'},
        props: ({params}) => ({encodedToken: params.encodedToken || ''}),
    },
    {
        path: '/user/profile',
        name: 'user-profile',
        meta: {public: false, meta_title: 'User Profile'},
        component: page('user/UserProfile'),
    },
    {
        path: '/agency/profile',
        name: 'agency-profile',
        meta: {public: false, meta_title: 'Agency Profile'},
        component: page('user/AgencyProfile'),
    },
    {
        path: '/:slug/contact/us',
        name: 'contact-us',
        meta: {public: true, meta_title: 'Contact Us'},
        component: page('ContactUs'),
    },
    {
        path: '/logout',
        name: 'logout',
        meta: {logout: true, meta_title: 'Logout'},
        component: page('auth/Logout')
    },
    {
        path: '/:slug/agents/info',
        name: 'agents-info',
        meta: {public: true, meta_title: 'KS Agents Info'},
        component: page('aboutus/AgentInfo'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/:slug/agent/info/detail',
        name: 'agent-info-detail',
        meta: {public: true, meta_title: 'KS Agent Info Detail'},
        component: page('aboutus/AgentInfoDetail'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/:slug/about/us',
        name: 'about-us',
        meta: {public: true, meta_title: 'KS About Us'},
        component: page('aboutus/AboutUs'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/:slug/add/property',
        name: 'add-property',
        meta: {public: true, meta_title: 'Add Property'},
        component: page('property/AddProperty'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/:slug/properties',
        name: 'front-properties',
        meta: {public: true, meta_title: 'KS Property'},
        component: page('property/Properties'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/:slug/:propertyId/detail',
        name: 'front-detail',
        meta: {public: true, meta_title: 'KS Property Detail'},
        component: page('property/PropertyDetail'),
        props: ({params}) => ({slug: params.slug || '' , propertyId:params.propertyId || 0}),
    },
    {
        path: '/:slug/:anything',
        name: 'slug-not-found',
        meta: {public: true, meta_title: 'KS Property'},
        component: page('NotFound'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/detail',
        name: 'detail',
        meta: {public: true, meta_title: 'KS Property'},
        component: page('detail'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/:slug',
        name: 'front-main',
        meta: {public: true, meta_title: 'KS Property'},
        component: page('Main'),
        props: ({params}) => ({slug: params.slug || ''}),
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'not-found',
        meta: {public: true, meta_title: 'KS Property'},
        component: page('NotFound')
    },
    // if you omit the last `*`, the `/` character in params will be encoded when resolving or pushing
    {
        path: '/:pathMatch(.*)',
        name: 'bad-not-found',
        component: page('NotFound')
    },
];
