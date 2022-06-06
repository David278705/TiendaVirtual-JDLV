<template>

<section class="container">

<div class="wrapper">
  <h1>Usuarios y Roles</h1>
  <table class="c-table">
  <thead class="c-table__header">
    <tr>
      <th></th>
      <th class="c-table__col-label">Nombre</th>
      <th class="c-table__col-label">Correo</th>
      <th class="c-table__col-label">Roles</th>
      <th class="c-table__col-label">Accion</th>
    </tr>
  </thead>
  <tbody class="c-table__body">
   <tr v-for="(user, index) in users" :key="index">
                    <td></td>
                    <td class="c-table__cell">{{ user.name }}</td>
                    <td class="c-table__cell">{{ user.email }}</td>
                    <td v-if="user.roles.length == 2" class="c-table__cell">{{ user.roles[0].name }}, {{user.roles[1].name}}</td>
                    <td v-else-if="user.roles != 0" class="c-table__cell">{{ user.roles[0].name }}</td>
                    <td v-else class="c-table__cell">No Tiene</td>
                    <td class="c-table__cell">
                        <a  class="btn btn-info" :href="`/Role/edit/${user.id}`">Editar Role</a>
                        <div class="height"></div>
                    </td>
                  </tr>
  </tbody>
</table>
</div>  

</section>

</template>

<script>

export default {
    props: ['users', 'roles'],
    name: 'Role.vue',
}

</script>

<style scope>
.height {

height: 15px;

}

</style>

