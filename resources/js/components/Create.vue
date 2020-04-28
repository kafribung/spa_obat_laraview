<template>
  <div class="container">
    <div class="row">
      <div class="col-sm text-center">
        <h2>Crud API</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <form @submit.prevent="addData">
          <div class="form-group">
            <label for="obat">Obat</label>
            <input type="text" v-model="datas.obat" class="form-control" id="obat" />
            <p class="alert alert-danger" v-if="validation.obat">{{validation.obat}}</p>
          </div>

          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" v-model="datas.stok" class="form-control" id="stok" />
            <p class="alert alert-danger" v-if="validation.stok">{{validation.stok}}</p>
          </div>

          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" v-model="datas.harga" class="form-control" id="harga" />
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
    addData() {
      this.axios
        .post("http://127.0.0.1:8000/api/create", this.datas)
        .then(response => this.$router.push("/page"))
        .catch(error => (this.validation = error.response.data.data));
    }
  }
};
</script>
