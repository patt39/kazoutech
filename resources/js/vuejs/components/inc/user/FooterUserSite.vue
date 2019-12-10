<template>
    <footer class="footer footer-big bg-gradient-default">
        <div class="container">
            <div class="content">
                <div class="row mb-5">
                    <div class="column mr-auto">
                        <img src="/assets/vendor_site/img/brand/blue.png" class="logo logo-sm" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="column">
                            <h4 class="mb-4">Presentation</h4>
                            <ul class="links-vertical">
                                <li>
                                    <router-link :to="{ name: 'about' }">
                                        A propos de nous
                                    </router-link>
                                </li>
                                <li>
                                    <a href="/concept">
                                        Notre concept
                                    </a>
                                </li>
                                <li>
                                    <a href="/faqs">
                                        Faqs
                                    </a>
                                </li>
                                <li>
                                    <router-link :to="{ name: 'contact_cm' }">
                                        Contact
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="column">
                            <h4 class="mb-4">Services</h4>
                            <ul class="links-vertical">
                                <li>
                                    <a href="/services">
                                        Nos services
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Media Kit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="column">
                            <h4 class="mb-4">Informations</h4>
                            <ul class="links-vertical">
                                <li>
                                    <a href="javascript:;">
                                        Licence
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Terme et Condition
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Politique de confidentialite
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Legale notice 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="column">
                            <h4 class="mb-4">Newsletter</h4>
                            <ul class="links-vertical">
                                <p>We handpicked the most interesting content for you. No spam. It takes one click to unsubscribe. Give
                                    it a try!</p>
                                <form class="form form-newsletter" method="" action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <button type="button" class="btn btn-primary" name="button">
                                        Subscribe
                                    </button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-white opacity-3">
            <div class="col-md-3 mx-auto">
                <button type="button" class="btn-icon-only rounded-circle btn btn-facebook">
                    <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                </button>
                <button type="button" class="btn-icon-only rounded-circle btn btn-twitter">
                    <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                </button>
                <button type="button" class="btn-instagram btn-icon-only rounded-circle btn">
                    <span class="btn-inner--icon"><i class="fab fa-instagram"></i></span>
                </button>
                <button type="button" class="btn-icon-only rounded-circle btn btn-pinterest">
                    <span class="btn-inner--icon"><i class="fab fa-pinterest"></i></span>
                </button>
            </div>
        </div>
        <div class="copyright d-flex justify-content-center mt-4 mr-40">
            Copyright &copy; {{ new Date().getFullYear() }}. Realized by <a href="/" class="title-red" style="padding-left: 4px; color: red">KazouGroup srl</a></h6>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "FooterUserSite"
    }
</script>

<style scoped>

</style>
