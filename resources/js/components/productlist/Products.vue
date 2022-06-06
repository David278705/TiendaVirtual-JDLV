<template>
  <section class="container">





    <div class="row" v-for="(category, index) in categories" :key="index">

      <div v-if="categories == null">
        <h1>{{ category.name }}</h1>
      </div>

      <div class="boton" v-else>
        <h1><a class="h1" :href="`/${category.id}`">{{ category.name }}</a></h1>
      </div>


      <div class="col-3" v-for="(product, index) in products" :key="index">

        <div v-if="category.id == product.category_id">

          <div>
            <div class="text-box">
              <h2 class="item">{{ product.name }}</h2>
              <h3 class="price">${{ product.Price }}</h3>
              <p class="description">{{ product.Description }}</p>

            </div>
            <h1><a class="btn btn-success">Añadir al Carrito</a></h1>
          </div>

        </div>
      </div>


    </div>







  </section>

</template>

<script>

export default {
  props: ['categories', 'products', 'category'],
  name: 'Products.vue',

}



</script>

<style scope>
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

