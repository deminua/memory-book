<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

              <button class="btn" type="button" v-on:click="getTerms(true)"><i class="fa fa-arrow-circle-down"></i> Активные термины</button>
              <button class="btn" type="button" v-on:click="getTerms(false)"><i class="fa fa-arrow-circle-down"></i> Выключенные термины</button>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="id">#</th>
                  <th>Название</th>
                  <th class="status"><i class="fa fa-eye"></i></th>
                  <th class="del"></th>
                </tr>
              </thead>
              <tbody>
              <tr v-for="(term, index) in terms">
                <td class="id">{{ term.id }}</td>
                <td class="name"><input class="form-control" v-model="term.name" v-on:change="updateTerm(term)" placeholder="Название термина..."></td>
                <td class="status"><input type="checkbox" v-model="term.status" v-on:change="updateTerm(term)"></td>
                <td class="del">
                    <a v-if="term.nodes_count >= 1" :href="/term/+term.id" target="_blank" class="btn btn-success">Открыть {{ term.nodes_count }}</a>
                    <input v-else class="btn btn-danger" type="button" v-on:click="remove(term, index)" value="Удалить">
                    
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
        terms: [],
      };
    },

        methods: {
            getTerms: function (status) {
                axios.get('/json/term?status='+status)
                .then((response) => {
                  this.terms = response.data;
                }).catch((error) => console.log(error.response.data));
            },
            postTerms: function (data) {
                axios.post('/json/term', data)
                .then((response) => {
                  // console.log(response.data);
                }).catch((error) => console.log(error.response.data));
            },
            deleteTerms: function (data) {
                axios.delete('/json/term?id='+data.id)
                .then((response) => {
                  // console.log(response.data);
                }).catch((error) => console.log(error.response.data));
            },
             updateTerm: function(e) {
                this.postTerms(e);
            },
            remove: function(term, index) {
                if(confirm('Вы уверены?')) {
                    this.deleteTerms(term);
                    this.terms.splice(index, 1);
                }
            },
        },
        mounted() {
            this.getTerms(false);
        }
    }
</script>


<style type="text/css">
    .id {
        width: 32px;
    }
    .status {
        width: 32px;
    }
    .del {
        width: 80px;
    }

    .name input {
        background-color: transparent;
    }

    .del input[type="button"], .del a {
        font-size: 12px;
         text-transform: capitalize; 
        padding: 5px 2px;
        display: inline-block;
         line-height: 1; 
        border: none;
        min-width: 80px;
        color: #fff;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        margin: 0px 0;
        text-align: center;
         border-radius: 0px; 
    }
</style>