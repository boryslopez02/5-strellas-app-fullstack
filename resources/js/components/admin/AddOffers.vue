<template>
    <div class="packs">
        <a class="btn btn-warning" 
            @click="adding = !adding">+ Nueva Oferta
        </a>

        <!-- SERVER MESSAGE HERE -->
        <transition name="fade">
            <div class="alert fade show mt-5" :class="classSave" role="alert" v-if="showMessage">
                <strong>{{ serverMessage }}</strong>
            </div>
        </transition>
        <!-- END SERVER MESSAGE HERE -->

        <div class="row mx-0 mb-5 p-0 justify-content-center justify-content-md-start">
            <div class="col-12">
                <!-- ADD OFFERS -->
                <transition name="fade">
                    <form class="card card-body my-5" @submit.prevent="AddOffer" v-if="adding">
                        <h4 class="mb-4">Nueva Oferta</h4>

                        <div class="form-label-group">
                            <input
                                type="text"
                                id="pack-name"
                                class="form-control"
                                placeholder="Nombre del Pack"
                                autocomplete="off"
                                name="name"
                                v-model="newOffer.name"
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
                                v-model="newOffer.description"
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
                                v-model="newOffer.duration"
                            />
                            <label for="pack-duration">Duración</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="date"
                                id="pack-expiration"
                                class="form-control"
                                autocomplete="off"
                                placeholder="Vencimineto"
                                name="expiration"
                                v-model="newOffer.expiration"
                            />
                            <label for="pack-expiration">Vence el día</label>
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
                                v-model="newOffer.price"
                            />
                            <label for="pack-price">Precio</label>
                        </div>

                        <button class="btn btn-primary btn-block mr-0 ml-auto" type="submit">Guardar</button>
                    </form>
                </transition>
                <!-- END ADD OFFERS -->
            </div>
        </div>

        <div class="packs-cards row mt-0 mb-5 p-0 justify-content-center justify-content-md-start" v-if="offersSaves.length != 0">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-0" v-for="(offer, index) in offersSaves" :key="index">
                <div class="card offer">
                    <div class="card-body">
                        <span>En Oferta</span>
                        <h5><b>Nombre: </b>{{ offer.name }}</h5>

                        <hr>
                          <img src="/img/shop/hot.png" class="img-fluid d-block mx-auto">
                        <hr>

                        <p><b>Descripción: </b>{{ offer.description }}</p>

                        <hr>

                        <p><b>Duración: </b>{{ offer.duration }}</p>

                        <hr>

                        <p><b>Vence el: </b>{{ offer.expiration }}$</p>

                        <hr>

                        <p class="price"><b>Precio: </b>{{ offer.price }}$</p>

                        <hr>

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning" data-target="#modal-edit" @click="EditOffer(offer)">Editar</a>
                            <a class="btn btn-danger" @click="RemoveOffer(offer, index)">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="packs-cards row mx-0 mb-5 p-0 justify-content-center justify-content-md-start" v-else>
            <div class="col-8 col-sm-6 col-xl-4 p-1 my-5 my-sm-0">
                <div class="card offer">
                    <div class="card-body">
                        <h5><b>Nombre: </b>Pack 1</h5>
                        <hr>
                        <p><b>Descripción: </b> Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
                        <hr>
                        <p><b>Duración: </b> 3 Meses</p>
                        <hr>
                        <p><b>Vence el: </b>24/05/2021</p>
                        <hr>
                        <p class="price"><b>Precio: </b>100$</p>
                        <hr>
                        <a class="btn btn-warning" @click="adding = true">Crear</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT OFFERS -->
        <transition name="fade" v-if="editing">
            <form class="modal-edit edit2" id="modal-edit" @submit.prevent="SaveEditOffer(newOffer)">
                <h5 class="text-center d-block font-weight-bold">Editar Oferta</h5>
                <hr class="mt-1 mb-3">
                <div class="form-label-group">
                    <input
                        type="text"
                        id="pack-name"
                        class="form-control"
                        placeholder="Nombre"
                        autocomplete="off"
                        name="name"
                        v-model="newOffer.name"
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
                        v-model="newOffer.description"
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
                        v-model="newOffer.duration"
                    />
                    <label for="duration">Duración</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="date"
                        id="expiration"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Vencimiento"
                        name="price"
                        v-model="newOffer.expiration"
                    />
                    <label for="expiration">Vencimiento</label>
                </div>

                <div class="form-label-group">
                    <input
                        type="number"
                        id="price"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Precio"
                        name="price"
                        v-model="newOffer.price"
                    />
                    <label for="price">Precio</label>
                </div>

                <div class="d-flex justify-content-end mt-1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="Reset()">Cancelar</button>
                    <button type="submit" class="btn btn-warning ml-3">Guardar cambios</button>
                </div>
            </form>
        </transition>
        <!-- END EDIT OFFERS -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            offersSaves: [],
            newOffer: {
                name: '',
                description: '',
                duration: '',
                expiration: '',
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
        axios.get('/offers')
        .then(res => {
            this.offersSaves = res.data;
        })
    },
    methods: {
        AddOffer() {
          clearInterval(this.msgTimer)
          if (this.newOffer.name.trim() === '' || this.newOffer.description.trim() === '' || this.newOffer.duration.trim() === '' || this.newOffer.price.trim() === '' || isNaN(this.newOffer.price)) {
              this.showMessage = true;
              this.newOffer.name = '';
              this.newOffer.description = '';
              this.newOffer.duration = '';
              this.newOffer.expiration = '';
              this.newOffer.price = '';
              this.classSave = "alert-danger";
              this.serverMessage = "Complete todos los campos correctamente !";
              this.adding = false;
              this.msgTimer = setInterval(() => {
                this.showMessage = false;
              }, 4000);
            return;
          } else {

              const params = {
                name: this.newOffer.name,
                description: this.newOffer.description,
                duration: this.newOffer.duration,
                expiration: this.newOffer.expiration,
                price: this.newOffer.price,
              } 
      
              this.newOffer = {name: '', description: '', duration: '', expiration: '', price: ''};   
              
              axios.post('/offers', params)
              .then((res) => {
                const response = res.data;
                this.offersSaves.push(response);
                this.showMessage = true;
                this.classSave = "alert-success";
                this.serverMessage = "Oferta Creada Sastisfactoriamente !";
                this.adding = false;
                this.msgTimer = setInterval(() => {
                  this.showMessage = false;
                }, 4000);
              });
          }
        },
        EditOffer(item) {
            this.editing = true;
            this.newOffer.id = item.id;
            this.newOffer.name = item.name;
            this.newOffer.description = item.description;
            this.newOffer.duration = item.duration;
            this.newOffer.expiration = item.expiration;
            this.newOffer.price = item.price;
        },
        SaveEditOffer(item) {
            clearInterval(this.msgTimer)
            if (this.newOffer.name.trim() === '' || this.newOffer.description.trim() === '' || this.newOffer.duration.trim() === '' || this.newOffer.price.trim() === '' || isNaN(this.newOffer.price)) {

                this.showMessage = true;
                this.classSave = "alert-danger";
                this.serverMessage = "Complete todos los campos correctamente !";
                this.adding = false;
                this.newOffer.name = '';
                this.newOffer.description = '';
                this.newOffer.duration = '';
                this.newOffer.expiration = '';
                this.newOffer.price = '';
                this.msgTimer = setInterval(() => {
                    this.showMessage = false;
                }, 4000);
            } else {
                const params = {
                    name: item.name,
                    description: item.description,
                    duration: item.duration,
                    expiration: item.expiration,
                    price: item.price
                } 

                axios.put(`/offers/${item.id}`, params)
                .then(res => {
                    const idx = this.offersSaves.findIndex(search => search.id === res.data.id);
                    this.offersSaves[idx] = res.data;
                    this.showMessage = true;
                    this.serverMessage = "Oferta Actualizada Sastisfactoriamente !";
                    this.classSave = "alert-info";
                    this.editing = false;
                    this.newOffer.name = '';
                    this.newOffer.description = '';
                    this.newOffer.duration = '';
                    this.newOffer.expiration = '';
                    this.newOffer.price = '';
                    this.msgTimer = setInterval(() => {
                        this.showMessage = false;
                    }, 4000);
                }); 
            }
        },
        RemoveOffer(item, index) {
            axios.delete(`/offers/${item.id}`)
            .then(() => {
                clearInterval(this.msgTimer)
                this.offersSaves.splice(index, 1);
                this.showMessage = true;
                this.serverMessage = "Oferta Eliminada Sastisfactoriamente !";
                this.classSave = "alert-danger";
                this.msgTimer = setInterval(() => {
                this.showMessage = false;
                }, 4000);
            });
        },
        Reset() {
            this.editing = false;
            this.newOffer.name = '';
            this.newOffer.description = '';
            this.newOffer.duration = '';
            this.newOffer.expiration = '';
            this.newOffer.price = '';
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