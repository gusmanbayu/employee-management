<template>
    <div>
        <div class="row">
            <div class="card mx-auto" style="width: 100%">
                <div class="card-header"><strong>Create Employees</strong></div>
                <div class="card-body">
                    <form @submit.prevent="storeEmployee">
                        <div class="row mb-3">
                            <label
                                for="first_name"
                                class="col-md-4 col-form-label text-md-end"
                                >First Name</label
                            >
                            <div class="col-md-6">
                                <input
                                    v-model="form.first_name"
                                    id="first_name"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="middle_name"
                                class="col-md-4 col-form-label text-md-end"
                                >Middle Name</label
                            >
                            <div class="col-md-6">
                                <input
                                v-model="form.middle_name"
                                    id="middle_name"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="last_name"
                                class="col-md-4 col-form-label text-md-end"
                                >Last Name</label
                            >
                            <div class="col-md-6">
                                <input
                                v-model="form.last_name"
                                    id="last_name"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="address"
                                class="col-md-4 col-form-label text-md-end"
                                >Address</label
                            >
                            <div class="col-md-6">
                                <textarea
                                v-model="form.address"
                                    name="address"
                                    id="address"
                                    rows="4"
                                    class="form-control"
                                >
                                </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="country"
                                class="col-md-4 col-form-label text-md-end"
                            >
                                Country</label
                            >

                            <div class="col-md-6">
                                <select
                                    v-model="form.country_id"
                                    @change="getStates()"
                                    class="form-select form-control"
                                    name="country"
                                    aria-label="Default select example"
                                >
                                    <option
                                        v-for="country in countries"
                                        :key="country.id"
                                        :value="country.id"
                                    >
                                        {{ country.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="state"
                                class="col-md-4 col-form-label text-md-end"
                                >State</label
                            >
                            <div class="col-md-6">
                                <select
                                    v-model="form.state_id"
                                    @change="getCities()"
                                    class="form-select form-control"
                                    name="state"
                                    aria-label="Default select example"
                                >
                                    <option
                                        v-for="state in states"
                                        :key="state.id"
                                        :value="state.id"
                                    >
                                        {{ state.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="city"
                                class="col-md-4 col-form-label text-md-end"
                                >City</label
                            >
                            <div class="col-md-6">
                                <select
                                    v-model="form.city_id"
                                    class="form-select form-control"
                                    name="city"
                                    aria-label="Default select example"
                                >
                                    <option
                                        v-for="city in cities"
                                        :key="city.id"
                                        :value="city.id"
                                    >
                                        {{ city.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="department"
                                class="col-md-4 col-form-label text-md-end"
                                >Department</label
                            >
                            <div class="col-md-6">
                                <select
                                    v-model="form.department_id"
                                    class="form-select form-control"
                                    name="department"
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
                        <div class="row mb-3">
                            <label
                                for="zip_code"
                                class="col-md-4 col-form-label text-md-end"
                                >Zip Code</label>
                            <div class="col-md-6">
                                <input
                                v-model="form.zip_code"
                                    id="zip_code"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="birthdate"
                                class="col-md-4 col-form-label text-md-end"
                                >Birthdate</label
                            >
                            <div class="col-md-6">
                                <datepicker
                                v-model="form.birthdate"
                                    input-class="form-control"
                                ></datepicker>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="date_hired"
                                class="col-md-4 col-form-label text-md-end"
                                >Date Hired</label
                            >
                            <div class="col-md-6">
                                <datepicker
                                v-model="form.date_hired"
                                    input-class="form-control"
                                ></datepicker>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Store
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
    components: {
        Datepicker,
    },
    data() {
        return {
            countries: [],
            states: [],
            departments: [],
            cities: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                country_id: "",
                state_id: "",
                department_id: "",
                city_id: "",
                zip_code: "",
                birthdate: null,
                date_hired: null,
            },
        };
    },
    created() {
        this.getCountries();
        this.getDepartments();
    },
    methods: {
        getCountries() {
            axios
                .get("/api/employees/countries")
                .then((res) => {
                    this.countries = res.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        getStates() {
            axios
                .get("/api/employees/" + this.form.country_id + "/states")
                .then((res) => {
                    this.states = res.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        getCities() {
            axios
                .get("/api/employees/" + this.form.state_id + "/cities")
                .then((res) => {
                    this.cities = res.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then((res) => {
                    this.departments = res.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        storeEmployee(){
            axios
            .post("/api/employees",{
                    first_name: this.form.first_name,
                    middle_name: this.form.middle_name,
                    last_name: this.form.last_name,
                    address: this.form.address,
                    country_id: this.form.country_id,
                    state_id: this.form.state_id,
                    city_id: this.form.city_id,
                    department_id: this.form.department_id,
                    zip_code: this.form.zip_code,
                    birthdate: this.format_date(this.form.birthdate),
                    date_hired: this.format_date(this.form.date_hired)
            }).then((res) => {
                this.$router.push({ name: "EmployeesIndex" });
                })
        },
        format_date(value){
            if(value){
                return moment(String(value)).format("YYYYMMDD")
            }
        }
    },
};
</script>

<style></style>
