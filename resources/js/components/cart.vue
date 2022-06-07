<template>
    <section>
        <h1>Carrito de Compras {{ user.name }}</h1>

              <table id="table" class="c-table">
        <thead class="c-table__header">
          <tr>
            <th></th>
            <th class="c-table__col-label">Nombre</th>
            <th class="c-table__col-label">Precio</th>
            <th class="c-table__col-label">Categoria</th>
            <th class="c-table__col-label">Acciones</th>
          </tr>
        </thead>
        <tbody class="c-table__body">
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <a class="btn btn-danger">Eliminar</a>
              <div class="height"></div>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
</template>

<script>

export default {
    props: ['cart', 'user'],
    name: "cart",

}
</script>

<style scoped>
</style>