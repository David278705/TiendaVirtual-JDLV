<template>
    <section>
        <product-form :categories="categories" :product="product"></product-form>   
    </section>
</template>

<script>
    import ProductForm from './add'

    export default {
        props: ['categories', 'products'],
        name: "Index",
        components: {
            ProductForm,
        },
        data(){
            return{
               categories_update: this.categories,
               product: {
                   create: true
               }
            }

        }

    }
</script>

<style scoped>

</style>