<template>
  <section class="container">
    <div class="section-form">
      <form @submit.prevent="save">
        <div class="intro">
          <h1>Productos</h1>
          <h2>productos de la Tienda Virtual</h2>
        </div>
        <div class="form-group">
          <label for="name">Nombre de Producto</label>
          <input type="text" v-model="product.name" required>
        </div>
        <div class="form-group">
          <label class="form-label">Categoria</label>
          <select class="form-control" v-model="product.category_id" required>
            <option v-for="(category, index) in categories" :key="index" :value="category.id"> {{ category.name }}</option>
          </select>
        </div>
        <br>
         <div class="form-group">
          <label class="form-label">Stock</label>
          <select class="form-control" v-model="product.stock" required>
            <option>Con Stock</option>
            <option>Sin Stock</option>
          </select>
        </div>
        <br>
        <div class="form-group">
          <label for="name">Precio</label>
          <input type="text" v-model="product.Price" required>
        </div>
        <div class="form-group">
          <label for="name">Descripción</label>
          <textarea tabindex="5" rows="5" v-model="product.Description" required></textarea>
        </div>
         <div class="form-group">
          <label for="name">Imagen</label>
          <br>
          <input type="file" accept=".jpeg,.jpg,.png,.svg" id="image" @change="onChangeImage"/>
           <img :src="`${this.show}`" alt="">
        </div>
        <button class="btn btn-success">Subir</button>
      </form>
    </div>
  </section>
</template>
<script>

export default {
  props: ['categories', 'product'],
  name: 'add.vue',
   data() {
        return {
            avatar: null,
            show: null
        }

    },
  methods: {

    onChangeImage(event){

      this.avatar = event.target.files[0]
      this.show = URL.createObjectURL(this.avatar)
      this.product.image = URL.createObjectURL(this.avatar)

    },

    async save() {
       let formData = new FormData();
       formData.append('name', this.product.name);
       formData.append('category_id', this.product.category_id);
       formData.append('stock', this.product.stock);
        formData.append('Price', this.product.Price);
        formData.append('Description', this.product.Description);
       formData.append('image', this.avatar, this.avatar.name);


      let url = `/Product/store`
      if (!this.product.create) {
        url = `/Product/update/${this.product.id}`
      }
      await axios.post(url, formData).then(res => {
        if (res.data.saved) {
          this.$parent.product =
          {
            name: null,
            Description: null,
            category_id: null,
            Image: null,
            Price: null,
            created: true,
            image: null,
          }
          alert('Producto Añadido!')
          location.reload();


        }

        else if (res.data.updated) {
          window.location = "/dashboard/eproduct";
        }

      })

    }
  }
}

</script>

<style scope>
</style>

