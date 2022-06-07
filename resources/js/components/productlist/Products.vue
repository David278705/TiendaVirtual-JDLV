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
                <h3 class="price">${{ product.Price }}</h3>
                <p class="description">{{ product.Description }}</p>
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
            await axios.post(`/Carrito/store`, product).then(res => {
                if (res.data.saved) {
                    alert('info subida al carrito!')
                }
            })

        }
  },
}



</script>

<style scope>

.hover:hover {
  cursor: pointer;

}



.item,
.price {
  clear: left;
  width: 100%;
  text-align: center;
}


.description {
  float: left;
  clear: left;
  width: 100%;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
  font-size: 1em;
  text-align: center;
  margin: 0.2em auto;
}


</style>

