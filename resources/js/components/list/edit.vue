<template>
    <div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Título</label>
            <div class="col-10">
                <input class="form-control" type="text" value="" v-model="livro.titulo" name="titulo"> 
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Autor</label>
            <div class="col-10">
                <input class="form-control" type="text" value="" placeholder="Autor" v-model="livro.autor" name="autor"> 
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Resumo</label>
            <div class="col-10">
                <input class="form-control" type="text" value="" placeholder="Resumo" v-model="livro.resumo" name="resumo"> 
            </div>
        </div>
        <br><br>
        <button v-on:click="edita" type="submit" class="btn btn-primary">Salvar</button>

    </div>
</template>

<script>
export default {
 name: 'VueLivrosEdit',
 props: ['book','rota'],
 data() {
    return {
      livro: JSON.parse(this.book),
      rota_edit: this.rota.toString()
  }
},
methods: {
    edita: function(){
        var rota_id = this.rota_edit.replace('%id',this.livro.id);
        axios.put(rota_id, this.livro)
      .then(
        function(response){
          window.location.href = response.data;
      })
      .catch(function (error) {
        console.log(error);
    });

  }
}

}

</script>