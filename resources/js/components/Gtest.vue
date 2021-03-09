<template>
    <div class="container mt-5">
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <form @submit.prevent="sendAnswer()">
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
                            <p v-if="!datasAnswers">already submited</p>
                            <div v-if="!multi">
                                <span v-for="answer in datasAnswers" :key="answer.id" >
                                    <span @click="getAnswerId(answer.id)">
                                        <input type="radio" :id="answer.id" :value="answer.ans" name="ans">
                                        <label :for="answer.id">{{ answer.ans }}</label><br>
                                    </span>
                                </span>
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
        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Qst</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="qst in datas" :key="qst.id">
                                <td>{{ qst.qst }}</td>
                                <th scope="row">
                                    <i
                                        @click="addAnswerModal(qst, qst.id,qst.multi)"
                                        class="far fa-plus-square"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        style="color : blue"
                                    ></i>
                                </th>
                            </tr>
                        </tbody>
                    </table>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getQst();
        this.getTest();
    },

    data() {
        return {
            multi: false,
            datas: {},
            datasAnswers: {},
            datasTest: {},
            qstID: "",
            inputDisbled: false,
            qst: new Form({
                id: "",
                qst: "",
                multi: ""
            }),
            ans: new Form({
                id: "",
                qst_id: "",
                ans: ""
            }),
            test: new Form({
                id: "",
                user_id: "",
                qst_id: "",
                answer_id: "",
            })
        };
    },

    methods: {
        getQst() {
            axios.get("/getQst").then(({ data }) => (this.datas = data));
        },

        getAnswer(id) {
            axios
                .get("/getAnswerTest/" + id)
                .then(({ data }) => (this.datasAnswers = data));
        },
        getTest() {
            axios
                .get("/getTest/")
                .then(({ data }) => (this.datasTest = data));
        },
        getAnswerId (id) {
            this.test.answer_id = id
        },
        addAnswerModal(qst, id,multi) {
            $("#exampleModal").modal("show");
            this.qstID = id;
            this.ans.qst_id = id;
            this.getAnswer(id);
            if(multi){
                this.multi = true;
            }
            else{
                this.multi = false
            }
        },
        sendAnswer() {
            this.test.ans_id = this.ans.ans;
            this.test
                .post("/sendAnswer/" + this.qstID)
                .then(() => {
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
        },
        ifDone() {
            
  
        }
    }
};
</script>
