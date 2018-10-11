import list from './list/index.vue';
import create from './create/index.vue';
import edit from './edit/index.vue';

export default [
    {path: '/notes', component: list, canReuse: false, name: 'notes'},
    {path: '/notes/create', component: create, name: 'notes.create'},
    {path: '/notes/edit/:id', component: edit, name: 'notes.edit'},
]