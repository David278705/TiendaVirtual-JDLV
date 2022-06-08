<template>
    <section>

<br>
<div class="shopping-cart ">

  <div class="column-labels">
    <label class="product-details">Producto</label>
    <label class="product-price">Precio</label>
    <label class="product-removal">Eliminar</label>
    <label class="product-line-price">Total</label>
  </div>

  <div v-for="(cart, index) in cart" :key="index" class="product">
  <div v-if="user.id == cart.user.id">
    <div class="product-details">
      <div class="product-title">{{cart.product.name}}</div>
      <p class="product-description">{{ cart.product.Description }}</p>
    </div>
    <div class="product-price">{{ cart.product.Price }}</div>
    <div class="product-removal">
      <a @click="deleteCart(cart, index)" class=" remove-product">Eliminar</a>
    </div>
    <div class="product-line-price">{{ cart.product.Price }}</div>
    </div>
  </div>


  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal"></div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Total Final</label>
      <div class="totals-value" id="cart-total"></div>
    </div>
  </div>

  <a  class="btn btn-success checkout">Comprar</a>

</div>
      

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
$('#myTable tr > *:nth-child(2)').hide();
</script>

<style scoped>
</style>