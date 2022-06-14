<template>
  <section class="container">
      <div class="card" style="width: 14rem;">
              <div class="card-header">
                <a :href="`/dashboard/product/${product.id}`">
                <img :src="`${product.image}`" alt="image" class="card-img-top productimage">
                <h2 class="item">{{ product.name }}</h2>
                </a>
                </div>       
                <div class="card-body">
                <h3 class="price">Precio: ${{ product.Price }}</h3>
                    <div v-if="product.stock == 'Con Stock'">
    <h4 class="verde">{{product.stock}}</h4>
    </div>
    <div v-else>
      <h4 class="rojo">{{product.stock}}</h4>
    </div>
                </div>                        
                <div class="card-footer text-center"><a @click="save(product)" class="btn btn-success">Añadir al Carrito</a></div>
            </div>  
  </section>

</template>

<script>

export default {
  
  props: ['product'],
  name: 'Productsdetail.vue',
  methods: {
    async save(product) {
          try{

  if(product.stock == 'Sin Stock'){

              alert('Este producto no tiene Stock!')
              
            }
            else if(product.stock == 'Con Stock'){
              await axios.post(`/Carrito/store`, product).then(res => {
                if (res.data.saved) {
                    alert('Información subida al carrito!')
                }
            })
            }

          }

          catch(error){

            alert('Debes Iniciar Sesion para añadir cosas al carrito.')

          }


           

        }
  },
}



</script>

<style scope>



</style>

