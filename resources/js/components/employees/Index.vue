<template>
<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="row">
        <div class="card mx-auto">
            <div v-if="showMessage">
                <div class="alert alert-success">
                    {{message}}
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form>
                            <div class="form-row align-items-center float-left">
                                <div class="col">
                                    <input
                                    v-model.lazy="search"
                                    type="text"
                                    name="search"
                                    class="form-control mb-2"
                                    id="inlineFormInput">
                                </div>
                                <div class="col">
                                <select
                                    v-model="selectedDepartment"
                                    class="form-select form-control"
                                    name="city"
                                    aria-label="Default select example"
                                >
                                    <option
                                        v-for="department in departments"
                                        :key="department.id"
                                        :value="department.id"
                                    >
                                        {{ department.name }}
                                    </option>
                                </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary mb-2">Create</router-link>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Department</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr v-for="employee in employees" :key="employee.id">
                                <th scope="row">#{{employee.id}}</th>
                                <td>{{ employee.first_name}}</td>
                                <td>{{ employee.last_name}}</td>
                                <td>{{ employee.address}}</td>
                                <td>{{ employee.department.name}}</td>
                                <td>
                                    <router-link :to="{name: 'EmployeesEdit', params: {id: employee.id}}" class="btn btn-success"><i class="fa fa-edit fa-fw"></i></router-link>
                                    <button class="btn btn-danger" @click="deleteEmployee(employee.id)"><i class="fa fa-trash fa-fw"></i></button>
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
    data() {
        return {
            employees:[],
            showMessage: false,
            message: '',
            search: null,
            selectedDepartment: null,
            departments: []
        };
    },
    watch:{
        search(){
            this.getEmployees();
        },
        selectedDepartment(){
            this.getEmployees();
        }
    },
    created(){
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees() {
            axios.get("/api/employees",{params:{
                search: this.search,
                department_id: this.selectedDepartment
            }}).then(res => {
                this.employees = res.data.data;
            }).catch(error=>{
                console.log(error);
            });
        },
        getDepartments(){
            axios
                .get("/api/employees/departments")
                .then((res) => {
                    this.departments = res.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        deleteEmployee(id){
            axios.delete("api/employees/"+ id).then(res=>{
                this.showMessage = true;
                this.message = res.data;
                this.getEmployees();
            });
        }
    }
}
</script>

<style>

</style>
