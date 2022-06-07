<template>
  <section class="container">

<div class="pb-5" v-for="(category, index) in products" :key="index">

  <div class="hover"><h1><a :href="`/dashboard/${category.name}`" class="fw-bold">{{ category.name }}</a></h1></div>
  <div class="row row-cols-1 row-cols-md-4">
    <div v-for="(product) in category.product" class="col mb-3">
      <div class="card">
              <div class="card-header">
                <h2 class="item">{{ product.name }}</h2>
                </div>       
                <div class="card-body">
                <h3 class="price">${{ product.Price }}</h3>
                <p class="description">{{ product.Description }}</p>
                </div>        
                <div class="card-footer text-center"><a class="btn btn-success">Añadir al Carrito</a></div>
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
}



</script>

<style scope>

.hover:hover {
  cursor: pointer;

}

.listing-section,
.cart-section {
  width: 100%;
  float: left;
  padding: 1%;
  border-bottom: 0.01em solid #dddbdb;
}

.product {
  float: left;
  width: 23%;
  border-radius: 2%;
  margin: 1%;
}

.boton {

  font-size: 30px;
  text-align: center;

}



.text-box {
  width: 100%;
  float: left;
  border: 0.01em solid #dddbdb;
  border-radius: 0 0 2% 2%;
  padding: 1em;
}



.item,
.price {
  clear: left;
  width: 100%;
  text-align: center;
}

.price {
  color: Grey;
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

input:focus {
  outline-color: #fdf;
}


.text-box input {
  width: 15%;
  clear: none;
}

.text-box button {
  margin-top: 1em;
}




button:focus {
  outline: 0;
}

button:active {
  bottom: 0;
  background-color: #fdf;
}

.table-heading,
.table-content {
  width: 75%;
  margin: 1% 12.25%;
  float: left;
  background-color: #dfd;
}

.table-heading h2 {
  padding: 1%;
  margin: 0;
  text-align: center;
}
</style>

