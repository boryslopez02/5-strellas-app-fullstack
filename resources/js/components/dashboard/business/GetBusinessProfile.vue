<template>
  <div class="profile">
    <a class="btn btn-warning mb-5" 
        @click="adding = !adding">+ Añadir Perfil
    </a>

    <!-- ADD PROFILE -->
    <transition name="fade">
    <form class="card card-body my-5" @submit.prevent="AddProfile" v-if="adding">
        <h4 class="mb-4">Busca tu perfil</h4>

        <div class="form-label-group">
            <input
                type="text"
                id="name-account"
                class="form-control"
                placeholder="Nombre de su empresa"
                autocomplete="off"
                name="name"
                v-model="newProfile.name"
                autofocus
            />
            <label for="name-account">Nombre de su empresa</label>
        </div>

        <div class="form-label-group">
            <select 
                name="country" 
                id="country"
                class="form-control" 
                v-model="newProfile.email"
            >
                <option value="">Seleccionar País</option>
                <option value="ve">Venezuela</option>
                <option value="ve">Venezuela</option>
                <option value="ve">Venezuela</option>
                <option value="ve">Venezuela</option>
                
            </select>
        </div>

        <div class="form-label-group">
            <select 
                name="city" 
                id="city"
                class="form-control" 

            >
                <option value="ve">Seleccionar Ciudad</option>
                <option value="ve">Venezuela</option>
                <option value="ve">Venezuela</option>
                <option value="ve">Venezuela</option>
                <option value="ve">Venezuela</option>
            </select>
        </div>

        <button class="btn btn-primary btn-block mr-0 ml-auto" type="submit">Guardar</button>
    </form>
    </transition>
    <!-- END ADD PROFILE -->

    <!-- SERVER MESSAGE HERE -->
    <transition name="fade">
    <div class="alert fade show" :class="classSave" role="alert" v-if="showMessage">
      <strong>{{ serverMessage }}</strong>
    </div>
    </transition>
    <!-- END SERVER MESSAGE HERE -->

    <div class="profile-cards row mx-0 mb-5 p-0 justify-content-center justify-content-md-start" v-if="profilesSaves.length >= 1">
        <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-3" v-for="(card, index) in profilesSaves" :key="index">
            <div class="card">
                <div class="card-body text-center">
                    <h4>{{ card.name_profile }}</h4>
                    <p class="text-muted">{{ card.email_profile }}</p>
                    <img src="/img/profile-icon.png" class="img-fluid my-3" v-if="card.gender === 'men'">
                    <img src="/img/otro.jpg" class="img-fluid my-3" v-if="card.gender === 'women'">
                    <a href="/reviewer/profile" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0 mb-5 p-0 justify-content-center justify-content-md-start" v-else>
        <div class="col-8 col-sm-6 col-xl-4 p-1 my-5 my-sm-3">
            <div class="card">
                <div class="card-body text-center">
                    <p class="email">Ningun Perfil Registrado</p>
                    <img src="/img/profile-icon.png" class="img-fluid my-3">
                    <a href="/reviewer/profile" class="btn btn-warning">Crear</a>
                </div>
            </div>
        </div>
    </div>

  </div>
</template>

<script>
export default {
  data() {
    return {
      adding: false,
      editing: false,
      showMessage: false,
      classSave: '',
      serverMessage: '',
      profileEdited: '',
      msgTimer: '',
      newProfile: {
        name: '',
        email: '',
        gender: '',
      },
      profilesSaves: [],
    };
  },
  created() {
    
  },
  methods: {
    AddProfile() {
    
    },
    EditProfile(item) {
      
    },
    SaveEditProfile(item){
     
    },
    RemoveProfile(item, index) {
      
    }
  }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: .3s all;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
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