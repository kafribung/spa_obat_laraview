<template>
  <div class="container">
    <div class="row">
      <div class="col-sm text-center">
        <h2>Edit API</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <form @submit.prevent="editData">
          <div class="form-group">
            <label for="obat">Obat</label>
            <input type="text" class="form-control" id="obat" v-model="datas.obat" />
            <p class="alert alert-danger" v-if="validation.obat">{{validation.obat}}</p>
          </div>

          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" v-model="datas.stok" />
            <p class="alert alert-danger" v-if="validation.stok">{{validation.stok}}</p>
          </div>

          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" v-model="datas.harga" />
            <p class="alert alert-danger" v-if="validation.harga">{{validation.harga}}</p>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      datas: {
        obat: "",
        stok: "",
        harga: ""
      },

      validation: []
    };
  },

  methods: {
    editData() {
      this.axios
        .put(
          "http://127.0.0.1:8000/api/update/" + this.$route.params.id,
          this.datas
        )
        .then(response => this.$router.push("/page"))
        .catch(error => console.log(error));
    }
  },

  mounted() {
    this.axios
      .get("http://127.0.0.1:8000/api/edit/" + this.$route.params.id)
      .then(response => (this.datas = response.data.data))
      .catch(error => (this.validation = error.response.data.data));
  }
};
</script>
