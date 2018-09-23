import list from './list/index.vue';
import create from './create/index.vue';
import edit from './edit/index.vue';

export default [
    {path: '/players', component: list, canReuse: false, name: 'players'},
    {path: '/players/create', component: create, name: 'players.create'},
    {path: '/players/edit/:id', component: edit, name: 'players.edit'},
]