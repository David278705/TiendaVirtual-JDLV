import './bootstrap';

import Alpine from 'alpinejs';

import Vue from 'vue'

import Products from './components/Products'

import Welcome from './components/Welcome'

import Role from './components/role/Index'

import Edit from './components/role/edit'

import ProductIndex from './components/products/Index'

import CategoryIndex from './components/Category/Index'

import CategoryForm from './components/Category/Form'

window.Alpine = Alpine;

Alpine.start();

new Vue({

    el: '#app',
    components: {
    
    Products,
    Welcome,
    RoleEditor: Role,
    RoleEdit: Edit,
    ProductIndex,
    CategoryIndex,
    CategoryForm,
    }
    
    })