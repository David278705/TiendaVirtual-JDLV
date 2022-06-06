<template>
    <section>
        <product-form :categories="categories" :product="product"></product-form>
        <product-table :categories="categories" :products="products_update"></product-table>
    </section>
</template>

<script>
import ProductForm from './add'
import ProductTable from './table'
export default {
    props: ['categories', 'products'],
    name: "Index",
    components: {
        ProductForm,
        ProductTable,
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