<template>
    <section>
        <cart-table :cart="cart_update" :user="user"></cart-table>
    </section>
</template>

<script>
import CartTable from './cart'

export default {
    props: ['cart', 'user'],
    name: "Index",
    components: {
        CartTable,
    },
    data() {
        return {
            cart_update: this.cart,
            category: {
                create: true
            }
        }

    }

}
</script>

<style scoped>
</style>