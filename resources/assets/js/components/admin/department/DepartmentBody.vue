<template>
    <tr>
        <td><span>{{department.id}}</span></td>
        <td><span>{{department.department_name}}</span></td>
        <td class="text-left"><span>{{department.department_info}}</span></td>

        <td><span>{{department.department_abbr}}</span></td>
        <td><span class="btn btn-success" @click="edit"> Edit Department</span></td>
        <td>
            <span><button type="button" @click="deleteRequest" class="btn btn-danger"
            >Delete Department</button></span>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['department', 'index'],
        name: "DepartmentBody",
        data() {
            return {
                selectedDepartment: this.department,
            }
        },
        watch: {
            department(value) {
                this.selectedDepartment = value;
            }
        },
        methods: {
            deleteRequest() {
                this.$emit('deleteRequest', this.selectedDepartment);
                this.$emit('index', this.index);
            },
            edit() {
                this.$emit('update', this.selectedDepartment);
                this.$emit('index', this.index);

            }
        }
    }
</script>

<style scoped>

</style>