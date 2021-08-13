<template>
    <div class="account">
        <!-- SERVER MESSAGE HERE -->
        <transition name="fade">
            <div class="alert fade show" :class="classSave" role="alert" v-if="showMessage">
                <strong>{{ serverMessage }}</strong>
            </div>
        </transition>
        <!-- END SERVER MESSAGE HERE -->

        <form class="form card-body mb-5" @submit.prevent="AddAccount" v-if="!accSave">
            <div class="form-row">
                <div class="form-group col-lg-6 pr-xl-4">
                    <h4 class="mb-3">Datos Personales</h4>

                    <label for="name">Nombre</label>
                    <input type="text" class="form-control mb-4" name="name" v-model="account.name">
                    
                    <label for="last-name">Apellido</label>
                    <input type="text" class="form-control mb-4" name="last-name" v-model="account.lastName">

                    <label for="email">Email</label>
                    <input type="email" class="form-control mb-4" name="email" v-model="account.email">
                    
                    <label for="gender">Genero</label>
                    <select name="gender" class="form-control mb-4" v-model="account.gender">
                        <option value=""></option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                    </select>
                    
                    <label for="country">País</label>
                    <input type="text" class="form-control mb-4" name="country" v-model="account.country">
                </div>

                <div class="form-group col-lg-6 pl-xl-4">
                    <h4 class="mb-3">Mis Datos de Pago</h4>

                    <label for="paypal">Paypal</label>
                    <input type="text" class="form-control mb-4" name="paypal" v-model="account.paypal">

                    <label for="other">Otro</label>
                    <input type="text" class="form-control mb-4" name="other" v-model="account.otherPayMethods">
                    
                    <h4 class="mt-5 mb-3">Mis Datos de Facturación</h4>

                    <label for="name-invoice">Nombre</label>
                    <input type="text" class="form-control mb-4" name="name-invoice" v-model="account.invoiceName">

                    <label for="last-name-invoice">Apellido</label>
                    <input type="text" class="form-control mb-4" name="last-name-invoice" v-model="account.invoiceLastName">
                </div>

                <div class="form-group col-12 mt-4">
                    <button type="submit" class="btn btn-warning">Guardar</button>
                </div>
            </div>
        </form>

        <form class="form card-body mb-5" @submit.prevent="UpdateAccount" v-else>
            <div class="form-row">
                <div class="form-group col-lg-6 pr-xl-4">
                    <h4 class="mb-3">Actualizar Datos Personales</h4>

                    <label for="name">Nombre</label>
                    <input type="text" class="form-control mb-4" name="name"
                    v-model="account.name">
                    
                    <label for="last-name">Apellido</label>
                    <input type="text" class="form-control mb-4" name="last-name" 
                    v-model="account.lastName">

                    <label for="email">Email</label>
                    <input type="email" class="form-control mb-4" name="email" 
                    v-model="account.email">
                    
                    <label for="gender">Genero</label>
                    <select name="gender" class="form-control mb-4" 
                    v-model="account.gender">
                        <option value=""></option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                    </select>
                    
                    <label for="country">País</label>
                    <input type="text" class="form-control mb-4" name="country" 
                    v-model="account.country">
                </div>

                <div class="form-group col-lg-6 pl-xl-4">
                    <h4 class="mb-3">Mis Datos de Pago</h4>

                    <label for="paypal">Paypal</label>
                    <input type="text" class="form-control mb-4" name="paypal" 
                    v-model="account.paypal">

                    <label for="other">Otro</label>
                    <input type="text" class="form-control mb-4" name="other"
                    v-model="account.otherPayMethods">
                    
                    <h4 class="mt-5 mb-3">Mis Datos de Facturación</h4>

                    <label for="name-invoice">Nombre</label>
                    <input type="text" class="form-control mb-4" name="name-invoice" 
                    v-model="account.invoiceName">

                    <label for="last-name-invoice">Apellido</label>
                    <input type="text" class="form-control mb-4" name="last-name-invoice" 
                    v-model="account.invoiceLastName">
                </div>

                <div class="form-group col-12 mt-4">
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            account: {
                name: '',
                lastName: '',
                email: '',
                gender: '',
                country: '',
                paypal: '',
                otherPayMethods: '',
                invoiceName: '',
                invoiceLastName: ''
            },
            accSave: '',
            showMessage: false,
            serverMessage: '',
            msgTimer: '',
            classSave: '',
        }
    },
    created() {
        axios.get('/account')
        .then(res => {
            this.accSave = res.data[0];
            this.account = {
                id: this.accSave.id,
                name: this.accSave.name,
                lastName: this.accSave.last_name,
                email: this.accSave.email,
                gender: this.accSave.gender,
                country: this.accSave.country,
                paypal: this.accSave.paypal,
                otherPayMethods: this.accSave.other_pay_methods,
                invoiceName: this.accSave.invoice_name,
                invoiceLastName: this.accSave.invoice_last_name,
            };
            console.log(res.data[0]);
        })
    },
    methods: {
        AddAccount() {
            if (this.account.name.trim() === '' || this.account.lastName.trim() === '' || this.account.email.trim() === '' || this.account.gender.trim() === '' || this.account.country.trim() === '' || this.account.paypal.trim() === '') {
                alert('Complete los campos correctamente');
                return;
            } else { 
                clearInterval(this.msgTimer)
                if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(this.account.email)) {
    
                    const params = {
                        name: this.account.name,
                        lastName: this.account.lastName,
                        email: this.account.email,
                        gender: this.account.gender,
                        country: this.account.country,
                        paypal: this.account.paypal,
                        otherPayMethods: this.account.otherPayMethods,
                        invoiceName: this.account.invoiceName,
                        invoiceLastName: this.account.invoiceLastName
                    } 
                    
                    if (!this.accSave) {
                        axios.post('/account', params)
                        .then((res) => {
                            const response = res.data;
                            this.accSave = response;
                            this.showMessage = true;
                            this.classSave = "alert-success";
                            this.serverMessage = "Cuenta Añadida Sastisfactoriamente !";
                            this.msgTimer = setInterval(() => {
                                this.showMessage = false;
                            }, 4000);
                        });
                    }
                } else {
                    this.showMessage = true;
                    this.classSave = "alert-danger";
                    this.serverMessage = "Email Invalido !";
                    this.msgTimer = setInterval(() => {
                        this.showMessage = false;
                    }, 4000);
                }
            }
        },
        UpdateAccount() {
            clearInterval(this.msgTimer)
            if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(this.account.email)) {
                axios.put(`/account/${this.account.id}`, this.account)
                .then(res => {
                    this.account = {
                        id: res.data.id,
                        name: res.data.name,
                        lastName: res.data.last_name,
                        email: res.data.email,
                        gender: res.data.gender,
                        country: res.data.country,
                        paypal: res.data.paypal,
                        otherPayMethods: res.data.other_pay_methods,
                        invoiceName: res.data.invoice_name,
                        invoiceLastName: res.data.invoice_last_name
                    } 
                    this.showMessage = true;
                    this.serverMessage = "Cuenta Actualizada Sastisfactoriamente !";
                    this.classSave = "alert-info";
                    
                    this.msgTimer = setInterval(() => {
                        this.showMessage = false;
                    }, 4000);
                });
            } else {
                this.showMessage = true;
                this.classSave = "alert-danger";
                this.serverMessage = "Email Invalido !";
                this.msgTimer = setInterval(() => {
                    this.showMessage = false;
                }, 4000);
            }
        },  
    }
}
</script>