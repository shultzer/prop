<template>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Наименование имущества</label>
        <div class="col-md-6">
            <select name="assets[]" class="form-control" multiple >
                <option :value="realestateasset.id" v-for="realestateasset in realestateassets">{{ realestateasset.name }}, {{realestateasset.inventory_number}}</option>
            </select>
        </div>
        <button data-toggle="modal" data-target="#addModal" type="button" class="btn btn-outline-info">Добавить</button>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление имущества</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="Inputname">Наименование имущества</label>
                                <input id="Inputname" v-model="name" class="form-control form-control-sm" type="text" placeholder="Наименование имущества">
                                <small id="nameHelp" class="form-text text-muted">Наименование вводить из выписки из ЕГРНИ</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputnumber">Инвентарный номер по ЕГРНИ</label>
                                <input id="Inputnumber" v-model="number" class="form-control form-control-sm" type="text">
                                <small id="numberHelp" class="form-text text-muted">Цифры и латинские буквы форма 500/D-12345</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputoblast">Область</label>
                                <input id="Inputoblast" v-model="oblast" class="form-control form-control-sm" type="text" >
                                <small id="oblastHelp" class="form-text text-muted">Область</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputraion">Район</label>
                                <input id="Inputraion" v-model="raion" class="form-control form-control-sm" type="text" >
                                <small id="raionHelp" class="form-text text-muted">район</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputaddress">Адрес</label>
                                <input id="Inputaddress" v-model="address" class="form-control form-control-sm" type="text" >
                                <small id="addressHelp" class="form-text text-muted">Город, улица, номер строения из выписки</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Балансодержатель</label>
                                <select class="form-control" v-model="company" id="exampleFormControlSelect1">
                                    <option :value=" comp.id " v-for="comp in all_companies">{{ comp.name }}</option>

                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="button" @click="sendform()" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Propertyselect",


        created() {
            this.getassets(),
            this.getcompanies()
        },
        data() {
            return {
                realestateassets: {},
                all_companies:{},
                name: '',
                number: '',
                company: '',
                raion: '',
                oblast: '',
                address: '',
            }
        },
        methods: {
            getcompanies(){
                axios.get('/companies').then(response => {
                    this.all_companies = response.data;
                }).catch(function (error) {
                    console.log(error.response);
                });
            },
            getassets() {
                axios.get('/assets').then(response => {
                    this.realestateassets = response.data;
                }).catch(function (error) {
                    console.log(error.response);
                });
            },
            sendform(){
                axios.post('/assets', {name: this.name,
                    inventory_number: this.number,
                                        company: this.company,
                                        raion: this.raion,
                                        oblast: this.oblast,
                                        address: this.address})
                .then(response => {
                    this.getassets(),
                        $('#addModal').modal('hide'),
                        console.log(response);
                }).catch(function (error) {
                    console.log(error.response);
                })
            }
        }
    }
</script>

<style scoped>

</style>
