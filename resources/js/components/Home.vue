<template>
  <div class="container">
    <div class="row">
      <div class="col-sm text-center">
        <h2>Crud API</h2>
        <router-link to="/create">
          <a href class="btn btn-primary btn-sm float-right">
            <i class="fa fa-plus"></i>
          </a>
        </router-link>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <table class="table table-hover">
          <thead class="table-info">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Obat</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(obat, index) in obats" :key="index">
              <th scope="row">{{index+1}}</th>
              <td>{{obat.obat}}</td>
              <td>{{obat.stok}}</td>
              <td>{{obat.harga}}</td>
              <td>
                <router-link :to="'/edit/' + obat.id" class="btn btn-warning btn-sm">
                  <i class="fa fa-edit"></i>
                </router-link>

                <a href class="btn btn-danger btn-sm" @click="deleteData(obat.id)">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      obats: []
    };
  },

  methods: {
    deleteData(id) {
      this.axios.delete("http://127.0.0.1:8000/api/delete/" + id);
    }
  },

  mounted() {
    this.axios
      .get("http://127.0.0.1:8000/api/page")
      .then(response => (this.obats = response.data.data))
      .catch(error => console.log(error));
  }
};
</script>
