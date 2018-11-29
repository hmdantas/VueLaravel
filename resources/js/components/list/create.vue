<template>
    <div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Título</label>
            <div class="col-10">
             <input class="form-control" v-model="livro.titulo" type="text" value="" placeholder="Título" name="titulo">
            </div>
        </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Autor</label>
            <div class="col-10">
             <input class="form-control" v-model="livro.autor" type="text" value="" placeholder="Autor"  name="autor"> 
            </div>
        </div>

          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Resumo</label>
            <div class="col-10">
             <input class="form-control" type="text" v-model="livro.resumo" value="" placeholder="Resumo" name="resumo"> 
            </div>
        </div>
        <br><br>
        <button v-on:click="cria" type="submit" class="btn btn-primary">Adicionar</button>

    </div>
</template>

<script>
    export default {
    	name: 'VueLivrosCreate',
      props: ['rota'],
      data(){
        return {
          livro: {
            titulo: "",
            autor: "",
            resumo: "",
          },
          rota_create: this.rota.toString()
        }
      },
      methods: {
        cria: function(){
          axios.post(this.rota_create, this.livro)
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
