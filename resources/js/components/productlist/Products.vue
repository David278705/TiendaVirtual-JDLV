<template>
  <section class="container">

<div class="pb-5" v-for="(category, index) in products" :key="index">

  <div class="hover"><h1><a :href="`/dashboard/${category.name}`" class="fw-bold">{{ category.name }}</a></h1></div>
  <div class="row row-cols-1 row-cols-md-4">
    <div v-for="(product) in category.product" class="col mb-3">
      <div class="card">
              <div class="card-header">
                <h2 class="item"><a :href="`/dashboard/product/${product.id}`">{{ product.name }}</a></h2>
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
    </div>
  </div>
</div>

  </section>

</template>

<script>

export default {
  props: ['products'],
  name: 'Products.vue',
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
            

        },
      
  },
}



</script>

<style scope>



</style>

