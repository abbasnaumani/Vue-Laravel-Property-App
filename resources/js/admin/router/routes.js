function page(path) {
    return () => import(/* webpackChunkName: '' */ `~/admin/pages/${path}`).then(
        m => m.default || m)
}

export default [
    {
        path: '/admin/login',
        name: 'admin-login',
        component: page('auth/Login'),
        meta: {login: true, meta_title: 'Admin Login'},
        props: true,
    },
    {
        path: '/admin',
        name: 'admin',
        component: page('auth/Login'),
        meta: {login: true, meta_title: 'Admin Login'},
        props: true,
    },
    {
        path: '/admin/forgot/password',
        name: 'admin-forgot-password',
        component: page('auth/ForgotPassword'),
        meta: {login: true, meta_title: 'Forgot Password'},
        props: true,
    },
    {
        path: '/admin/reset/password/:encodedToken',
        name: 'admin-reset-password',
        component: page('auth/ResetPassword'),
        meta: {login: true, meta_title: 'Reset Password'},
        props: ({params}) => ({encodedToken: params.encodedToken || ''}),
    },
    // no need because wo consider admin as super admin
    // {
    //     path: '/signup',
    //     name: 'admin-register',
    //     component: page('auth/Register'),
    //     meta: {login: true, meta_title: 'Admin Registration'},
    //     props: true,
    // },
    // all agency list route
    {
        path: '/admin/agency/list',
        name: 'admin-agency-list',
        meta: {public: false, meta_title: 'Agency List'},
        component: page('user/AgencyList'),
    },
    // Agency Users Route
    {
        path: '/admin/:agencyId/users/',
        name: 'admin-agency-user-list',
        meta: {public: false, meta_title: 'Agency User List'},
        component: page('user/AgencyUserList'),
        props: ({params}) => ({agencyId: params.agencyId || 0}),
    },
    //Add user to agency
    {
        path: '/admin/user/add',
        name: 'admin-user-add',
        meta: {public: false, meta_title: 'User Add'},
        component: page('user/AddAgencyUser'),
    },

    {
        path: '/admin/user/list',

        name: 'admin-user-list',
        meta: {public: false, meta_title: 'User List'},
        component: page('user/UserList'),
    },

    {
        path: '/admin/dashboard',
        name: 'admin-dashboard',
        meta: {public: false, meta_title: 'User Dashboard'},
        component: page('user/UserDashboard'),
    },

    {
        path: '/logout',
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
        path: '/admin/property',
        name: 'admin-property-dashboard',
        meta: {public: false, meta_title: 'Property Dashboard'},
        component: page('property/Dashboard'),
    },
    {
        path: '/admin/property/details/:propertyId',
        name: 'admin-property-list',
        meta: {public: false, meta_title: 'Property Details'},
        component: page('property/PropertyDetails'),
        props: ({params}) => ({propertyId: params.propertyId || 0}),
    },
    {
        path: '/admin/property/add',
        name: 'admin-property-add',
        meta: {public: false, meta_title: 'Add Property'},
        component: page('property/AddProperty'),
    },
    {
        path: '/admin/property/edit/:propertyId',
        name: 'admin-property-edit',
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
    // {
    //     path: '/:pathMatch(.*)*',
    //     name: 'not-found',
    //     component: page('NotFound')
    // },
    // // if you omit the last `*`, the `/` character in params will be encoded when resolving or pushing
    // {
    //     path: '/:pathMatch(.*)',
    //     name: 'bad-not-found',
    //     component: page('NotFound')
    // },
];
