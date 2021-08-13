<template>
    <div class="packs mb-5">
        <a class="btn btn-warning mb-5" 
            @click="adding = !adding">+ Añadir Pack
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
                    <form class="card card-body my-5" @submit.prevent="AddPack" v-if="adding">
                        <h4 class="mb-4">Nuevo Pack</h4>

                        <div class="form-label-group">
                            <input
                                type="text"
                                id="pack-name"
                                class="form-control"
                                placeholder="Nombre del Pack"
                                autocomplete="off"
                                name="name"
                                v-model="newPack.name"
                                autofocus
                            />
                            <label for="pack-name">Nombre</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="text"
                                id="pack-description"
                                class="form-control"
                                autocomplete="off"
                                placeholder="Price"
                                name="description"
                                min="0"
                                v-model="newPack.description"
                            />
                            <label for="pack-description">Descripción</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="text"
                                id="pack-duration"
                                class="form-control"
                                autocomplete="off"
                                placeholder="Price"
                                name="description"
                                min="0"
                                v-model="newPack.duration"
                            />
                            <label for="pack-duration">Duración</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="number"
                                id="pack-price"
                                class="form-control"
                                autocomplete="off"
                                placeholder="Price"
                                name="price"
                                min="0"
                                v-model="newPack.price"
                            />
                            <label for="pack-price">Precio</label>
                        </div>

                        <button class="btn btn-primary btn-block mr-0 ml-auto" type="submit">Guardar</button>
                    </form>
                </transition>
                <!-- END ADD SUSCRIPTIONS -->
            </div>
        </div>

        <div class="packs-cards row m-0 p-0 justify-content-center justify-content-md-start" v-if="packsSaves.length != 0">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-0" v-for="(pack, index) in packsSaves" :key="index">
                <div class="card gold">
                    <div class="card-body">
                        <h5><b>Nombre: </b>{{ pack.name }}</h5>

                        <hr>

                        <p><b>Descripción: </b>{{ pack.description }}</p>

                        <hr>

                        <p><b>Duración: </b>{{ pack.duration }}</p>

                        <hr>

                        <p class="price"><b>Precio: </b>{{ pack.price }}$</p>

                        <hr>

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning" data-target="#modal-edit" @click="EditPack(pack)">Editar</a>
                            <a class="btn btn-danger" @click="RemovePack(pack, index)">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="packs-cards row mx-0 mb-5 p-0 justify-content-center justify-content-md-start" v-else>
            <div class="col-8 col-sm-6 col-xl-4 p-1 my-5 my-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5><b>Nombre: </b>Pack 1</h5>
                        <hr>
                        <p><b>Descripción: </b> Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
                        <hr>
                        <p><b>Duración: </b> 3 Meses</p>
                        <hr>
                        <p class="price"><b>Precio: </b>100$</p>
                        <hr>
                        <a class="btn btn-warning" @click="adding = true">Crear</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT PACKS -->
        <transition name="fade" v-if="editing">
            <form class="modal-edit" id="modal-edit" @submit.prevent="SaveEditPack(newPack)">
                <h5 class="text-center d-block font-weight-bold">Editar Pack</h5>
                <hr class="mt-1 mb-3">
                <div class="form-label-group">
                    <input
                        type="text"
                        id="pack-name"
                        class="form-control"
                        placeholder="Nombre"
                        autocomplete="off"
                        name="name"
                        v-model="newPack.name"
                        value="profileEdited.name_profile"
                        autofocus
                    />
                    <label for="pack-name">Nombre</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="text"
                        id="pack-description"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Descripción"
                        name="description"
                        v-model="newPack.description"
                    />
                    <label for="pack-description">Descripción</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="text"
                        id="duration"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Duración"
                        name="duration"
                        v-model="newPack.duration"
                    />
                    <label for="duration">Duración</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="number"
                        id="price"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Precio"
                        name="price"
                        v-model="newPack.price"
                    />
                    <label for="price">Precio</label>
                </div>

                <div class="d-flex justify-content-end mt-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="editing = false">Cancelar</button>
                    <button type="submit" class="btn btn-warning ml-3">Guardar cambios</button>
                </div>
            </form>
        </transition>
        <!-- END EDIT PACKS -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            packsSaves: [],
            newPack: {
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
        axios.get('/packs')
        .then(res => {
            this.packsSaves = res.data;
        })
    },
    methods: {
        AddPack() {
          clearInterval(this.msgTimer)
          if (this.newPack.name.trim() === '' || this.newPack.description.trim() === '' || this.newPack.duration.trim() === '' || this.newPack.price.trim() === '' || isNaN(this.newPack.price)) {
              this.showMessage = true;
              this.newPack.name = '';
              this.newPack.description = '';
              this.newPack.duration = '';
              this.newPack.price = '';
              this.classSave = "alert-danger";
              this.serverMessage = "Complete todos los campos correctamente !";
              this.adding = false;
              this.msgTimer = setInterval(() => {
                this.showMessage = false;
              }, 4000);
            return;
          } else {

              const params = {
                name: this.newPack.name,
                description: this.newPack.description,
                duration: this.newPack.duration,
                price: this.newPack.price,
              } 
      
              this.newPack = {name: '', description: '', duration: '', price: ''};   
              
              axios.post('/packs', params)
              .then((res) => {
                const response = res.data;
                this.packsSaves.push(response);
                this.showMessage = true;
                this.classSave = "alert-success";
                this.serverMessage = "Pack Creado Sastisfactoriamente !";
                this.adding = false;
                this.msgTimer = setInterval(() => {
                  this.showMessage = false;
                }, 4000);
              });
          }
        },
        EditPack(item) {
            this.editing = true;
            this.newPack.id = item.id;
            this.newPack.name = item.name;
            this.newPack.description = item.description;
            this.newPack.duration = item.duration;
            this.newPack.price = item.price;
        },
        SaveEditPack(item) {
            clearInterval(this.msgTimer)
            if (this.newPack.name.trim() === '' || this.newPack.description.trim() === '' || this.newPack.duration.trim() === '' || this.newPack.price.trim() === '' || isNaN(this.newPack.price)) {

                this.showMessage = true;
                this.classSave = "alert-danger";
                this.serverMessage = "Complete todos los campos correctamente !";
                this.adding = false;
                this.newPack.name = '';
                this.newPack.description = '';
                this.newPack.duration = '';
                this.newPack.price = '';
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

                axios.put(`/packs/${item.id}`, params)
                .then(res => {
                    const idx = this.packsSaves.findIndex(search => search.id === res.data.id);
                    this.packsSaves[idx] = res.data;
                    this.showMessage = true;
                    this.serverMessage = "Pack Actualizado Sastisfactoriamente !";
                    this.classSave = "alert-info";
                    this.editing = false;
                    this.newPack.name = '';
                    this.newPack.description = '';
                    this.newPack.duration = '';
                    this.newPack.price = '';
                    this.msgTimer = setInterval(() => {
                        this.showMessage = false;
                    }, 4000);
                }); 
            }
        },
        RemovePack(item, index) {
            axios.delete(`/packs/${item.id}`)
            .then(() => {
                clearInterval(this.msgTimer)
                this.packsSaves.splice(index, 1);
                this.showMessage = true;
                this.serverMessage = "Pack Eliminado Sastisfactoriamente !";
                this.classSave = "alert-danger";
                this.msgTimer = setInterval(() => {
                this.showMessage = false;
                }, 4000);
            });
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