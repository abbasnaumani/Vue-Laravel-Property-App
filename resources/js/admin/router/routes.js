function page(path) {
    return () => import(/* webpackChunkName: '' */ `~/admin/pages/${path}`).then(
        m => m.default || m)
}

function routePath(path) {
    return '/admin' + path;
}

export default [
    {
        path: '/admin',
        name: 'dashboard',
        meta: {public: false, meta_title: 'User Dashboard'},
        component: page('user/UserDashboard'),
    },
    {
        path: routePath('/login'),
        name: 'login',
        component: page('auth/Login'),
        meta: {login: true, meta_title: 'Admin Login'},
        props: true,
    },
    {
        path: routePath('/forgot/password'),
        name: 'forgot-password',
        component: page('auth/ForgotPassword'),
        meta: {login: true, meta_title: 'Forgot Password'},
        props: true,
    },
    {
        path: routePath('/reset/password/:encodedToken'),
        name: 'reset-password',
        component: page('auth/ResetPassword'),
        meta: {login: true, meta_title: 'Reset Password'},
        props: ({params}) => ({encodedToken: params.encodedToken || ''}),
    },
    // no need because wo consider admin as super admin
    // {
    //     path: '/signup',
    //     name: 'register',
    //     component: page('auth/Register'),
    //     meta: {login: true, meta_title: 'Admin Registration'},
    //     props: true,
    // },
    // all agency list route
    {
        path: routePath('/agency/list'),
        name: 'agency-list',
        meta: {public: false, meta_title: 'Agency List'},
        component: page('user/AgencyList'),
    },
    // Add Agency
    {
        path: routePath('/add/agency'),
        name: 'add-agency',
        meta: {public: false, meta_title: 'Add Agency'},
        component: page('user/AddAgency'),
    },
    // Edit Agency
    {
        path: routePath('/edit/agency/:agencyId'),
        name: 'edit-agency',
        meta: {public: false, meta_title: 'Edit Agency'},
        component: page('user/EditAgency'),
        props: ({params}) => ({agencyId: params.agencyId || 0}),
    },
    // Agency User List Route
    {
        path: routePath('/:agencyId/users/'),
        name: 'agency-user-list',
        meta: {public: false, meta_title: 'Agency User List'},
        component: page('user/AgencyUserList'),
        props: ({params}) => ({agencyId: params.agencyId || 0}),
    },
    //Add user to agency
    {
        path: routePath('/:agencyId/user/add'),
        name: 'user-add',
        meta: {public: false, meta_title: 'Add Agency User'},
        component: page('user/AddAgencyUser'),
        props: ({params}) => ({agencyId: params.agencyId || 0}),
    },
    //Update user to agency
    {
        path: routePath('/edit/user/:userId'),
        name: 'user-edit',
        meta: {public: false, meta_title: 'Edit Agency User'},
        component: page('user/EditAgencyUser'),
        props: ({params}) => ({userId: params.userId || 0}),
    },
    {
        path: routePath('/user/list'),

        name: 'user-list',
        meta: {public: false, meta_title: 'User List'},
        component: page('user/UserList'),
    },

    {
        path: routePath('/dashboard'),
        name: 'user-dashboard',
        meta: {public: false, meta_title: 'User Dashboard'},
        component: page('user/UserDashboard'),
    },
    {
        path: routePath('/contactus'),
        name: 'contact-us',
        meta: {public: false, meta_title: 'Contact Us'},
        component: page('user/ContactUsList'),
    },
    {
        path: '/logout',
        name: 'admin-logout',
        meta: {logout: true, meta_title: 'Logout'},
        component: page('auth/Logout')
    },
    {
        path: routePath('/logout'),
        name: 'logout',
        meta: {logout: true, meta_title: 'Logout'},
        component: page('auth/Logout')
    },

    // {
    //     path: '/user/chat',
    //     name: 'user-chat',
    //     meta: {public: false, meta_title: 'User Chat'},
    //     component: UserChat,
    // },
    {
        path: routePath('/property'),
        name: 'property-dashboard',
        meta: {public: false, meta_title: 'Property Dashboard'},
        component: page('property/Dashboard'),
    },
    {
        path: routePath('/property/details/:propertyId'),
        name: 'property-list',
        meta: {public: false, meta_title: 'Property Details'},
        component: page('property/PropertyDetails'),
        props: ({params}) => ({propertyId: params.propertyId || 0}),
    },
    {
        path: routePath('/property/add'),
        name: 'property-add',
        meta: {public: false, meta_title: 'Add Property'},
        component: page('property/AddProperty'),
    },
    {
        path: routePath('/property/edit/:propertyId'),
        name: 'property-edit',
        meta: {public: false, meta_title: 'Edit Property'},
        component: page('property/EditProperty'),
        props: ({params}) => ({propertyId: params.propertyId || 0}),
    },
    // {
    //     path: '/property/search',
    //     name: 'property-search',
    //     meta: {public: false, meta_title: 'Search Property'},
    //     component: page('property/SearchProperty'),
    // },
    //
    // {
    //     path: '/upload',
    //     name: 'upload',
    //     meta: {public: false, meta_title: 'Upload'},
    //     component: page('Upload'),
    // },
    // {
    //     path: '/upload-composition',
    //     name: 'upload-composition',
    //     meta: {public: false, meta_title: 'UploadComposition'},
    //     component: page('UploadComposition'),
    // },
    // {
    //     path: '/upload-single-composition',
    //     name: 'upload-single-composition',
    //     meta: {public: false, meta_title: 'UploadSingleComposition'},
    //     component: page('UploadSingleComposition'),
    // },
    //
    {
        path: '/:pathMatch(.*)*',
        name: 'not-found',
        component: page('NotFound')
    },
    // if you omit the last `*`, the `/` character in params will be encoded when resolving or pushing
    {
        path: '/:pathMatch(.*)',
        name: 'bad-not-found',
        component: page('NotFound')
    },
];
