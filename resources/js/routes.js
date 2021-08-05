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
            component: loadView('Template'),
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
            children: [{
                    path: '/',
                    name: 'Home',
                    component: loadView('Home'),
                },
                {
                    path: 'list',
                    name: 'List',
                    component: loadView('List'),
                },
                {
                    path: 'list/detail',
                    name: 'ListDetail',
                    component: loadView('ListDetail'),
                },
                {
                    path: 'setting',
                    name: 'Setting',
                    component: loadView('Setting'),
                },
                {
                    path: 'setting/myphysique',
                    name: 'MyPhysique',
                    component: loadView('MyPhysique'),
                },
            ]
        },
    ]
}
