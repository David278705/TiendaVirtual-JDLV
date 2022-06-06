<template>
    <div>
        <br>
        <div class="section-form">
            <h1>Categoria</h1>
            <form @submit.prevent="save">
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" v-model="category.name">
                </div>
                <button class="btn btn-success">Subir</button>
            </form>


        </div>
    </div>
</template>

<script>
export default {
    props: ['category', 'categories'],
    name: "Form",
    methods: {
        async save() {
            let url = `/Category/store`
            if (!this.category.create) {
                url = `/Category/update/${this.category.id}`
            }
            await axios.post(url, this.category).then(res => {
                if (res.data.saved) {
                    this.category = {
                        name: null,
                    }
                    location.reload();

                }

                else if (res.data.updated) {
                    window.location = "/dashboard/category";
                }

            })

        }
    },

}
</script>

<style scoped>
</style>