
<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Usuarios</h4>
                    <h6 class="card-subtitle">Usuarios registrados en el sistema</h6>
                    <button type="button" class="btn btn-info btn-rounded pull-right" data-toggle="modal"
                            data-target="#add-contact">Agregar nuevo usuario
                    </button>

                    <div class="table-responsive m-t-40">
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list"
                                   data-page-size="10">
                                <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Nombres</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>
                                        <a href=""><img
                                            src="" alt="user"
                                            class="img-circle"/> {{ user.names }} {{ user.last_name }}
                                        </a>
                                    </td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.phone_1 }}</td>
                                    <td>
                                        <div class="switch">
                                            <label>Inactivo
                                                <input type="checkbox"  data-toggle="toggle"
                                                data-size="small" data-id=""><span class="lever"></span>Activo</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                            class="ti-close" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="text-right">
                                            <ul class="pagination"></ul>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import datatables from 'datatables'

    export default {
        name: "admin-users",
        mounted() {
            this.getUsers();
        },

        data(){
            return{
                users: []
            }
        },
        methods: {
            getUsers(){
                var urlUsers = "/datatables-users";
                axios.get(urlUsers).then(response=>{
                    this.users = response.data
                });
            }
        }
    }
</script>
