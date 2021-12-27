import auth from "~/admin/services/authService";

export default async (to, from, next) => {
    //document.title = to.meta.meta_title || 'BCBooth';
    let targetUrl =localStorage.getItem('url.intended');
    if (auth.isAuthenticated() && targetUrl) {
        const url = targetUrl;
        if (url) {
            localStorage.removeItem('url.intended');
        }
        return next(url);
    }
    if ((to.meta.home) || (to.meta.public)) {
        localStorage.removeItem('url.intended');
        if (from.path === to.path) {
            return;
        }
        return next();
    }

    if (to.meta.login) {
        if (auth.isAuthenticated()) {
            return next({name: 'dashboard'});
        }
        /*        if (to.name === 'create-account') {
                    if (!((to.params.accountType === 'vendor') || (to.params.accountType
                        === 'promoter'))) {
                        next({name: 'sign-up'});
                    }
                }*/
        return next();
    }

    if (auth.isAuthenticated()) {
        let roleHasAccess = true;
        if (typeof to.meta.roleIds != 'undefined' && Array.isArray(
            to.meta.roleIds)) {
            roleHasAccess = auth.verifyRoleIdsAccess(to.meta.roleIds);
        }
        return (roleHasAccess) ? next() : next({name: 'home'});
    }

    // If the user is NOT authenticated but route is to go to the logout
    // page, we should simply clear out the cookies and auth tokens and
    // take the user back to the Login page.
    if (to.meta.logout) {
        auth.onLogout();
        return next({name: 'login'});
    }
    localStorage.setItem('url.intended', to.path);

    next({name: 'login'});
}
