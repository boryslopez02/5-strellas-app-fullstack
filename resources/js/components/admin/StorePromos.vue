<template>
    <div class="promotions my-5">
        <div class="suscrip-cards row m-0 p-0 justify-content-center" v-if="promotionsSaves.length != 0">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-3" v-for="(promotion, index) in promotionsSaves" :key="index">
                <div class="card promo">
                    <div class="card-body text-center">
                        <span>Promoción</span>
                        <h5>{{ promotion.name }}</h5>

                        <hr>
                            <img src="/img/shop/promo1.png" class="img-fluid d-block mx-auto">
                        <hr>

                        <p><b>Descripción: </b>{{ promotion.description }}</p>

                        <hr>

                        <p><b>Duración: </b>{{ promotion.duration }}</p>

                        <hr>

                        <p><b>Vence el: </b>{{ promotion.expiration }}</p>

                        <hr>

                        <p class="price">{{ promotion.price }}$ / mes</p>

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
            promotionsSaves: [],
        }
    },
    created() {
    axios.get('/store-promotions')
    .then(res => {
        this.promotionsSaves = res.data;
    })
  },
}
</script>