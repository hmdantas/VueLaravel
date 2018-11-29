<template>
    <div>
    	<input v-model='filter'></input>

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
            <td> <button v-on:click="edita(livro.id)" class="btn btn-primary"> Editar </button> </td>
		  </tr>
		</tbody>
		</table>

    </div>
</template>

<script>
    export default {
    	name: 'VueLivrosList',
    	props: ['livros'],
    	data() {
    		return {
    			filter:"",
    			books: JSON.parse(this.livros),
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
            edita: function(id) {
                window.location.href = '/livro/' + id + '/edit';
            }

        }
    }
</script>
