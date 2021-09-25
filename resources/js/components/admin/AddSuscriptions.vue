<template>
    <div class="suscriptions mb-5" id="">
        <a class="btn btn-warning mb-5" 
            @click="Adding()">+ Añadir Suscripción
        </a>

        <!-- SERVER MESSAGE HERE -->
        <transition name="fade">
            <div class="alert fade show" :class="classSave" role="alert" v-if="showMessage">
                <strong>{{ serverMessage }}</strong>
            </div>
        </transition>
        <!-- END SERVER MESSAGE HERE -->

        <div class="row mx-0 mb-5 p-0 justify-content-center justify-content-md-start">
            <div class="col-12">
                <!-- ADD SUSCRIPTIONS -->
                <transition name="fade">
                    <form class="card card-body my-5" @submit.prevent="AddSuscription" v-if="adding">
                        <h4 class="mb-4">Nueva Suscripción</h4>

                        <div class="form-label-group">
                            <input
                                type="text"
                                id="name-suscrip"
                                class="form-control"
                                placeholder="Nombre de la suscripción"
                                autocomplete="off"
                                name="name"
                                v-model="newSuscription.name"
                                autofocus
                            />
                            <label for="name-suscrip">Nombre de la suscripción</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="text"
                                id="description"
                                class="form-control"
                                autocomplete="off"
                                placeholder="Price"
                                name="description"
                                min="0"
                                v-model="newSuscription.description"
                            />
                            <label for="description">Descripción</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="text"
                                id="duration"
                                class="form-control"
                                autocomplete="off"
                                placeholder="Price"
                                name="description"
                                min="0"
                                v-model="newSuscription.duration"
                            />
                            <label for="duration">Duración del Plan</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="number"
                                id="price"
                                class="form-control"
                                autocomplete="off"
                                placeholder="Price"
                                name="price"
                                min="0"
                                v-model="newSuscription.price"
                            />
                            <label for="price">Precio</label>
                        </div>

                        <button class="btn btn-primary btn-block mr-0 ml-auto" type="submit">Guardar</button>
                    </form>
                </transition>
                <!-- END ADD SUSCRIPTIONS -->
            </div>
        </div>

        <div class="suscrip-cards row m-0 p-0 justify-content-center justify-content-md-start" v-if="suscriptionsSaves.length != 0">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-0" v-for="(suscription, index) in suscriptionsSaves" :key="index">
                <div class="card gold">
                    <div class="card-body">
                        <span>Suscripción</span>
                        <h5><b>Nombre: </b>{{ suscription.name }}</h5>

                        <hr>
                            <img src="/img/shop/gladiator.png" class="img-fluid d-block mx-auto" v-if="suscription.price >= 0 && suscription.price < 50">
                            <img src="/img/shop/coliseum.png" class="img-fluid d-block mx-auto" v-if="suscription.price >= 50 && suscription.price < 120">
                            <img src="/img/shop/imperator.png" class="img-fluid d-block mx-auto" v-if="suscription.price >= 120">
                        <hr>
                
                        <p><b>Descripción: </b>{{ suscription.description }}</p>

                        <hr>

                        <p><b>Duración: </b>{{ suscription.duration }}</p>

                        <hr>

                        <p class="price"><b>Precio: </b>{{ suscription.price }}$</p>

                        <hr>

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning" data-target="#modal-edit" @click="EditSuscription(suscription)">Editar</a>
                            <a class="btn btn-danger" @click="RemoveSuscription(suscription, index)">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="suscrip-cards row mx-0 mb-5 p-0 justify-content-center justify-content-md-start" v-else>
            <div class="col-8 col-sm-6 col-xl-4 p-1 my-5 my-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5><b>Nombre: </b>Suscripción 1</h5>
                        <hr>
                          <img src="/img/shop/gladiator.png" class="img-fluid d-block mx-auto">
                        <hr>
                        <p><b>Descripción: </b> Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
                        <hr>
                        <p><b>Duración del Plan: </b> 3 Meses</p>
                        <hr>
                        <p class="price"><b>Precio: </b>100$</p>
                        <hr>
                        <a class="btn btn-warning" @click="adding = true">Crear</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT SUSCRIPTIONS -->
        <transition name="fade" v-if="editing">
            <form class="modal-edit" id="modal-edit" @submit.prevent="SaveEditSuscription(newSuscription)">
                <h5 class="text-center d-block font-weight-bold">Editar Suscripción</h5>
                <hr class="mt-1 mb-3">
                <div class="form-label-group">
                    <input
                        type="text"
                        id="name-suscript"
                        class="form-control"
                        placeholder="Nombre de tu cuenta"
                        autocomplete="off"
                        name="name"
                        v-model="newSuscription.name"
                        value="profileEdited.name_profile"
                        autofocus
                    />
                    <label for="name-suscript">Nombre</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="text"
                        id="description"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Descripción"
                        name="description"
                        v-model="newSuscription.description"
                    />
                    <label for="description">Descripción</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="text"
                        id="duration-edit"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Duración del Plan"
                        name="duration"
                        v-model="newSuscription.duration"
                    />
                    <label for="duration-edit">Duración del Plan</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="number"
                        id="price-edit"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Precio"
                        name="price"
                        v-model="newSuscription.price"
                    />
                    <label for="price-edit">Precio</label>
                </div>
                <div class="d-flex justify-content-end mt-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="editing = false">Cancelar</button>
                    <button type="submit" class="btn btn-warning ml-3">Guardar cambios</button>
                </div>
            </form>
        </transition>
        <!-- END EDIT SUSCRIPTIONS -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            suscriptionsSaves: [],
            newSuscription: {
                name: '',
                description: '',
                duration: '',
                price: '',
            },
            adding: false,
            editing: false,
            showMessage: false,
            msgTimer: '',
            classSave: '',
            serverMessage: '', 
        }
    },
    created() {
        axios.get('/suscriptions')
        .then(res => {
            this.suscriptionsSaves = res.data;
        })
    },
    methods: {
        AddSuscription() {
          clearInterval(this.msgTimer)
          if (this.newSuscription.name.trim() === '' || this.newSuscription.description.trim() === '' || this.newSuscription.duration.trim() === '' || this.newSuscription.price.trim() === '' || isNaN(this.newSuscription.price)) {
              this.showMessage = true;
              this.Reset();
              this.classSave = "alert-danger";
              this.serverMessage = "Complete todos los campos correctamente !";
              this.adding = false;
              this.msgTimer = setInterval(() => {
                this.showMessage = false;
              }, 4000);
            return;
          } else {

              const params = {
                name: this.newSuscription.name,
                description: this.newSuscription.description,
                duration: this.newSuscription.duration,
                price: this.newSuscription.price,
              } 
      
              this.newSuscription = {name: '', description: '', duration: '', price: ''};   
              
              axios.post('/suscriptions', params)
              .then((res) => {
                const response = res.data;
                this.suscriptionsSaves.push(response);
                this.showMessage = true;
                this.classSave = "alert-success";
                this.serverMessage = "Suscripción Creada Sastisfactoriamente !";
                this.adding = false;
                this.msgTimer = setInterval(() => {
                  this.showMessage = false;
                }, 4000);
              });
          }
        },
        EditSuscription(item) {
            this.adding = false;
            this.editing = true;
            this.newSuscription.id = item.id;
            this.newSuscription.name = item.name;
            this.newSuscription.description = item.description;
            this.newSuscription.duration = item.duration;
            this.newSuscription.price = item.price;
        },
        SaveEditSuscription(item) {
            clearInterval(this.msgTimer)
            if (this.newSuscription.name.trim() === '' || this.newSuscription.description.trim() === '' || this.newSuscription.duration.trim() === '' || this.newSuscription.price.trim() === '' || isNaN(this.newSuscription.price)) {

                this.showMessage = true;
                this.classSave = "alert-danger";
                this.serverMessage = "Complete todos los campos correctamente !";
                this.adding = false;
                this.Reset();
                this.msgTimer = setInterval(() => {
                    this.showMessage = false;
                }, 4000);
            } else {
                const params = {
                    name: item.name,
                    description: item.description,
                    duration: item.duration,
                    price: item.price
                } 

                axios.put(`/suscriptions/${item.id}`, params)
                .then(res => {
                    const idx = this.suscriptionsSaves.findIndex(search => search.id === res.data.id);
                    this.suscriptionsSaves[idx] = res.data;
                    this.showMessage = true;
                    this.serverMessage = "Suscripción Actualizada Sastisfactoriamente !";
                    this.classSave = "alert-info";
                    this.editing = false;
                    this.Reset();
                    this.msgTimer = setInterval(() => {
                        this.showMessage = false;
                    }, 4000);
                }); 
            }
        },
        RemoveSuscription(item, index) {
            axios.delete(`/suscriptions/${item.id}`)
            .then(() => {
                clearInterval(this.msgTimer)
                this.suscriptionsSaves.splice(index, 1);
                this.showMessage = true;
                this.serverMessage = "Suscripción Eliminado Sastisfactoriamente !";
                this.classSave = "alert-danger";
                this.msgTimer = setInterval(() => {
                this.showMessage = false;
                }, 4000);
            });
        },
        Reset() {
          this.editing = false;
          this.newSuscription.name = '';
          this.newSuscription.description = '';
          this.newSuscription.duration = '';
          this.newSuscription.price = '';
        }, 
        Adding() {
          this.Reset();
          this.editing = false;
          if (this.adding === true) {
            this.adding = false;
          } else {
            this.adding = true;
          }
        }
    },
    computed: {
      ServerMessage() {
        return ;
      }
    }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: .3s all;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
  transform: scale(0);
}
.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input,
.form-label-group label {
  height: 3.125rem;
  padding: .75rem;
}

.form-label-group label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  pointer-events: none;
  cursor: text; /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:-moz-placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:-ms-input-placeholder) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:-moz-placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

.form-label-group input:not(:-ms-input-placeholder) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */
@supports (-ms-ime-align: auto) {
  .form-label-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column-reverse;
    flex-direction: column-reverse;
  }

  .form-label-group label {
    position: static;
  }

  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}
</style>