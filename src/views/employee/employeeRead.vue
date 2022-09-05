<template>
<div>
    <div class="container">
        <div class="employee-update p-5 mt-5 bg-dark text-white">
            <div class="header">
                <h2 class="w-50">Employee Update</h2>
            </div>
            <div class="body">
                <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon1">First Name</span>
                    <input v-model="firstName" placeholder="First Name..." type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <small class="text-danger firstName"></small>
                <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon1">Last Name</span>
                    <input v-model="lastName" placeholder="Last Name" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <small class="text-danger lastName"></small>
                <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon1">E-Mail</span>
                    <input v-model="email" placeholder="E-Mail" type="email" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <small class="text-danger email"></small>

            </div>
            <div class="footer">
                <button class="btn btn-danger w-100" @click="update()">Update</button>
                <router-link to="/" class="btn btn-warning w-100 text-white mt-2">Return</router-link>
            </div>
            <p class="text-white message"></p>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';
import $ from "jquery";
export default {
    name: "employee.employeeRead",
    data: function () {
        return {
            employee: " ",
            firstName: " ",
            lastName: " ",
            email: " ",

        }
    },
    methods: {
        getEmployee: function () {
            axios.get("http://127.0.0.1:8000/employee/read", {
                params: {
                    employeeId: this.$route.params.employeeId,
                }
            }).then(res => {
                console.log(res.data);
                console.log(res.data.lastName)
                this.lastName = res.data.lastName;
                this.firstName = res.data.firstName;
                this.email = res.data.email;
            }).catch(err => {
                console.log(err);
            })
        },
        update: function () {
            axios.get('http://127.0.0.1:8000/employee/update', {
                params: {
                    employeeId: this.$route.params.employeeId,
                    firstName: this.firstName,
                    lastName: this.lastName,
                    email: this.email
                }
            }).then(res => {
                console.log(res.data);
                $(".firstName, .lastName, .email, .message").text('');
                //Validation Errors
                if (typeof res.data=== 'object') {
                    if (res.data.firstName) {
                        $(".firstName").text(res.data.firstName[0]);
                    }
                    if (res.data.lastName) {
                        $(".lastName").text(res.data.lastName[0]);
                    }
                    if (res.data.email) {
                        $(".email").text(res.data.email[0]);
                    }
                }else{
                    $(".message").text(res.data);
                }
            }).catch(err => {
                console.log(err);
            })
        }
    },
    created: function () {
        this.getEmployee();
    }
}
</script>

<style scoped>
h2 {
    border-bottom: 3px solid white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    letter-spacing: 7px;
    font-size: 40px;
}
</style>
