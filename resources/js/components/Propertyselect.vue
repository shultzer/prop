<template>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Наименование имущества</label>
        <div class="col-md-6">
            <select class="form-control" multiple >
                <option v-for="realestateasset in realestateassets">
                    {{ realestateasset.name, realestateasset.inventory_number }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Propertyselect",
        props:['realestateassets',

        ]
    }
</script>

<style scoped>

</style>
