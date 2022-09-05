<template>
    <div>
        <div class="container mt-5">
            <div class="add-employee bg-dark text-white p-5">
                <form action="#">
                    <div class="header">
                        <h3>{{ companyName }}</h3>
                    </div>
                    <div class="body mt-3">
                        <div class="input-group w-50">
                            <span class="input-group-text">First Name</span>
                            <input class="form-control" aria-label="With textarea" v-model="firstName">
                        </div>
                        <small class="text-danger firstName"></small>
    
                        <div class="input-group w-50 mt-3">
                            <span class="input-group-text">Last Name</span>
                            <input class="form-control" aria-label="With textarea" v-model="lastName">
                        </div>
                        <small class="text-danger lastName"></small>
    
                        <div class="input-group w-50 mt-3">
                            <span class="input-group-text">E-Mail</span>
                            <input class="form-control" aria-label="With textarea" v-model="email">
                        </div>
                        <small class="text-danger email"></small>
                    </div>
                    <div class="footer mt-3">
                        <button type="submit" class="btn btn-danger w-50" @click.prevent="send">Add new Employee</button>
                        <router-link to="/" class="btn btn-warning w-50 d-block mt-2 text-white">Return</router-link>
                        <p class="message text-white"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </template>
    
    <script>
    import axios from 'axios';
    import $ from 'jquery'
    export default {
        name: "employee.employeeCreate",
        data() {
            return {
                companyId:"",
                companyName: "",
                firstName: "",
                lastName: "",
                email: "",
            };
        },
        methods: {
            //Send a Request to add a new Employee
            send() {
                $.ajax({
                    method: "get",
                    url: "http://127.0.0.1:8000/employee/create",
                    data: {
                        firstName: this.firstName,
                        lastName: this.lastName,
                        email: this.email,
                        companyId:this.companyId
                    },
                    success: function (res) {
                        $(".firstName, .lastName, .email, .message").text('');
                        //Validation Errors
                        if (typeof res === 'object') {
                            console.log(res);
                                if(res.firstName)
                                {
                                $(".firstName").text(res.firstName[0]);
                                }
                                if(res.lastName)
                                {
                                $(".lastName").text(res.lastName[0]);
                                }
                                if(res.email)
                                {
                                $(".email").text(res.email[0]);
                                }
                        } 
                        //Successfuly a new Employee created
                        else {
                            this.successMessage = res;
                            $(".message").text(res);
                        }
    
                    },
                    //Responce Errors
                    error: function (err) {
                        console.log(err);
                    }
    
                })
    
            }
        },
        created() {
            //Send Request to get the Attributs of a Company
            axios.get(`http://127.0.0.1:8000/company/show/${this.$route.params.id}`, {})
                .then(res => {
                    console.log(res.data);
                    this.companyId=res.data.id;
                    this.companyName = res.data.companyName;
                })
                .catch(err => {
                    console.log(err.message);
                })
        }
    
    }
    </script>
    
    <style scoped>
    h3 {
        width: 30%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 7px;
        font-size: 50px;
        border-bottom: 3px solid white;
    }
    </style>