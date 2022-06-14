<template>
    <section>
        <product-list :products="products"></product-list>
    </section>
</template>

<script>
import ProductList from './Products'


export default {
    props: [ 'products' ],
    name: "Index",
    components: {
        ProductList,
    },
    data() {
        return {
            product: {
                create: true
            }
        }

    }

}
</script>

<style scoped>
</style>