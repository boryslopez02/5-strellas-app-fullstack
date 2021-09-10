<template>
  <div class="profile">
    <a class="btn btn-warning mb-5" 
        @click="adding = !adding">+ Añadir Cuenta
    </a>

    <!-- ADD PROFILE -->
    <transition name="fade">
    <form class="card card-body my-5" @submit.prevent="AddProfile" v-if="adding">
      <h4 class="mb-4">Nueva Cuenta</h4>

      <div class="form-label-group">
        <input
          type="text"
          id="name-account"
          class="form-control"
          placeholder="Nombre de tu cuenta"
          autocomplete="off"
          name="name"
          v-model="newProfile.name"
          
          autofocus
        />
        <label for="name-account">Nombre de tu cuenta</label>
      </div>

      <div class="form-label-group">
        <input
          type="email"
          id="email"
          class="form-control"
          autocomplete="off"
          placeholder="Email"
          name="email"
          v-model="newProfile.email"
          
        />
        <label for="email">Email</label>
      </div>

        <label for="">Genero:</label>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="gend" value="men" 
                v-model="newProfile.gender">

            <label class="form-check-label" for="men">Hombre</label>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="gender" value="women" 
                v-model="newProfile.gender">

            <label class="form-check-label" for="women">Mujer</label>
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

    <div class="profile-cards row m-0 p-0 justify-content-center justify-content-md-start" v-if="profilesSaves.length != 0">
      <!-- SHOW PROFILES -->
      <div class="col-10 col-sm-8 col-lg-6 col-xl-4 my-5 my-sm-3" v-for="(profile, index) in profilesSaves" :key="index">
        <div class="card card-body">
          <h4>{{ profile.name_profile }}</h4>
          <p class="text-muted">{{ profile.email_profile }}</p>
          <button type="button" class="state" v-if="!profile.verified">No Verificado</button>
          <button type="button" class="state verify" v-else>Verificado</button>
          <div v-if="profile.gender === 'men'">
            <img src="/img/men.png" class="img-fluid user my-3">
          </div>
          <div v-else>
            <img src="/img/women.png" class="img-fluid user my-3" v-if="profile.gender === 'women'">
          </div>
          <div class="d-flex justify-content-center">
            <a class="btn btn-sm btn-warning" data-target="#modal-edit" @click="EditProfile(profile)">Editar</a>
            <a class="btn btn-sm btn-danger" @click="RemoveProfile(profile, index)">Eliminar</a>
          </div>
        </div>
      </div>
      <!-- END SHOW PROFILES -->
    </div>

    <div class="profile-cards row mx-0 mb-5 p-0 justify-content-center justify-content-md-start" v-else>
      <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-3">
        <div class="card">
            <div class="card-body">
                <p class="text-muted text-center">Ningun Perfil Registrado</p>
                <img src="/img/men.png" class="img-fluid my-3">
            </div>
        </div>
      </div>
    </div>

    <!-- EDIT PROFILES -->
    <transition name="fade" v-if="editing">
      <form class="modal-edit" id="modal-edit" @submit.prevent="SaveEditProfile(newProfile)">
        <h5 class="text-center d-block font-weight-bold">Editar Cuenta</h5>
        <hr class="mt-1 mb-3">
        <div class="form-label-group">
          <input
            type="text"
            id="name-account"
            class="form-control"
            placeholder="Nombre de tu cuenta"
            autocomplete="off"
            name="name"
            v-model="newProfile.name"
            value="profileEdited.name_profile"
            autofocus
          />
          <label for="name-account">Nombre de tu cuenta</label>
        </div>

        <div class="form-label-group">
          <input
            type="email"
            id="email"
            class="form-control"
            autocomplete="off"
            placeholder="Email"
            name="email"
            v-model="newProfile.email"
          />
          <label for="email">Email</label>
        </div>

        <label for="">Genero:</label>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="gend" value="men" 
            v-model="newProfile.gender">

          <label class="form-check-label" for="men">Hombre</label>
        </div>

        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="gender" value="women" 
            v-model="newProfile.gender">

          <label class="form-check-label" for="women">Mujer</label>
        </div>
        <hr class="mt-1 mb-3">
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="Reset()">Cancelar</button>
          <button type="submit" class="btn btn-warning ml-3">Guardar cambios</button>
        </div>
      </form>
    </transition>
    <!-- END EDIT PROFILES -->
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
    axios.get('/profile')
    .then(res => {
      this.profilesSaves = res.data;
    })
  },
  methods: {
    AddProfile() {
      clearInterval(this.msgTimer)
      if (this.newProfile.name.trim() === '' || this.newProfile.email.trim() === '' || this.newProfile.gender.trim() === '') {
        alert('Todos los campos son obligatorios');
        return;
      } else {

        if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(this.newProfile.email)) {
          const params = {
            name: this.newProfile.name,
            email: this.newProfile.email,
            gender: this.newProfile.gender
          } 
  
          this.newProfile = {name: '', email: '', gender: ''};   
          
          axios.post('/profile', params)
          .then((res) => {
            const response = res.data;
            this.profilesSaves.push(response);
            this.showMessage = true;
            this.classSave = "alert-success";
            this.serverMessage = "Perfil Guardado Sastisfactoriamente !";
            this.adding = false;
            this.msgTimer = setInterval(() => {
              this.showMessage = false;
            }, 4000);
          });
        } else {
          this.showMessage = true;
          this.newProfile.name = '';
          this.newProfile.email = '';
          this.newProfile.gende = '';
          this.classSave = "alert-danger";
          this.serverMessage = "Email Invalido !";
          this.adding = false;
          this.msgTimer = setInterval(() => {
            this.showMessage = false;
          }, 4000);
        }
      }
    },
    EditProfile(item) {
      this.editing = true;
      this.newProfile.id = item.id;
      this.newProfile.name = item.name_profile;
      this.newProfile.email = item.email_profile;
      this.newProfile.gender = item.gender;
    },
    SaveEditProfile(item){
      clearInterval(this.msgTimer)

      if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(item.email)) { 
        const params = {
          name: item.name,
          email: item.email,
          gender: item.gender
        } 
        axios.put(`/profile/${item.id}`, params)
        .then(res => {
          const idx = this.profilesSaves.findIndex(search => search.id === res.data.id);
          this.profilesSaves[idx] = res.data;
          this.showMessage = true;
          this.serverMessage = "Perfil Actualizado Sastisfactoriamente !";
          this.classSave = "alert-info";
          this.editing = false;
          this.newProfile.name = '';
          this.newProfile.email = '';
          this.newProfile.gender = '';
          this.msgTimer = setInterval(() => {
            this.showMessage = false;
          }, 4000);
        });

      } else {
          this.showMessage = true;
          this.classSave = "alert-danger";
          this.serverMessage = "Email Invalido !";
          this.adding = false;
          this.newProfile.name = '';
          this.newProfile.email = '';
          this.newProfile.gender = '';
          this.msgTimer = setInterval(() => {
            this.showMessage = false;
          }, 4000);
      }
    },
    RemoveProfile(item, index) {
      axios.delete(`/profile/${item.id}`)
      .then(() => {
        clearInterval(this.msgTimer)
        this.profilesSaves.splice(index, 1);
        this.showMessage = true;
        this.serverMessage = "Perfil Eliminado Sastisfactoriamente !";
        this.classSave = "alert-danger";
        this.msgTimer = setInterval(() => {
          this.showMessage = false;
        }, 4000);
      });
    },
    Reset() {
      this.editing = false;
      this.newProfile.id = '';
      this.newProfile.name = '';
      this.newProfile.email = '';
      this.newProfile.gender = '';
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