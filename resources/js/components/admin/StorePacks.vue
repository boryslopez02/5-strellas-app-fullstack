<template>
    <div class="packs my-5">
        <div class="packs-cards row m-0 p-0 justify-content-center" v-if="packsSaves.length != 0">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-3" v-for="(pack, index) in packsSaves" :key="index">
                <div class="card gold">
                    <div class="card-body text-center">
                        <span>Pack</span>
                        <h5>{{ pack.name }}</h5>

                        <hr>
                        
                        <img src="/img/shop/packs.png" class="img-fluid d-block mx-auto">

                        <hr>

                        <p><b>Descripción: </b>{{ pack.description }}</p>

                        <hr>

                        <p><b>Duración: </b>{{ pack.duration }}</p>

                        <hr>

                        <p class="price">{{ pack.price }}$ / mes</p>

                        <hr>

                        <a href="" class="btn btn-primary">Quiero Esto</a>
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
                        <img src="/img/shop/packs.png" class="img-fluid d-block mx-auto">
                        <hr>
                        <p><b>Descripción: </b> Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
                        <hr>
                        <p><b>Duración: </b> 3 Meses</p>
                        <hr>
                        <p class="price"><b>Precio: </b>100$</p>
                        <hr>
                        <a href="" class="btn btn-primary" @click="adding = true">Quiero Esto</a>
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
            packsSaves: [],
        }
    },
    created() {
    axios.get('/store-packs')
    .then(res => {
        this.packsSaves = res.data;
    })
  },
}
</script>