import axios from "axios";

function loadView(component) {
    return () => import(`./components/${component}.vue`);
}

export default {
    mode: 'history',

    routes: [{
            path: '*',
            name: 'NotFound',
            component: loadView('NotFound'),
        },
        {
            path: '/login',
            name: 'Login',
            component: loadView('Login'),
        },
        {
            path: '/register',
            name: 'Register',
            component: loadView('Register'),
        },
        {
            path: '/',
            name: 'Top',
            component: loadView('Top'),
        },
        {
            path: '/home',
            name: 'Home',
            component: loadView('Home'),
            beforeEnter: (to, form, next) => {
                axios.get('/api/authenticated')
                    .then(() => {
                        next()
                    })
                    .catch(() => {
                        return next({
                            name: 'Login'
                        })
                    })
            },
        },
        {
            path: '/home/list',
            name: 'List',
            component: loadView('List'),
            beforeEnter: (to, form, next) => {
                axios.get('/api/authenticated')
                    .then(() => {
                        next()
                    })
                    .catch(() => {
                        return next({
                            name: 'Login'
                        })
                    })
            },
        },
        {
            path: '/home/list/detail',
            name: 'ListDetail',
            component: loadView('ListDetail'),
            beforeEnter: (to, form, next) => {
                axios.get('/api/authenticated')
                    .then(() => {
                        next()
                    })
                    .catch(() => {
                        return next({
                            name: 'Login'
                        })
                    })
            },
        },
        {
            path: '/home/setting',
            name: 'Setting',
            component: loadView('Setting'),
            beforeEnter: (to, form, next) => {
                axios.get('/api/authenticated')
                    .then(() => {
                        next()
                    })
                    .catch(() => {
                        return next({
                            name: 'Login'
                        })
                    })
            },
        },
        {
            path: '/home/setting/myphysique',
            name: 'MyPhysique',
            component: loadView('MyPhysique'),
            beforeEnter: (to, form, next) => {
                axios.get('/api/authenticated')
                    .then(() => {
                        next()
                    })
                    .catch(() => {
                        return next({
                            name: 'Login'
                        })
                    })
            },
        },
    ]
}
