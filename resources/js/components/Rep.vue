<template>
    <div class="container mt-5">
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <form>
                <div class="modal-dialog modal-xl">
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
                            <div>
                                <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Test</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in dataQstByUserId" :key="data.id">
                                <td>QST : <span style="color:red">{{ data.qst.qst }}</span> ANS : <span style="color:green">{{ data.answer.ans }}</span></td>
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

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Qst</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in datasUser" :key="user.id">
                                <th scope="row">
                                    <i
                                        class="far fa-plus-square"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        style="color : blue"
                                    ></i>
                                </th>
                                <!-- <td><a :href="'/getQstByUserId/' + user.id">{{ user.name }}</a></td> -->
                                <td @click="addAnswerModal(user.id)">
                                    {{ user.name }}
                                </td>
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
        this.getUser();
    },

    data() {
        return {
            datasUser: {},
            dataQstByUserId: {}
        };
    },

    methods: {
        getUser() {
            axios.get("/getUser").then(({ data }) => (this.datasUser = data));
        },

        getAnswer(id) {
            axios
                .get("/getAnswer/" + id)
                .then(({ data }) => (this.datasAnswers = data));
        },

        addAnswerModal(id) {
            $("#exampleModal").modal("show");
            this.getQstByUserId(id);
        },
        getQstByUserId(id) {
            axios
                .get("/getQstByUserId/" + id)
                .then(({ data }) => (this.dataQstByUserId = data));
        }
    }
};
</script>
