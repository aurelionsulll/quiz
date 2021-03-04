<template>
    <div class="container mt-5">
        <!-- Button trigger modal -->

        <!-- Modal create -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Add new Rep
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rep</label>
                            <input
                                type="email"
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal edit -->
        <div
            class="modal fade"
            id="editQst"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <form @submit.prevent="editQst()">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Edit qst
                            </h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rep</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="qst.qst"
                                    aria-describedby="emailHelp"
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <form @submit.prevent="createQst()">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Qst</label>
                            <input
                                type="text"
                                class="form-control"
                                name="qst"
                                v-model="qst.qst"
                            />
                        </div>
                        <button
                            type="submit"
                            class="btn btn-primary float-right mb-5"
                        >
                            Submit
                        </button>
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
                                <th scope="row">
                                    <i
                                        type="button"
                                        class="far fa-plus-square"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        style="color : blue"
                                    ></i>
                                    <i
                                        @click="editModal(qst)"
                                        class="fas fa-edit"
                                        style="color: #5DC067; cursor: pointer;"
                                    ></i>
                                    <i
                                        class="far fa-trash-alt"
                                        style="color : #E00004"
                                    ></i>
                                </th>
                                <td>{{ qst.qst }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getQst();
    },

    data() {
        return {
            datas: {},

            qst: new Form({
                id: "",
                qst: ""
            })
        };
    },

    methods: {
        editModal(qst) {
            this.qst.reset();
            $("#editQst").modal("show");
            this.qst.fill(qst);
        },

        createQst() {
            this.qst
                .post("/createQst/")
                .then(() => {
                    this.getQst();
                    Vue.swal({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: toast => {
                            toast.addEventListener(
                                "mouseenter",
                                Swal.stopTimer
                            );
                            toast.addEventListener(
                                "mouseleave",
                                Swal.resumeTimer
                            );
                        },
                        icon: "success",
                        title: "Successfully updated"
                    });
                })
                .catch(() => {});

            this.qst.reset();
        },

        editQst() {
            this.qst
                .put("/editQst/" + this.qst.id)
                .then(() => {
                    this.getQst();
                    $("#editQst").modal("hide");
                    Vue.swal({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: toast => {
                            toast.addEventListener(
                                "mouseenter",
                                Swal.stopTimer
                            );
                            toast.addEventListener(
                                "mouseleave",
                                Swal.resumeTimer
                            );
                        },
                        icon: "success",
                        title: "Successfully updated"
                    });
                })
                .catch(() => {});

            this.qst.reset();
        },

        getQst() {
            axios.get("/getQst").then(({ data }) => (this.datas = data));
        }
    }
};
</script>
