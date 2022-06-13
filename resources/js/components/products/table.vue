<template>
  <div class="container">
    <div class="section-form">
      <h1>Tabla de Productos</h1>
      <br>
      <table id="table" class="c-table">
        <thead class="c-table__header">
          <tr>
            <th class="c-table__col-label">Nombre</th>
            <th class="c-table__col-label">Categoria</th>
            <th class="c-table__col-label">Precio</th>
            <th class="c-table__col-label">Acciones</th>
          </tr>
        </thead>
        <tbody class="c-table__body">
          <tr v-for="(product, index) in products" :key="index">
            <td>{{ product.name }}</td>
            <td>{{ product.category.name }}</td>
            <td>{{ product.Price }}</td>
            <td>
              <a class="btn btn-warning" :href="`/Product/edit/${product.id}`">Editar</a>
              <a class="btn btn-danger" @click="deleteProduct(product, index)">Eliminar</a>
              <div class="height"></div>
            </td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script >


export default {
  props: ['products'],
  name: "Table",
  data() {
    return {
      product: {
        name: null,
      }

    }
  },
  methods: {

    async deleteProduct(product, index) {
      await axios.delete(`/Product/delete/${product.id}`).then(res => {
        if (res.data.deleted) {
          this.$parent.products_update.splice(index, 1)
        }
      })
    },
    async save() {

      await axios.post(`/Product/update/${this.product.id}`, this.product).then(res => {
        if (res.data.updated) {
          alert('informacion actualizada con exito!')
        }
      })

    },

    getAll(character) {


      this.product = character



    }
  },

}
</script>

<style scoped>

</style>