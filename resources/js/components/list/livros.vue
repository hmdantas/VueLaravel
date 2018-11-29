<template>
    <div>
    	<input v-model='filter'></input>
        <br><br>
		<table class="table">
		<thead>
		  <tr>
		    <th>Titulo</th>
		    <th>Autor</th>
		    <th>Resumo</th>
            <th> Ação </th>
		  </tr>
		</thead>
		<tbody>
		  <tr v-for="livro in filterBooks">
		    <td>{{livro.titulo}}</td>
		    <td>{{livro.autor}}</td>
		    <td>{{livro.resumo}}</td>
            <td> 
                <button v-on:click="editar(livro.id)" class="btn btn-primary"> Editar </button> 
                <br><br>
                <button v-on:click="deletar(livro.id)" class="btn btn-primary"> Deletar </button>
            </td>
		  </tr>
		</tbody>
		</table>
        <br><br>
        <button v-on:click="criar" class="btn btn-primary"> Inserir um livro </button>
    </div>
</template>

<script>
    export default {
    	name: 'VueLivrosList',
    	props: ['livros','destroy','edit','create'],
    	data() {
    		return {
    			filter:"",
    			books: JSON.parse(this.livros),
                rota_destroy: this.destroy.toString(),
                rota_edit: this.edit.toString(),
                rota_create: this.create.toString(),
    		}
    	},
    	computed: {
    		filterBooks: function() {
    			var self = this
    			return _.orderBy(self.books.filter(function(livro){
    				var searchRegex = new RegExp(self.filter,'i');

    				return( searchRegex.test(livro.titulo)	)
    			}))
    		}
    	},
        methods: {
            editar: function(id) {
                var self = this;
                var rota = this.rota_edit.replace('%id',id);
                window.location.href = rota;
            },
            deletar: function(id) {
                var self = this;
                var rota = this.rota_destroy.replace('%id',id);

                axios.delete(rota).then(response => {
                    window.location.href = response.data;
                });                
            },
            criar: function() {
                window.location.href = this.rota_create;
            }
        }
    }
</script>
