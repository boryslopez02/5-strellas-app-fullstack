<template>
    <div class="suscriptions">
        <h5 class="mb-4">Suscripciones</h5>
        <div class="suscrip-cards row m-0 p-0 justify-content-center justify-content-md-start" v-if="suscriptionsSaves.length != 0">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-0" v-for="(suscription, index) in suscriptionsSaves" :key="index">
                <div class="card gold">
                    <div class="card-body">
                        <h5><b>Nombre: </b>{{ suscription.name }}</h5>

                        <hr>

                        <p><b>Descripción: </b>{{ suscription.description }}</p>

                        <hr>

                        <p><b>Duración: </b>{{ suscription.duration }}</p>

                        <hr>

                        <p class="price"><b>Precio: </b>{{ suscription.price }}$</p>

                        <hr>

                        <a href="/admin/suscriptions" class="btn btn-warning">Editar</a>
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            suscriptionsSaves: [],
        }
    },
    created() {
    axios.get('/suscriptions')
    .then(res => {
        this.suscriptionsSaves = res.data;
    })
  },
}
</script>