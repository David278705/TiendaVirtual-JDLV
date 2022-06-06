<template>
    <section>
        <role-table :roles="roles" :users="users" />
    </section>
</template>

<script>
    import Role from './Role'
    export default {
        props: ['users', 'roles'],
        name: "Index",
        components: {
            RoleTable : Role,
        },


    }
</script>

<style scoped>

</style>