<template>

    <section class="container">

        <div v-if="roles != 0 && user == 1 && roles.length == 1">
            <h3>Este Usuario No tiene Role de Editor</h3>
            <a :href="`/Role/store/${user}`" class="btn btn-warning">Conceder Role</a>
        </div>

        <div v-else-if="roles != 0">
            <h3>Este Usuario Tiene Role de Editor</h3>
            <a :href="`/Role/delete/${user}`" class="btn btn-danger">Quitar Role</a>
        </div>

        <div v-else>
            <h3>Este Usuario No tiene Role de Editor</h3>
            <a :href="`/Role/store/${user}`" class="btn btn-warning">Conceder Role</a>
        </div>



    </section>


</template>

<script>

export default {
    props: ['user', 'roles'],
    name: 'Edit.vue',
}

</script>

<style scope>
</style>

