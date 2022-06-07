<template>
    <section>
        <h1><small>Carrito de Compras de {{ user.name }}</small></h1>

              <table id="table" class="c-table">
        <thead class="c-table__header">
          <tr>
            <th></th>
            <th class="c-table__col-label">Nombre</th>
            <th class="c-table__col-label">Precio</th>
            <th class="c-table__col-label">Acciones</th>
          </tr>
        </thead>
        <tbody v-for="(cart, index) in cart" :key="index" class="c-table__body">
          <tr v-if="user.id == cart.user.id">
            <td></td>
            <td>{{cart.product.name}}</td>
            <td>${{cart.product.Price}}</td>
            <td>
              <a @click="deleteCart(cart, index)" class="btn btn-danger">Eliminar</a>
              <div class="height"></div>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
</template>

<script>

export default {
    props: ['cart', 'user'],
    name: "cart",
    data(){
      return{
    cart_update: this.cart,

      }
    },
    methods: {
      async deleteCart(cart, index) {
      await axios.delete(`/Carrito/delete/${cart.id}`).then(res => {
        if (res.data.deleted) {
          this.$parent.cart_update.splice(index, 1)
        }
      })
    },
    },

}
</script>

<style scoped>
</style>