<template>
<div class="container">
<div class="section-form">
    <h1>Tabla de Categorias</h1>
<br>
  <table class="c-table">
  <thead class="c-table__header">
    <tr>
      <th></th>
      <th class="c-table__col-label">Nombre</th>
      <th class="c-table__col-label">Acciones</th>
    </tr>
  </thead>
  <tbody class="c-table__body">
   <tr v-for="(category, index) in categories" :key="index">
                    <td></td>   
                    <td>{{ category.name }}</td>
                    <td>
                        <a class="btn btn-warning" :href="`/Category/edit/${category.id}`">Editar</a>
                        <a class="btn btn-danger"  @click="deleteCategory(category, index)">Eliminar</a>  
                          <div class="height"></div>
                    </td>
                  
                  </tr>
  </tbody>
</table>
</div>
 </div>
</template>

<script>


    export default {
        props: ['categories'],
        name: "Table",
        data(){
              return{
                category: {
                name: null,
            }

            }
        },
        methods: {
          async  deleteCategory(category, index) {
                await axios.delete(`/Category/delete/${category.id}`).then(res => {
                    if(res.data.deleted){
                     this.$parent.categories_update.splice(index, 1)
                    }
                })
            },
            async save(){
     
               await axios.post(`/Category/update/${this.category.id}`, this.category).then(res => { if(res.data.updated){
                       alert('informacion actualizada con exito!')}
                    })

            },

               getAll(character){


            this.category = character

         
    
        }
        },

    }
</script>

<style scoped>
.height {
height: 25px;

}
</style>