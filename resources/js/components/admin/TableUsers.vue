<template>
    <div>
        <!-- SERVER MESSAGE HERE -->
        <transition name="fade">
            <div class="alert fade show" :class="classSave" role="alert" v-if="showMessage">
                <strong>{{ serverMessage }}</strong>
            </div>
        </transition>
        <!-- END SERVER MESSAGE HERE -->

        <table class="table table-bordered table-striped table-responsive-lg my-5">
            <thead class="text-center text-nowrap table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody class="text-center" v-if="usersRegistered.length != 0">
                <tr v-for="(user, index) in usersRegistered" :key="index">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.profile }}</td>
                    <td>{{ user.status }}</td>
                    <td>
                        <a class="btn btn-warning" v-if="user.status === 'active'" @click="BlockUser(user.id, index)">Bloquear</a>
                        <a class="btn btn-info" @click="DesblockUser(user.id, index)" v-else>Desbloquear</a>
                    </td>
                </tr>
            </tbody>
            <tbody class="text-center" v-else>
                <tr>
                    <th scope="row">1</th>
                    <td>Negocio XXXX</td>
                    <td>mailer@mail.es</td>
                    <td>Empresa</td>
                    <td>Activo</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            usersRegistered: [],
            showMessage: false,
            serverMessage: '',
            msgTimer: '',
            classSave: '',
        }
    },
    created() {
        axios.get('/users')
        .then(res => {
            this.usersRegistered = res.data;
        });
    },
    methods: {
        BlockUser(user, idx) {
            clearInterval(this.msgTimer)
            axios.put(`/block/${user}`, user)
            .then(res => {
                if (res.status === 200) {     
                    this.usersRegistered.splice(idx, 1, res.data);
                    this.showMessage = true;
                    this.serverMessage = "Usuario Bloqueado !";
                    this.classSave = "alert-info";
                    
                    this.msgTimer = setInterval(() => {
                        this.showMessage = false;
                    }, 4000);
                }
            });
        },
        DesblockUser(user, idx) {
            clearInterval(this.msgTimer)
            axios.put(`/desblock/${user}`, user)
            .then(res => {
                if (res.status === 200) {
                    this.usersRegistered.splice(idx, 1, res.data);
                    this.showMessage = true;
                    this.serverMessage = "Usuario Desbloqueado !";
                    this.classSave = "alert-info";
                    
                    this.msgTimer = setInterval(() => {
                        this.showMessage = false;
                    }, 4000);
                }
            });
        }
    }
}
</script>