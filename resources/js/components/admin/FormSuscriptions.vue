<template>   
    <!-- ADD SUSCRIPTIONS -->
    <transition name="fade">
    <form class="card card-body my-5" @submit.prevent="AddSuscription">
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
        <label for="name-account">Nombre de la suscripción</label>
      </div>

      <div class="form-label-group">
        <input
          type="text"
          id="price"
          class="form-control"
          autocomplete="off"
          placeholder="Price"
          name="price"
          v-model="newSuscription.price"
        />
        <label for="price">Precio</label>
      </div>

      <button class="btn btn-primary btn-block mr-0 ml-auto" type="submit">Guardar</button>
    </form>
    </transition>
    <!-- END ADD SUSCRIPTIONS -->
</template>

<script>
export default {
    data() {
        return {
            newSuscription: {
                name: '',
                price: ''
            }
        }
    },
    methods: {
        AddSuscription() {

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