<template>
  <section class="container">

<div class="pb-5" v-for="(category, index) in products" :key="index">

  <div class="hover"><h1><a :href="`/dashboard/${category.name}`" class="fw-bold">{{ category.name }}</a></h1></div>
  <div class="row row-cols-1 row-cols-md-4">
    <div v-for="(product) in category.product" class="col mb-3">
    <product-detail :product="product"/>
    </div>
  </div>
</div>

  </section>

</template>

<script>
  import ProductDetail from './Productdetail'
export default {
  props: ['products'],
  name: 'Products.vue',
  components: {

    ProductDetail

  },
}



</script>

<style scope>



</style>

