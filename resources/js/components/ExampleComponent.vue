<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <form @submit.prevent="submit">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" id="keyword" v-model="fields.keyword" placeholder="Search by tags"/>
                    </div>

                    <button style="float: right" type="submit" class="btn btn-primary">search</button>
                        <p id="no_result_message" style="display:none">No results for this search</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        fields: {},
        errors: {},
      }
    },
    methods: {
      submit() {
        this.errors = {};
        axios.get('api/blogview?keyword='+this.fields.keyword, this.fields).then(response => {
          this.test = response.data;
          if(this.test.length > 0) {
            $('#no_result_message').hide();
            $('#content-table tbody tr').remove();

            for (var i = 0; i < this.test.length; i++) {

              $('#content-table tbody').append('<tr>' +
                '<td>' + this.test[i].created_at + '</td>' +
                '<td>' + this.test[i].title + '</td>' +
                '<td>' + this.test[i].description + '</td>' +
                '<td>' + this.test[i].tags + '</td>' +
                '<td>' + "<a href='/edit/" + this.test[i]._id + "'>edit</a></td>" +
                '</tr>');
            }
          } else {
            $('#no_result_message').show();
          }


      }).catch(error => {
          if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
      },
    },
  }
</script>
