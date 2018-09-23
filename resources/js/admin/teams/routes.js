import list from './list/index.vue';
import create from './create/index.vue';
import edit from './edit/index.vue';

export default [
    {path: '/teams', component: list, canReuse: false, name: 'teams'},
    {path: '/teams/create', component: create, name: 'teams.create'},
    {path: '/teams/edit/:id', component: edit, name: 'teams.edit'},
]