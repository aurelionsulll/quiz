<template>
    <div class="container mt-5">
        <!-- Button trigger modal -->

        <!-- Modal Answer -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <form @submit.prevent="createAnswer()">
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
                                <label for="exampleInputEmail1">Rep </label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input
                                            v-model="ans.ans"
                                            type="text"
                                            class="form-control"
                                            aria-describedby="emailHelp"
                                        />
                                    </div>
                                    <div class="col-md-4" v-show="editAnswerBtn">
                                        <button class="btn btn-success" @click="editAnswer(tempAnswerId)">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Answers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="answer in datasAnswers"
                                            :key="answer.id"
                                        >
                                            <td scope="row">
                                                <i
                                                    @click="
                                                        activateEditAnswer(answer,answer.id)
                                                    "
                                                    class="fas fa-edit"
                                                    style="color: #5DC067; cursor: pointer;"
                                                ></i>
                                                <i
                                                    @click="
                                                        delteAnswer(answer.id)
                                                    "
                                                    class="far fa-trash-alt"
                                                    style="color : #E00004"
                                                ></i>
                                            </td>
                                            <td>
                                                <span
                                                    @click="
                                                        activateEditAnswer(
                                                            answer
                                                        )
                                                    "
                                                    >{{ answer.ans }}</span
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                            <div class="form-group form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="exampleCheck1"
                                    v-model="qst.multi"
                                />
                                <label
                                    class="form-check-label"
                                    for="exampleCheck1"
                                    >multiple answers</label
                                >
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
            <div class="col-md-12">
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
                                        @click="addAnswerModal(qst, qst.id)"
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
                                        @click="delteQst(qst.id)"
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
            datasAnswers: {},
            tempId: "",
            editAnswerBtn: false,
            tempAnswerId: "",

            qst: new Form({
                id: "",
                qst: "",
                multi: ""
            }),
            ans: new Form({
                id: "",
                qst_id: "",
                ans: ""
            })
        };
    },

    methods: {
        editModal(qst) {
            this.qst.reset();
            $("#editQst").modal("show");
            this.qst.fill(qst);
        },
        addAnswerModal(qst, id) {
            $("#exampleModal").modal("show");
            this.ans.qst_id = id;
            this.tempId = id;
            this.getAnswer(id);
        },

        getQst() {
            axios.get("/getQst").then(({ data }) => (this.datas = data));
        },

        getAnswer(id) {
            axios
                .get("/getAnswer/" + id)
                .then(({ data }) => (this.datasAnswers = data));
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

        delteQst(id) {
            Vue.swal({
                title: "Êtes-vous sûr?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui",
                cancelButtonText: "Annuler"
            }).then(result => {
                if (result.value) {
                    this.qst.delete("/deleteQst/" + id);
                    this.getQst();
                }
            });
        },

        createAnswer() {
            this.ans
                .post("/createAnswer/")
                .then(() => {
                    this.getAnswer(this.tempId);
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

            this.ans.ans = "";
        },

        activateEditAnswer(answer,answerId) {
            this.editAnswerBtn = true;
            this.ans.fill(answer);
            this.tempAnswerId = answerId
        },

        editAnswer(id) {
            this.ans
                .put("/editAnswer/" + id)
                .then(() => {
                    this.getAnswer(this.tempId);
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
            this.ans.ans = "";
            this.editAnswerBtn = false;
        },

        delteAnswer(id) {
            Vue.swal({
                title: "Êtes-vous sûr?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui",
                cancelButtonText: "Annuler"
            }).then(result => {
                if (result.value) {
                    this.ans.delete("/deleteAnswer/" + id);
                    this.getAnswer(this.tempId);
                }
            });
        }
    }
};
</script>

<style scoped>
.switch-field {
    display: flex;
    margin-bottom: 36px;
    overflow: hidden;
}

.switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch-field label {
    background-color: #e4e4e4;
    color: rgba(0, 0, 0, 0.6);
    font-size: 14px;
    line-height: 1;
    text-align: center;
    padding: 8px 16px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3),
        0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.1s ease-in-out;
}

.switch-field label:hover {
    cursor: pointer;
}

.switch-field input:checked + label {
    background-color: #a5dc86;
    box-shadow: none;
}

.switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
}

/* This is just for CodePen. */

.form {
    max-width: 600px;
    font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
    font-weight: normal;
    line-height: 1.625;
    margin: 8px auto;
    padding: 16px;
}

h2 {
    font-size: 18px;
    margin-bottom: 8px;
}
</style>
