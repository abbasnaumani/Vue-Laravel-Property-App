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
    // no need because wo consider admin as super admin
    // {
    //     path: '/signup',
    //     name: 'admin-register',
    //     component: page('auth/Register'),
    //     meta: {login: true, meta_title: 'Admin Registration'},
    //     props: true,
    // },
    {
        path: '/dashboard',
        name: 'user-dashboard',
        meta: {public: false, meta_title: 'User Dashboard'},
        component: page('user/UserDashboard'),
    },
    {
        path: '/admin/agency/list',
        name: 'agency-list',
        meta: {public: false, meta_title: 'Agency List'},
        component: page('user/AgencyList'),
    },
    {
        path: '/admin/:agencyId/users/',
        name: 'agency-user-list',
        meta: {public: false, meta_title: 'Agency User List'},
        component: page('user/AgencyUserList'),
        props: ({params}) => ({agencyId: params.agencyId || 0}),
    },
    {
        path: '/logout',
        name: 'logout',
        meta: {logout: true, meta_title: 'Logout'},
        component: page('auth/Logout')
    },
    // {
    //     path: '/main/login',
    //     name: 'login',
    //     component: page('frontsite/auth/Login'),
    //     meta: {login: true, meta_title: 'User Login'},
    //     props: true,
    // },
    // {
    //     path: '/main/signup',
    //     name: 'register',
    //     component: page('frontsite/auth/Register'),
    //     meta: {login: true, meta_title: 'User Registration'},
    //     props: true,
    // },
    // {
    //     path: '/forgot/password',
    //     name: 'forgot-password',
    //     component: page('auth/ForgotPassword'),
    //     meta: {login: true, meta_title: 'Forgot Password'},
    //     props: true,
    // },
    // {
    //     path: '/reset/password/:encodedToken',
    //     name: 'reset-password',
    //     component: page('auth/ResetPassword'),
    //     meta: {login: true, meta_title: 'Reset Password'},
    //     props: ({params}) => ({encodedToken: params.encodedToken || ''}),
    // },
    // {
    //     path: '/',
    //     name: 'main',
    //     meta: {public: false, meta_title: 'User Dashboard'},
    //     component: UserDashboard,
    // },

    // {
    //     path: '/user/list',
    //     name: 'user-list',
    //     meta: {public: false, meta_title: 'User List'},
    //     component: UserList,
    // },
    // {
    //     path: '/user/add',
    //     name: 'user-add',
    //     meta: {public: false, meta_title: 'User Add'},
    //     component: page('user/AddAgencyUser'),
    // },
    // {
    //     path: '/user/chat',
    //     name: 'user-chat',
    //     meta: {public: false, meta_title: 'User Chat'},
    //     component: UserChat,
    // },
    // {
    //     path: '/properties',
    //     name: 'properties',
    //     meta: {public: true, meta_title: 'KS Properties'},
    //     component: page('frontsite/property/Properties'),
    // },
    // {
    //     path: '/property',
    //     name: 'property-dashboard',
    //     meta: {public: false, meta_title: 'Property Dashboard'},
    //     component: page('property/Dashboard'),
    // },
    // {
    //     path: '/property/details/:propertyId',
    //     name: 'property-list',
    //     meta: {public: false, meta_title: 'Property Details'},
    //     component: page('property/PropertyDetails'),
    //     props: ({params}) => ({propertyId: params.propertyId || 0}),
    // },
    // {
    //     path: '/property/add',
    //     name: 'property-add',
    //     meta: {public: false, meta_title: 'Add Property'},
    //     component: page('property/AddProperty'),
    // },
    // {
    //     path: '/property/edit/:propertyId',
    //     name: 'property-edit',
    //     meta: {public: false, meta_title: 'Edit Property'},
    //     component: page('property/EditProperty'),
    //     props: ({params}) => ({propertyId: params.propertyId || 0}),
    // },
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
    //     path: '/:slug/main',
    //     name: 'front-main',
    //     meta: {public: true, meta_title: 'KS Property'},
    //     component: page('frontsite/Main'),
    //     props: ({params}) => ({slug: params.slug || ''}),
    // },
    // {
    //     path: '/:slug/:propertyId/detail',
    //     name: 'front-detail',
    //     meta: {public: true, meta_title: 'KS Property Detail'},
    //     component: page('frontsite/property/PropertyDetail'),
    //     props: ({params}) => ({slug: params.slug || '' , propertyId:params.propertyId || 0}),
    // }
];