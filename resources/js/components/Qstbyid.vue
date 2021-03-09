<template>
    <div class="container mt-5">

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
                                <td><a :href="'/getQstByUserId/' + user.id">{{ user.name }}</a></td>
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
        };
    },

    methods: {
        getUser() {
            axios.get("/getQstByUserId/4").then(({ data }) => (this.datasUser = data));
        },

        getAnswer(id) {
            axios
                .get("/getAnswer/" + id)
                .then(({ data }) => (this.datasAnswers = data));
        },

    }
};
</script>
