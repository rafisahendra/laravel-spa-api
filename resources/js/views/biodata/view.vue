<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Tambah Biodata</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'addBiodata' }" class="btn btn-md btn-success">Tambah data</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="xx in biodata" :key="xx.id">
                                    <td>{{ xx.first_name }}</td>
                                    <td>{{ xx.last_name }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'edit', params: { id: xx.id }}" class="btn btn-sm btn-primary">EDIT</router-link>
                                        <button @click.prevent="deleteData(xx.id)" class="btn btn-sm btn-danger">HAPUS</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

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
      // variable array yang akan menampung hasil fetch dari api
      biodata: []
    };
  },
  created() { //created menjalankan fungsi otomatis
    this.loadData();
  },
  methods: {
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/biodata/").then(response => {
        // mengirim data hasil fetch ke varibale array biodata
        this.biodata = response.data.data;

      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://localhost:8000/api/biodata/" + id).then(response => {
        this.loadData();
      }).catch(error => {
                    alert('system error!');
                });
    }
  }
};
</script>


