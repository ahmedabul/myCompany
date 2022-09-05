<template>
<div class="home container mt-5">
    <div class="row">
        <div v-for="company in companies" :key="company" class="card col-md-3">
            <div class="card-body">
                <h5 class="card-title text-center">{{ company.companyName }}</h5>
                <router-link class="btn btn-primary w-100" :to="`employee/employeeCreate/${company.id}`">Add Employee</router-link>
                <router-link class="btn btn-danger mt-2 w-100" :to="`/employee/employeeShow/${company.id}`"> Show Employees </router-link>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from "axios"
export default {
    name: 'HomeView',
    data: function () {
        return {
            companies: null,
        }
    },
    methods: {
        getCompanies() {
            axios.get('http://127.0.0.1:8000/company/all')
                .then(res => {
                    this.companies = res.data;
                    console.log(this.companies)
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created: function () {
        this.getCompanies();
    }

}
</script>
