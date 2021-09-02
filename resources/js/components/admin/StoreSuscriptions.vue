<template>
    <div class="suscriptions">
        <div class="suscrip-cards row m-0 p-0 justify-content-center" v-if="suscriptionsSaves.length != 0">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-3" v-for="(suscription, index) in suscriptionsSaves" :key="index">
                <div class="card gold">
                    <div class="card-body text-center">
                        <h5>{{ suscription.name }}</h5>

                        <hr>
                            <img src="/img/shop/gladiator.png" class="img-fluid d-block mx-auto" v-if="suscription.price >= 0 && suscription.price < 50">
                            <img src="/img/shop/coliseum.png" class="img-fluid d-block mx-auto" v-if="suscription.price >= 50 && suscription.price < 120">
                            <img src="/img/shop/imperator.png" class="img-fluid d-block mx-auto" v-if="suscription.price >= 120">
                        <hr>

                        <p>{{ suscription.description }}</p>

                        <hr>

                        <p>{{ suscription.duration }}</p>

                        <hr>

                        <p class="price">{{ suscription.price }}$ / mes</p>

                        <hr>

                        <a href="" class="btn btn-primary">Quiero Esto</a>
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
                        <a class="btn btn-warning">Quiero Esto</a>
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
    axios.get('/store-suscriptions')
    .then(res => {
        this.suscriptionsSaves = res.data;
    })
  },
}
</script>