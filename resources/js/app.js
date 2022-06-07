import './bootstrap';

import Alpine from 'alpinejs';

import Vue from 'vue'



import Welcome from './components/Welcome'

import Role from './components/role/Index'

import Edit from './components/role/edit'

import ProductIndex from './components/products/Index'

import CategoryIndex from './components/Category/Index'

import CategoryForm from './components/Category/Form'

import ProductForm from './components/products/add'

import ShoppingCart from './components/cart/Index'

import ProductlistIndex from './components/productlist/Index'

import ProductDetail from './components/productlist/Productdetail'

window.Alpine = Alpine;

Alpine.start();

new Vue({

    el: '#app',
    components: {

        Welcome,
        RoleEditor: Role,
        RoleEdit: Edit,
        ProductIndex,
        CategoryIndex,
        CategoryForm,
        ProductForm,
        ShoppingCart,
        ProductlistIndex,
        ProductDetail,
    }

})