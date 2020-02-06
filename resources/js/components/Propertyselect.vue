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
                        <form id="myform">
                            <div class="form-group">

                                <label for="Inputname">Наименование имущества</label>
                                <label class="alert-danger" v-if="this.errors.name">{{this.errors.name[0] }}</label>
                                <input required id="Inputname" v-model="name" class="form-control form-control-sm" type="text" placeholder="Наименование имущества">
                                <small id="nameHelp" class="form-text text-muted">Наименование вводить из выписки из ЕГРНИ</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputnumber">Инвентарный номер по ЕГРНИ</label>
                                <label class="alert-danger" v-if="this.errors.number">{{this.errors.number[0] }}</label>
                                <input required id="Inputnumber" v-model="number" class="form-control form-control-sm" type="text">
                                <small id="numberHelp" class="form-text text-muted">Цифры и латинские буквы форма 500/D-12345</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputoblast">Область</label>
                                <label class="alert-danger" v-if="this.errors.oblast">{{this.errors.oblast[0] }}</label>
                                <input required id="Inputoblast" v-model="oblast" class="form-control form-control-sm" type="text" >
                                <small id="oblastHelp" class="form-text text-muted">Область</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputraion">Район</label>
                                <label class="alert-danger" v-if="this.errors.raion">{{this.errors.raion[0] }}</label>

                                <input required id="Inputraion" v-model="raion" class="form-control form-control-sm" type="text" >
                                <small id="raionHelp" class="form-text text-muted">район</small>
                            </div>
                            <div class="form-group">
                                <label for="Inputaddress">Адрес</label>
                                <label class="alert-danger" v-if="this.errors.address">{{this.errors.address[0] }}</label>

                                <input required id="Inputaddress" v-model="address" class="form-control form-control-sm" type="text" >
                                <small id="addressHelp" class="form-text text-muted">Город, улица, номер строения из выписки</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Балансодержатель</label>
                                <label class="alert-danger" v-if="this.errors.company">{{this.errors.company[0] }}</label>

                                <select required class="form-control" v-model="company" id="exampleFormControlSelect1">
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
                errors:{}
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
                    //console.log(response.data)
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
                    this.getassets();
                        $('#addModal').modal('hide');
                    document.getElementById("myform").reset();
                        console.log(response.data.errors);
                }).catch(error=>{
                    this.errors = error.response.data.errors;
                    console.log(error.response.data.errors);
                })
            }
        }
    }
</script>

<style scoped>

</style>
