<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Tambah Data</div>

                    <div class="card-body">

                        <form @submit.prevent="postAddBiodata">
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" class="form-control" v-model="nameVal.firstName"
                                       placeholder="Masukan Nama Depan">
                                <div v-if="validation.first_name">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.first_name[0] }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <textarea class="form-control" v-model="nameVal.lastName" rows="5"
                                          placeholder="Masukan Nama Belakang"></textarea>
                                <div v-if="validation.last_name">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.last_name[0] }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-danger">RESET</button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                // post: {},
                nameVal:{
                    firstName: '',
                    lastName: ''
                },
                validation: []
            }
        },
        methods: {
            postAddBiodata() {
                let uri = 'http://localhost:8000/api/biodata/store';
                // this.axios.post(uri, this.biodata)
                this.axios.post(uri, {
                    first_name: this.nameVal.firstName,
                    last_name: this.nameVal.lastName
                    })
                    .then((response) => {
                        this.$router.push({
                            name: 'biodata'
                        });
                    }).catch(error => {
                    this.validation = error.response.data.data;
                });
            }
        }
    }
</script>
