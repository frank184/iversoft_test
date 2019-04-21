import NotFound from './components/NotFound';
import UsersList from './components/Users/List'
import UsersShow from './components/Users/Show'
import UsersCreate from './components/Users/Create'
import UsersEdit from './components/Users/Edit'

export default {
  mode: 'history',
  routes: [
    { path: '*', name: 'notFound', component: NotFound },
    { path: '/', name: 'root', component: UsersList },
    { path: '/users', name: 'listUsers', component: UsersList },
    { path: '/users/create', name: 'createUser', component: UsersCreate },
    { path: '/users/:id', name: 'showUser', component: UsersShow, props: true },
    { path: '/users/:id/edit', name: 'editUser', component: UsersEdit, props: true },
  ]
};
