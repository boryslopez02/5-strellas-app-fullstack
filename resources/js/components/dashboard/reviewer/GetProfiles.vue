<template>
    <div class="profile">
        <div class="profile-cards row mx-0 mb-5 p-0 justify-content-center justify-content-md-start" v-if="profilesSaves.length >= 1">
            <div class="col-10 col-sm-8 col-lg-6 col-xl-4 p-1 my-5 my-sm-3" v-for="(card, index) in profilesSaves" :key="index">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>{{ card.name_profile }}</h4>
                        <p class="text-muted">{{ card.email_profile }}</p>
                        <button type="button" class="state" v-if="!card.verified">No Verificado</button>
                        <button type="button" class="state verify" v-else>Verificado</button>
                        <img src="/img/men.png" class="img-fluid user my-3" v-if="card.gender === 'men'">
                        <img src="/img/women.png" class="img-fluid user my-3" v-if="card.gender === 'women'">
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
                        <img src="/img/men.png" class="img-fluid my-3">
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
            profilesSaves: [],
        }
    },
    created() {
    axios.get('/profile')
    .then(res => {
        this.profilesSaves = res.data;
    })
  },
}
</script>