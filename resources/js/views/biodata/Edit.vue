<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">EDIT POST</div>

                    <div class="card-body">

                        <form @submit.prevent="PostUpdate">

                            <div class="form-group">
                                <label>TITLE</label>
                                <input type="text" class="form-control" v-model="nameVal.first_name"
                                       placeholder="NM">
                                <div v-if="validation.first_name">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.first_name[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>KONTEN</label>
                                <textarea class="form-control" v-model="nameVal.last_name" rows="5"
                                          placeholder="Masukkan Konten"></textarea>
                                <div v-if="validation.last_name">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.last_name[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">UPDATE</button>
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
                nameVal: {},
                validation: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/biodata/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.nameVal = response.data.data;
                // console.log(response.data.data)
            });
        },
        methods: {
            PostUpdate() {
                let uri = "http://localhost:8000/api/biodata/update/"+ this.$route.params.id;
                this.axios.post(uri, this.nameVal)
                    .then((response) => {
                        this.$router.push({name: 'biodata'}); //Mirip dengan redirect
                    }).catch(error => {
                    this.validation = error.response.data.data;
                });
            }
        }
    }
</script>
