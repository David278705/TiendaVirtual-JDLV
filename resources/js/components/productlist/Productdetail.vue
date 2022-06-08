<template>
  <section class="container">

      <div class="shop-card">
  <div class="title">
    {{ product.name }}
  </div>
  <div class="desc">
    {{ product.Description }}
  </div>
  <div class="slider">
          <img class="cent" src="data:image/png;base64,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" />
  </div>

  <div class="cta">
    <div class="price">${{ product.Price }}</div>
    <div v-if="product.stock == 'Con Stock'">
    <h4 class="verde">{{product.stock}}</h4>
    </div>
    <div v-else>
      <h4 class="rojo">{{product.stock}}</h4>
    </div>
    <button class="btn"><a @click="save(product)">Añadir al Carrito</a><span class="bg"></span></button>
  </div>
</div>
<div class="bg"></div>




  </section>

</template>

<script>

export default {
  props: ['product'],
  name: 'Productsdetail.vue',
  methods: {
    async save(product) {
            if(product.stock == 'Sin Stock'){

              alert('Este producto no tiene Stock!')
              
            }
            else{
              await axios.post(`/Carrito/store`, product).then(res => {
                if (res.data.saved) {
                    alert('Información subida al carrito!')
                }
                else{
                  alert('debes iniciar sesion para poder hacer eso')
                }
            })
            }

        }
  },
}



</script>

<style scope>

.verde{

  color: rgb(3, 185, 3);
  text-align: center;

}

.rojo{

  color:red;
  text-align: center;

}

.cent{

display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;

}

</style>

