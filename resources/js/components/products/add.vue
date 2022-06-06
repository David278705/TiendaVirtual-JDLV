<template>

<section class="container">

<div class="section-form">
  <form @submit.prevent="save">
    <div class="intro"> 
      <h1>Añadir Productos</h1>
      <h2>Añadir productos a la Tienda Virtual</h2>
    </div>
    <div class="form-group">
          <label for="name">Nombre de Producto</label>
          <input type="text" v-model="product.name" required>
        </div>
        <div  class="form-group">
          <label class="form-label">Categoria</label>
          <select  class="form-control" v-model="product.category_id" required>
            <option v-for="(category, index) in categories" :key="index" :value="category.id"> {{ category.name }} </option>
          </select>
        </div>
        <br>
    <div class="form-group">
          <label for="name">Precio</label>
          <input type="text" v-model="product.Price" required>
        </div>
<div class="form-group">
          <label for="name">Descripción</label>
          <textarea  tabindex="5" rows="5" v-model="product.Description" required></textarea>
        </div>
        <div class="form-group">
          <label for="name">Imagen</label>
        </div>
    <div class="form-group">
         <br>
    <input  type="text" v-model="product.Image">
  </div>
    <button class="btn btn-success"  >Añadir Producto</button>
  </form>
</div>
</section>

</template>

<script>

export default {
    props: ['categories', 'product'],
    name: 'add.vue',
    methods: {
       async save() {
      let url = `/Product/store`
      if (!this.product.create) {
        url = `/Product/update/${this.product.id}`
      }
      await axios.post(url, this.product).then(res => {
        if (res.data.saved) {
          this.$parent.product = 
          {
             name: null,
            Description: null,
            category_id: null,
            Image: null,
            Price: null,
            created: true,
          }
          alert('Producto Añadido!')

 
        }

        else if (res.data.updated) {
          alert('informacion editada')
        }

      })

    }
    }
}

</script>

<style scope>

</style>

