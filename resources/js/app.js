require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Navbar
Vue.component('nav-component', require('./components/NavComponent.vue').default);

//Obtain Reviews
Vue.component('obtain-reviews-component', require('./components/ObtainReviewsComponent.vue').default);

// About
Vue.component('about-component', require('./components/AboutComponent.vue').default);

// Earn Clients
Vue.component('clients-component', require('./components/ClientsComponent.vue').default);

// Our Plans
Vue.component('plans-component', require('./components/PlansComponent.vue').default);

// Individual Plans
Vue.component('individual-plans-component', require('./components/IndividualPlansComponent.vue').default);

// How Works
Vue.component('how-works-component', require('./components/HowWorksComponent.vue').default);

// Earn Money
Vue.component('earn-money-component', require('./components/EarnMoneyComponent.vue').default);

// Footer
Vue.component('footer-component', require('./components/FooterComponent.vue').default);

// Faqs
Vue.component('faqs-component', require('./components/FAQSComponent.vue').default);

// Guide
Vue.component('guide-component', require('./components/GuideComponent.vue').default);

// Affiliates
Vue.component('affiliates-component', require('./components/AffiliatesComponent.vue').default);

// Legal
Vue.component('legal-component', require('./components/LegalComponent.vue').default);

// Privacy
Vue.component('privacy-component', require('./components/PrivacyComponent.vue').default);

// Contact
Vue.component('contact-component', require('./components/ContactComponent.vue').default);

// DASHBOARD ADMIN - Create Suscriptions to show in dashboard
Vue.component('add-suscriptions-component', require('./components/admin/AddSuscriptions.vue').default);

// DASHBOARD ADMIN - Create Offers to show in dashboard
Vue.component('add-offers-component', require('./components/admin/AddOffers.vue').default);

// DASHBOARD ADMIN - Create Promotions to show in dashboard
Vue.component('add-promotions-component', require('./components/admin/AddPromotions.vue').default);

// DASHBOARD ADMIN - Form Suscriptions to show in dashboard
Vue.component('form-suscription-component', require('./components/admin/FormSuscriptions.vue').default);

// DASHBOARD ADMIN - Get Suscriptions to show in dashboard
Vue.component('get-suscription-component', require('./components/admin/GetSuscriptions.vue').default);

// DASHBOARD ADMIN - Get Packs to show in dashboard
Vue.component('add-packs-component', require('./components/admin/AddPacks.vue').default);

// DASHBOARD ADMIN - Get Packs to show in dashboard
Vue.component('get-packs-component', require('./components/admin/GetPacks.vue').default);

// DASHBOARD ADMIN - Get Packs to show in dashboard
Vue.component('table-users-component', require('./components/admin/TableUsers.vue').default);

// DASHBOARD ADMIN - Get Store Packs to show in Store
Vue.component('store-suscription-component', require('./components/admin/StoreSuscriptions.vue').default);

// DASHBOARD ADMIN - Get Store Packs to show in Store
Vue.component('store-packs-component', require('./components/admin/StorePacks.vue').default);

// DASHBOARD ADMIN - Get Store Offers to show in Store
Vue.component('store-offers-component', require('./components/admin/StoreOffers.vue').default);

// DASHBOARD ADMIN - Get Store Packs to show in Store
Vue.component('store-promotions-component', require('./components/admin/StorePromos.vue').default);

// DASHBOARD REVIEWER - Get Profiles to show in dashboard
Vue.component('get-profiles-component', require('./components/dashboard/reviewer/GetProfiles.vue').default);

// DASHBOARD REVIEWER - Add Profile
Vue.component('add-profile-component', require('./components/dashboard/reviewer/AddProfile.vue').default);

// DASHBOARD REVIEWER - Create Account Component
Vue.component('create-account-component', require('./components/dashboard/reviewer/CreateAccount.vue').default);

// DASHBOARD REVIEWER - Help ansd Support Component
Vue.component('help-component', require('./components/dashboard/reviewer/HelpComponent.vue').default);

// DASHBOARD BUSINESS - Get Profiles to show in dashboard
Vue.component('get-business-profile-component', require('./components/dashboard/business/GetBusinessProfile.vue').default);

const app = new Vue({
    el: '#app',
});
