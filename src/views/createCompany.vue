<template>
<div>
    <div class="container">
        <div class="card text-center">
            <h4 class="card-header text-white bg-dark p-5">Create a new Company</h4>
            <div class="card-body p-5">
                <h5 class="card-title">The Name of Company:</h5>
                <input name="companyName" placeholder="Companyname..." v-model="companyName">
            </div>
            <button class="btn btn-danger w-50 mx-auto mb-5" @click="save">Save</button>
            <div class="text-center message-error text-danger mb-5"></div>
            <div class="text-center message-success text-success mb-5"></div>
        </div>
    </div>
</div>
</template>

<script>
//import axios from 'axios'
import $ from 'jquery'

export default {
    name: 'createCompany',
    data() {
        return {
            companyName: "",
            ms: ""
        }
    },
    methods: {
        save() {
            $.ajax({
                type: "get",
                url: "http://127.0.0.1:8000/company/create",
                data: {
                    companyName: this.companyName,
                },
                success: function (data) {
                  $(".message-success").text("");
                  $(".message-error").text("");
                    if (data) {
                        $(".message-success").text("successfully created");
                    } else {
                        $(".message-error").text("This Name is unavailable, try please to change The Name of Company..")
                    }

                },
                error: function (err) {
                    console.log(err);
                }
            });

        }
    }

}
</script>

<style>
.container {
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}

.card {
    margin-top: 50px;
}

h4 {
    letter-spacing: 5px;
}

input {
    border: none;
    border-bottom: 3px solid gray;
}
</style>
