<template>
    <section>
        <product-list :categories="categories" :category="category" :products="products_update"></product-list>
    </section>
</template>

<script>
import ProductList from './Products'

export default {
    props: ['categories', 'products', 'category'],
    name: "Index",
    components: {
        ProductList
    },
    data() {
        return {
            products_update: this.products,
            product: {
                create: true
            }
        }

    }

}
</script>

<style scoped>
</style>