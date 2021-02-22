<template>
    <div class="container mt-5">
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Rep</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Rep</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <form @submit.prevent="createQst()">
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                >Qst</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                name="qst"
                                v-model="qst.qst"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary float-right mb-5">Submit</button>
                    </form>
                </div>

                <div class="">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Qst</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="qst in datas" :key="qst.id">
                                <th scope="row"><i type="button" class="fas fa-anchor" data-toggle="modal" data-target="#exampleModal"></i></th>
                                <td>{{qst.qst}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


// const Toast = Vue.Swal.mixin({
//   toast: true,
//   position: 'top-end',
//   showConfirmButton: false,
//   timer: 3000,
//   timerProgressBar: true,
//   didOpen: (toast) => {
//     toast.addEventListener('mouseenter', Swal.stopTimer)
//     toast.addEventListener('mouseleave', Swal.resumeTimer)
//   }
// })

// const Toast = Swal.mixin({
//   toast: true,
//   position: 'top-end',
//   showConfirmButton: false,
//   timer: 3000,
//   timerProgressBar: true,
//   didOpen: (toast) => {
//     toast.addEventListener('mouseenter', Swal.stopTimer)
//     toast.addEventListener('mouseleave', Swal.resumeTimer)
//   }
// });

export default {
    mounted() {
        this.getQst();
    },

    data() {
        
        return {
            datas : {},

            qst: new Form ({
                id: "",
                qst: ""
            })
        }
    },

    methods: {
        createQst() {
                this.qst
                    .post("/createQst/" + this.qst.id)
                    .then(() => {
                        this.getQst()
                    Vue.swal({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        },
                        icon: "success",
                        title: "Successfully updated"
                        });

                    })
                    .catch(() => {
                    });

                    this.qst.reset()
            },

        getQst() {
            axios.get("/getQst").then(({ data }) => (this.datas = data));
        }
    },
};
</script>
