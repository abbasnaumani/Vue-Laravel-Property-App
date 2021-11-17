function page(path) {
    return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(
        m => m.default || m)
}

import UserList from "~/pages/user/UserList";
import UserDashboard from "../pages/user/UserDashboard";

export default [
    {
        path: '/login',
        name: 'login',
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
        path: '/',
        name: 'main',
        meta: {public: false, meta_title: 'User Dashboard'},
        component: UserDashboard,
    },
    {
        path: '/dashboard',
        name: 'user-dashboard',
        meta: {public: false, meta_title: 'User Dashboard'},
        component: UserDashboard,
    },
    {
        path: '/user/list',
        name: 'user-list',
        meta: {public: false, meta_title: 'User List'},
        component: UserList,
    },
    {
        path: '/property',
        name: 'property-dashboard',
        meta: {public: false, meta_title: 'Property Dashboard'},
        component: page('property/Dashboard'),
    },
    {
        path: '/property/details/:propertyId',
        name: 'user-list',
        meta: {public: false, meta_title: 'Property Details'},
        component: page('property/PropertyDetails'),
        props: ({params}) => ({propertyId: params.propertyId || 0}),
    },
    {
        path: '/property/add',
        name: 'property-add',
        meta: {public: false, meta_title: 'Add Property'},
        component: page('property/AddProperty'),
    },
    {
        path: '/property/edit/:propertyId',
        name: 'property-edit',
        meta: {public: false, meta_title: 'Edit Property'},
        component: page('property/EditProperty'),
        props: ({params}) => ({propertyId: params.propertyId || 0}),
    },

    {
        path: '/upload',
        name: 'upload',
        meta: {public: false, meta_title: 'Upload'},
        component: page('Upload'),
    },
    {
        path: '/upload-composition',
        name: 'upload-composition',
        meta: {public: false, meta_title: 'UploadComposition'},
        component: page('UploadComposition'),
    },
    {
        path: '/upload-single-composition',
        name: 'upload-single-composition',
        meta: {public: false, meta_title: 'UploadSingleComposition'},
        component: page('UploadSingleComposition'),
    },

    {
        path: '/logout',
        name: 'logout',
        meta: {logout: true, meta_title: 'Logout'},
        component: page('auth/Logout')
    },
];
