<template>
<div>
    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="employee in employees" :key="employee">
                <td>{{ employee.firstName  }}</td>
                <td>{{ employee.lastName }}</td>
                <td>{{ employee.email }}</td>
                <td><router-link :to="`/employee/employeeRead/${employee.id}`">Update</router-link></td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
//import $ from "jquery"
import axios from 'axios'
//import $ from 'jquery'

export default {
    name: "employee.employeeShow",
    data: function () {
        return {
            employees:null,
        }
    },
    methods: {
        //Get Attributes of Employee
        getEmployees() {
            axios.get("http://127.0.0.1:8000/employee/show",{
                params:{
                companyId:this.$route.params.companyId
                }
                }).then(res=>{
                    this.employees=res.data;
                }).catch(err=>{
                    console.log(err);
                });
        },
    },
        created: function () {
            this.getEmployees();
        }
    }
</script>
