<template>
    <section>
        <category-form :categories="categories" :category="category"></category-form>
        <category-table :categories="categories_update" />
    </section>
</template>

<script>
import CategoryForm from './Form'
import CategoryTable from './Table'
export default {
    props: ['categories'],
    name: "Index",
    components: {
        CategoryForm,
        CategoryTable
    },
    data() {
        return {
            categories_update: this.categories,
            category: {
                create: true
            }
        }

    }

}
</script>

<style scoped>
</style>